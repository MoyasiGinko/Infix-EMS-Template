<?php

namespace App\Http\Middleware;

use App\SmCustomLink;
use App\SmFrontendPersmission;
use App\SmHeaderMenuManager;
use App\SmSocialMediaIcon;
use Closure;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Spatie\Valuestore\Valuestore;

class SubdomainMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $school = SaasSchool();
        $domain = ($school && isset($school->domain)) ? $school->domain : 'school';
        Session::put('domain', $domain);
        app()->forgetInstance('school');
        app()->instance('school', $school);

        $settings_prefix = Str::lower(str_replace(' ', '_', $domain ?: 'default'));
        $chat_dir = storage_path('app/chat');
        if (!file_exists($chat_dir)) {
            @mkdir($chat_dir, 0777, true);
        }
        $chat_settings = $chat_dir.'/'.$settings_prefix.'_settings.json';
        if (! file_exists($chat_settings)) {
            $default_settings = storage_path('app/chat/default_settings.json');
            if (file_exists($default_settings)) {
                @copy($default_settings, $chat_settings);
            } else {
                @file_put_contents($chat_settings, json_encode([], JSON_PRETTY_PRINT));
            }
        }

        app()->scoped('general_settings', function () use ($chat_settings): Valuestore {
            return Valuestore::make($chat_settings);
        });

        view()->composer('frontEnd.home.front_master', function ($view) use ($school): void {

            if (activeTheme() && activeTheme() == 'edulia') {
                $menus = SmHeaderMenuManager::when(activeTheme(), function ($q): void {
                    $q->where('theme', activeTheme());
                })->when(activeTheme() == null, function ($q): void {
                    $q->where('theme', 'default');
                })->whereNull('parent_id')->where('school_id', app('school')->id)->orderBy('position')->get();
            } else {
                $menus = SmHeaderMenuManager::where('theme', 'default')->whereNull('parent_id')->where('school_id', app('school')->id)->orderBy('position')->get();
            }

            $data = [
                'social_permission' => SmFrontendPersmission::where('name', 'Social Icons')->where('parent_id', 1)->where('is_published', 1)->where('school_id', app('school')->id)->first(),
                'menus' => $menus,
                'custom_link' => SmCustomLink::where('school_id', app('school')->id)->first(),
                'social_icons' => SmSocialMediaIcon::where('school_id', app('school')->id)->where('status', 1)->get(),
                'school' => $school,
            ];

            $view->with($data);

        });

        return $next($request);
    }
}
