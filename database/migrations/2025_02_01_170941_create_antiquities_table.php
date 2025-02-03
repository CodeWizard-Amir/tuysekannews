<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // '',
    // '',
    // '',
    // '',
    // '',
    public function up(): void
    {
        Schema::create('antiquities', function (Blueprint $table) {
            $table->id();
            $table->string("AntiquitiyID")->Primary()->unique();
            $table->string("name");
            $table->string("categoryID");
            $table->foreign("categoryID")->references("categoryID")->on("categories")->cascadeOnDelete();
            $table->string("picture");
            $table->string("description");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('antiquities');
    }
};
