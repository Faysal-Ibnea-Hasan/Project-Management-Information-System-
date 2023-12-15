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
        Schema::create('tbl_projects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('motivation');
            $table->string('objective');
            $table->string('project_Id');
            $table->string('student_Id');
            $table->string('file');
            $table->string('file_link');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_projects');
    }
};
