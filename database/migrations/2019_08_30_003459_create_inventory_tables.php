<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoryTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * Locations table (Assumes no duplicates are entered)
         */
        Schema::create('locations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('descriptor')->default('main');
            $table->string('account_num')->nullable(false);
            $table->string('address_line1')->nullable();
            $table->string('address_line2')->nullable();
            $table->string('address_line3')->nullable();
            $table->string('address_line4')->nullable();
            $table->string('city')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('state')->nullable();
            $table->string('comments')->nullable();
            $table->timestamps();
        });

        /**
         * Suppliers table
         */
        Schema::create('suppliers', function (Blueprint $table) {
            $table->string('name')->primary();
            $table->timestamps();
        });

        /**
         * Purchase orders table for pending products
         */
        Schema::create('purchase_orders', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->date('issue_date')->nullable(false);
            $table->string('sup_name')->nullable(false);
            $table->string('comments')->nullable();
            $table->timestamps();
        });
        // Add foreign keys
        Schema::table('purchase_orders', function(Blueprint $table) {
            $table->foreign('sup_name')->references('name')->on('suppliers');
        });

        /**
         * Product list table (no dependencies)
         */
        Schema::create('products', function (Blueprint $table) {
            $table->string('sku')->primary();
            $table->string('name')->nullable(false);
            $table->string('info')->nullable();
            $table->timestamps();
        });

        /**
         * Products pending to be received table
         */
        Schema::create('purchase_order_products', function (Blueprint $table) {
            $table->string('order_id')->nullable(false);
            $table->string('prod_sku')->nullable(false);
            $table->primary(['order_id', 'prod_sku']);

            $table->integer('count')->nullable(false);
            $table->string('comments')->nullable();
            $table->timestamps();
        });
        // Add foreign keys
        Schema::table('purchase_order_products', function(Blueprint $table) {
            $table->foreign('order_id')->references('id')->on('purchase_orders');
            $table->foreign('prod_sku')->references('sku')->on('products');
        });

        /**
         * Products pending committed to location table
         */
        Schema::create('committed_products', function (Blueprint $table) {
            $table->unsignedBigInteger('loc_id')->nullable(false);
            $table->string('prod_sku')->nullable(false);
            $table->date('install_date')->nullable(false);
            $table->primary(['loc_id', 'prod_sku']);

            $table->integer('count')->nullable(false);
            $table->string('comments');

            $table->timestamps();
        });
        // Add foreign keys
        Schema::table('committed_products', function(Blueprint $table) {
            $table->foreign('loc_id')->references('id')->on('locations');
            $table->foreign('prod_sku')->references('sku')->on('products');
        });

        /**
         * InventoryItem table (all products that have been received
         * from purchase_order)
         */
        Schema::create('inventory', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('order_id');
            $table->string('serial')->nullable();
            $table->string('mac')->nullable();
            $table->string('prod_sku')->nullable(false);
            $table->string('comments')->nullable();
            $table->timestamps();
        });
        // Add foreign keys
        Schema::table('inventory', function(Blueprint $table) {
            $table->foreign('prod_sku')->references('sku')->on('products');
            $table->foreign('order_id')->references('id')->on('products');
        });

        /**
         * Item Locations table (current is latest)
         */
        Schema::create('item_locations', function (Blueprint $table) {
            $table->unsignedBigInteger('loc_id')->nullable(false);
            $table->unsignedBigInteger('inv_id')->nullable(false);
            $table->primary(['loc_id', 'inv_id']);

            $table->dateTime('move_date')->nullable(false);
            $table->string('comments')->nullable();
            $table->timestamps();
        });
        // Add foreign keys
        Schema::table('item_locations', function(Blueprint $table) {
            $table->foreign('loc_id')->references('id')->on('locations');
            $table->foreign('inv_id')->references('id')->on('inventory');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventory_tables');
        Schema::dropIfExists('purchase_orders');
        Schema::dropIfExists('products');
        Schema::dropIfExists('purchase_order_products');
        Schema::dropIfExists('committed_products');
        Schema::dropIfExists('inventory');
        Schema::dropIfExists('item_locations');
    }
}
