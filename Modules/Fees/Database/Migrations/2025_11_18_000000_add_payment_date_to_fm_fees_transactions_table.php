<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddPaymentDateToFmFeesTransactionsTable extends Migration
{
    public function up(): void
    {
        if (! Schema::hasColumn('fm_fees_transactions', 'payment_date')) {
            Schema::table('fm_fees_transactions', function (Blueprint $table): void {
                $table->timestamp('payment_date')->nullable()->after('paid_status');
            });
        }

        DB::table('fm_fees_transactions')
            ->whereNull('payment_date')
            ->update([
                'payment_date' => DB::raw('updated_at'),
            ]);
    }

    public function down(): void
    {
        if (Schema::hasColumn('fm_fees_transactions', 'payment_date')) {
            Schema::table('fm_fees_transactions', function (Blueprint $table): void {
                $table->dropColumn('payment_date');
            });
        }
    }
}
