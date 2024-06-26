<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->boolean('is_deleted')->default(0);
            $table->timestamps();
        });

        // seed with an initial role
        $role = new \App\Models\Role([
            'name' => 'admin',
        ]);
        $role->save();

        $role = new \App\Models\Role([
            'name' => 'manager',
        ]);
        $role->save();

        $role = new \App\Models\Role([
            'name' => 'employee',
        ]);
        $role->save();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
