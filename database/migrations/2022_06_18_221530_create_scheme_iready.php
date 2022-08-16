<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchemeIready extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store', function (Blueprint $table) {

            $table->id();
            $table->string('name');
            $table->string('owner');
            $table->string('phone');
            $table->boolean('active')->default(true);
            $table->string('primary_color');
            $table->string('second_color');
            $table->string('rfc');
            $table->string('description');
            $table->string('img_url');


            $table->timestamps();
            $table->softDeletes();
        });


        Schema::create('board', function (Blueprint $table) {

            $table->id();
            $table->string('name');
            $table->string('description');
            $table->boolean('active')->default(true);
            $table->boolean('available')->default(true);

            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('fk_id_store');
            $table->foreign('fk_id_store')
                ->references('id')
                ->on('store');
        });

        Schema::create('payment_store', function (Blueprint $table) {

            $table->id();
            $table->double('price');
            $table->date('date');
            $table->timestamps();
            $table->unsignedBigInteger('fk_id_store');
            $table->foreign('fk_id_store')
                ->references('id')
                ->on('store');
        });

        Schema::create('store_address', function (Blueprint $table) {
            $table->id();
            $table->string('country')->default('México');
            $table->string('state')->default('México');
            $table->string('city');
            $table->string('colony');
            $table->string('zip_code');
            $table->string('street');
            $table->string('ext_num');
            $table->string('int_num')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->boolean('active')->default(true);
            $table->unsignedBigInteger('fk_id_store');
            $table->timestamps();

            $table->foreign('fk_id_store')
                ->references('id')
                ->on('store');
        });

        Schema::create('unit', function (Blueprint $table) {
            $table->id();
            $table->string('value');
        });

        Schema::create('raw_material', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->double('quantity');
            $table->double('min_stok');
            $table->double('max_stok');
            $table->unsignedBigInteger('fk_id_store');
            $table->unsignedBigInteger('fk_id_unit');

            $table->foreign('fk_id_store')
                ->references('id')
                ->on('store');

            $table->foreign('fk_id_unit')
                ->references('id')
                ->on('unit');

            $table->timestamps();
        });

        Schema::create('category', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });


        Schema::create('store_category', function (Blueprint $table) {
            $table->id();
            $table->integer('priority');
            $table->string('drescription');
            $table->string('url_image');
            $table->unsignedBigInteger('fk_id_store');
            $table->unsignedBigInteger('fk_id_category');

            $table->foreign('fk_id_store')
                ->references('id')
                ->on('store');

            $table->foreign('fk_id_category')
                ->references('id')
                ->on('category');

            $table->timestamps();
        });

        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->double('price');
            $table->double('show');
            $table->timestamps();
            $table->unsignedBigInteger('fk_id_category');
            $table->unsignedBigInteger('fk_id_store');

            $table->foreign('fk_id_category')
                ->references('id')
                ->on('category');

            $table->foreign('fk_id_store')
                ->references('id')
                ->on('store');
        });

        Schema::create('product_material', function (Blueprint $table) {
            $table->id();
            $table->double('quantity');


            $table->unsignedBigInteger('fk_id_product');
            $table->unsignedBigInteger('fk_id_material');

            $table->foreign('fk_id_product')
                ->references('id')
                ->on('product');

            $table->foreign('fk_id_material')
                ->references('id')
                ->on('raw_material');

            $table->timestamps();
        });



        Schema::create('combo', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->string('url_image');
            $table->double('price');
            $table->boolean('active')->default(true);
            $table->timestamps();
        });

        Schema::create('product_combo', function (Blueprint $table) {
            $table->id();
            $table->integer('quantity');
            $table->timestamps();
            $table->unsignedBigInteger('fk_id_product');
            $table->unsignedBigInteger('fk_id_combo');

            $table->foreign('fk_id_product')
                ->references('id')
                ->on('product');

            $table->foreign('fk_id_combo')
                ->references('id')
                ->on('combo');
        });

        Schema::create('client', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->boolean('active')->default(true);
            $table->timestamps();

            $table->unsignedBigInteger('fk_id_client');

            $table->foreign('fk_id_client')
                ->references('id')
                ->on('client');
        });

        Schema::create('address', function (Blueprint $table) {
            $table->id();
            $table->string('country')->default('México');
            $table->string('state')->default('México');
            $table->string('city');
            $table->string('colony');
            $table->string('zip_code');
            $table->string('street');
            $table->string('ext_num');
            $table->string('int_num')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->boolean('active')->default(true);
            $table->unsignedBigInteger('fk_id_client');
            $table->timestamps();

            $table->foreign('fk_id_client')
                ->references('id')
                ->on('client');
        });

        Schema::create('employee', function (Blueprint $table) {
            $table->id();
            $table->boolean('active')->default(true);
            $table->string('url_image');
            $table->string('rfc');
            $table->string('curp');
            $table->string('phone');
            $table->string('email');
            $table->string('cell_phone');
            $table->string('social_security');
            $table->string('recidence');
            $table->bigInteger('outdoor_number');
            $table->string('cp');
            $table->string('city');
            $table->bigInteger('salary');
            $table->string('area');
            $table->string('workstation');
            $table->unsignedBigInteger('fk_id_user');
            $table->unsignedBigInteger('fk_id_store');
            $table->timestamps();

            $table->foreign('fk_id_user')
                ->references('id')
                ->on('user');

            $table->foreign('fk_id_store')
                ->references('id')
                ->on('store');
        });

        Schema::create('status', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });

        Schema::create('order_status', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fk_id_status');
            $table->unsignedBigInteger('fk_id_order');
            $table->timestamps();
        });

        Schema::create('order', function (Blueprint $table) {
            $table->id();
            $table->double('total');
            $table->double('discount');
            $table->string('description');
            $table->string('client');
            $table->unsignedBigInteger('fk_id_status');
            $table->unsignedBigInteger('fk_id_store');
            $table->unsignedBigInteger('fk_id_board')->nullable();
            $table->unsignedBigInteger('fk_id_employee')->nullable();
            $table->unsignedBigInteger('fk_id_client')->nullable();
            $table->unsignedBigInteger('fk_id_address')->nullable();
            $table->timestamps();

            $table->foreign('fk_id_store')
                ->references('id')
                ->on('store');

            $table->foreign('fk_id_board')
                ->references('id')
                ->on('board');

            $table->foreign('fk_id_employee')
                ->references('id')
                ->on('employee');

            $table->foreign('fk_id_client')
                ->references('id')
                ->on('client');

            $table->foreign('fk_id_status')
                ->references('id')
                ->on('status');

            $table->foreign('fk_id_address')
                ->references('id')
                ->on('address');
        });


        Schema::create('order_product', function (Blueprint $table) {
            $table->id();
            $table->integer('ticket');
            $table->double('price');
            $table->double('quantity');
            $table->unsignedBigInteger('fk_id_order');
            $table->unsignedBigInteger('fk_id_product')->nullable();
            $table->unsignedBigInteger('fk_id_combo')->nullable();

            $table->timestamps();

            $table->foreign('fk_id_order')
                ->references('id')
                ->on('order');

            $table->foreign('fk_id_product')
                ->references('id')
                ->on('product');

            $table->foreign('fk_id_combo')
                ->references('id')
                ->on('combo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_product');
        Schema::dropIfExists('order_status');
        Schema::dropIfExists('order');
        Schema::dropIfExists('status');
        Schema::dropIfExists('employee');
        Schema::dropIfExists('address');
        Schema::dropIfExists('client');
        Schema::dropIfExists('product_combo');
        Schema::dropIfExists('combo');
        Schema::dropIfExists('product_material');
        Schema::dropIfExists('product');
        Schema::dropIfExists('store_category');
        Schema::dropIfExists('category');
        Schema::dropIfExists('raw_material');
        Schema::dropIfExists('unit');
        Schema::dropIfExists('store_address');
        Schema::dropIfExists('payment_store');
        Schema::dropIfExists('board');
        Schema::dropIfExists('store');
    }
}
