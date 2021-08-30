<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
             $table->integer('user_id');
            $table->integer('company_id');
            $table->string('title')->nullable();
            $table->string('roles')->nullable();
            $table->string('slug')->nullable();
            $table->text('description')->nullable();
            $table->integer('category_id');
            $table->string('position')->nullable();
            $table->text('address')->nullable();
            $table->string('type')->nullable();
             $table->string('salary')->nullable();
            $table->string('status')->nullable();
            $table->date('last_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
}
