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
        Schema::create('genders', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->boolean('is_deleted')->default(0);
            $table->timestamps();
        });

        // seed with an initial genders
        $male = new \App\Models\Gender([
            'name' => 'Male',
        ]);
        $male->save();
        
        $female = new \App\Models\Gender([
            'name' => 'Female',
        ]);
        $female->save();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('genders');
    }
};
