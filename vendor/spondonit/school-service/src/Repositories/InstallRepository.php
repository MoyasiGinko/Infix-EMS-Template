<?php

namespace SpondonIt\SchoolService\Repositories;
ini_set('max_execution_time', -1);

use Throwable;
use App\SmStaff;
use App\SmSchool;
use App\SmGeneralSettings;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use SpondonIt\Service\Repositories\InstallRepository as ServiceInstallRepository;

class InstallRepository {

    protected $installRepository;
	/**
	 * Instantiate a new controller instance.
	 *
	 * @return void
	 */
	public function __construct(ServiceInstallRepository $installRepository) {
        $this->installRepository = $installRepository;
	}



	/**
	 * Install the script
	 */
	public function install($params) {

        try{
            $admin = $this->makeAdmin($params);

            $this->installRepository->seed(gbv($params, 'seed'));
            $this->postInstallScript($admin, $params);


            Artisan::call('key:generate', ['--force' => true]);

            envu([
                'APP_ENV' => 'production',
                'APP_DEBUG'     =>  'false',
            ]);



        } catch(\Exception $e){

            Storage::delete(['.user_email', '.user_pass']);

            throw ValidationException::withMessages(['message' => $e->getMessage()]);

        }
	}

	public function postInstallScript($admin, $params){

	}




	/**
	 * Insert default admin details
	 */
	public function makeAdmin($params) {
        try{
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');

            // 1. Ensure school exists before user creation
            $school = SmSchool::find(1);
            if (!$school) {
                $school = SmSchool::first();
            }
            if (!$school) {
                $school = new SmSchool();
                $school->id = 1;
                $school->school_name = 'InfixEdu';
                $school->email = gv($params, 'email');
                $school->starting_date = date('Y-m-d');
                $school->is_enabled = 'yes';
                $school->active_status = 1;
                $school->save();
            } else {
                $school->email = gv($params, 'email');
                $school->save();
            }

            // 2. Ensure Super admin role exists in infix_roles
            if (Schema::hasTable('infix_roles')) {
                $role = DB::table('infix_roles')->where('id', 1)->first();
                if (!$role) {
                    DB::table('infix_roles')->insert([
                        'id' => 1,
                        'name' => 'Super admin',
                        'type' => 'System',
                        'active_status' => 1,
                        'created_by' => '1',
                        'updated_by' => '1',
                        'school_id' => $school->id ?? 1,
                        'is_saas' => 0,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }

            // 3. Create or update the admin user
            $user_model_name = config('spondonit.user_model', 'App\User');
            $user_class = new $user_model_name;
            $user = $user_class->find(1);
            if(!$user){
               $user = new $user_model_name;
               $user->id = 1;
            }
           
            $user->email = gv($params, 'email');
            $user->full_name = 'System Administrator';
            $user->username = gv($params, 'email');
            if(Schema::hasColumn('users', 'role_id')){
                $user->role_id = 1;
            }
            if(Schema::hasColumn('users', 'school_id')){
                $user->school_id = $school->id ?? 1;
            }
            if(Schema::hasColumn('users', 'is_administrator')){
                $user->is_administrator = 'yes';
            }

            $user->password = bcrypt(gv($params, 'password', 'abcd1234'));
            $user->save();

            // 4. Create or update SmStaff
            $staff = SmStaff::first();
            if (empty($staff)) {
                $staff = new SmStaff();
            }
            $staff->user_id = $user->id;
            $staff->first_name = 'System';
            $staff->last_name = 'Administrator';
            $staff->full_name = 'System Administrator';
            $staff->email = $user->email;
            if(Schema::hasColumn('sm_staffs', 'school_id')){
                $staff->school_id = $school->id ?? 1;
            }
            if(Schema::hasColumn('sm_staffs', 'role_id')){
                $staff->role_id = 1;
            }
            $staff->save();

            // 5. Create or update SmGeneralSettings
			$setting = SmGeneralSettings::first();
            if (!$setting) {
                $setting = new SmGeneralSettings();
                $setting->school_id = $school->id ?? 1;
                $setting->site_title = 'InfixEdu';
            }
            $setting->email = $user->email;
            $setting->system_purchase_code = Storage::get('.access_code');
            $setting->system_activated_date = date('Y-m-d');
            $setting->system_domain = app_url();
            $setting->save();

            DB::statement('SET FOREIGN_KEY_CHECKS=1;');

            return $user;
            
        } catch(\Exception $e){
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
            $this->installRepository->rollbackDb();
            throw ValidationException::withMessages(['message' => $e->getMessage()]);
        }
	}

}
