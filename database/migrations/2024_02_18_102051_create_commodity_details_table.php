<?php

use App\Models\Commodity;
use App\Models\District;
use App\Models\MeasurementUnit;
use App\Models\VehicleEntry;
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
        Schema::create('commodity_details', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(VehicleEntry::class);
            $table->foreignIdFor(Commodity::class);
            $table->foreignIdFor(MeasurementUnit::class)->nullable();
            $table->decimal('quantity')->nullable();
            $table->string('challan_no')->nullable();
            $table->date('challan_date')->nullable();
            $table->string('origin_company')->nullable();
            $table->string('agency_name')->nullable(); //destination company //id ni se duh thu sam
            $table->foreignIdFor(District::class)->nullable();
            $table->decimal('weight')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commodity_details');
    }
};
