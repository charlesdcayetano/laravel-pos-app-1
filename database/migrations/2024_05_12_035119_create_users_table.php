<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('profile_photo')->nullable();
            $table->string('password');
            $table->unsignedBigInteger('gender_id');
            $table->unsignedBigInteger('role_id');
            $table->timestamps();

            $table->foreign('gender_id')
                ->references('id')
                ->on('genders');

            $table->foreign('role_id')
                ->references('id')
                ->on('roles');
        });

        // $user = new \App\Models\User([
        //     'first_name' => 'John',
        //     'last_name' => 'Doe',
        //     'email' => 'admin@email.com',
        //     'profile_photo' => null,
        //     'password' => Hash::make('password'),
        //     'gender_id' => 1,
        //     'role_id' => 1,
        // ]);
        // $user->save();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
