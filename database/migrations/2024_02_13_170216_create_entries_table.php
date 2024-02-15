<?php

use App\Models\Commodity;
use App\Models\User;
use App\Models\VehicleCheck;
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
        Schema::create('entries', function (Blueprint $table) {
            $table->id();
            // $table->string('vehicle_number');
            $table->foreignIdFor(Commodity::class);
            $table->string('no_of_bags');
            $table->decimal('weight');
            $table->foreignIdFor(VehicleCheck::class);
            // $table->time('arrival_time');
            $table->foreignIdFor(User::class)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entries');
    }
};
