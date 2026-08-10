<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('notes', function (Blueprint $table): void {
            if (! Schema::hasColumn('notes', 'noteable_id')) {
                $table->unsignedBigInteger('noteable_id')->nullable()->after('reference_id');
            }
            if (! Schema::hasColumn('notes', 'noteable_type')) {
                $table->string('noteable_type')->nullable()->after('noteable_id');
            }
            if (! Schema::hasColumn('notes', 'reference_id')) {
                // In case earlier schema removed it; ensure backward compat if missing.
                $table->unsignedBigInteger('reference_id')->nullable()->after('type');
            }
            $table->index(['noteable_type','noteable_id']);
        });
    }

    public function down(): void
    {
        Schema::table('notes', function (Blueprint $table): void {
            if (Schema::hasColumn('notes', 'noteable_type')) {
                $table->dropColumn('noteable_type');
            }
            if (Schema::hasColumn('notes', 'noteable_id')) {
                $table->dropColumn('noteable_id');
            }
        });
    }
};