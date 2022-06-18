<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });

        Schema::create('user', function (Blueprint $table) {
            $table->id();
            $table->string('username')->nullable();
            $table->string('name');
            $table->string('last_name');
            $table->string('second_last_name');
            $table->string('password')->nullable();
            $table->boolean('active')->default(true);
            $table->rememberToken();
            $table->unsignedBigInteger('fk_id_role');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('fk_id_role')
                ->references('id')
                ->on('role');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user');
        Schema::dropIfExists('role');
    }
}
