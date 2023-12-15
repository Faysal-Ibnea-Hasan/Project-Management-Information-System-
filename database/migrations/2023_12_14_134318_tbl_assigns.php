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
        Schema::create('tbl_assigns', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('project_Id');
            $table->string('student_Id');
            $table->string('group_Id');
            $table->string('supervisor_Id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_assigns');
    }
};
