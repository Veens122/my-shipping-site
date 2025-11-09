<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('shipment_updates', function (Blueprint $table) {
            $table->timestamp('status_date')->nullable()->after('update_time');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('shipment_updates', function (Blueprint $table) {
            $table->dropColumn('status_date');
        });
    }
};
