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
        Schema::table('shipments', function (Blueprint $table) {
            // Add package description and other new fields
            $table->text('package_description')->nullable()->after('package_type');
            $table->date('registered_date')->nullable()->after('package_description');
            $table->date('arrival_date')->nullable()->after('registered_date');
            $table->decimal('shipping_fee', 10, 2)->nullable()->after('arrival_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('shipments', function (Blueprint $table) {
            $table->dropColumn(['package_description', 'registered_date', 'arrival_date', 'shipping_fee']);
        });
    }
};
