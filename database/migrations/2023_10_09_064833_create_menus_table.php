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
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100); 
            $table->string('url', 100)->nullable(); 
            $table->string('icon', 100)->nullable(); 
            $table->integer('parent_id');
            $table->string('treecode', 200); 
            $table->integer('position')->default(0); 
            $table->timestamps();
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
