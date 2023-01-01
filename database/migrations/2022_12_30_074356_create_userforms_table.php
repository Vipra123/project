<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userforms', function (Blueprint $table) {
            $table->id('userform_id');
            $table->string('name',60);
            $table->string('email',40)->unique();
            $table->string('password');
            $table->enum('gender',["Default","Male","Female","Others"]);
            $table->date('dob')->nullable();
            $table->text('address');
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('userforms');
    }
};
