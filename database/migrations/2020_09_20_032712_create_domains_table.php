<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDomainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('domains', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('subCategory_id')->nullable();
            $table->string('title',60);
            $table->string('url');
            $table->string('shortDescription',150);
            $table->longText('description')->nullable();
            $table->string('img');
            $table->string('email');
            $table->boolean('published')->default(false);
            $table->string('paid')->default(false);
            $table->timestamps();

            $table->foreign('category_id')
                    ->references('id')
                    ->on('categories')
                    ->onDelete('cascade');

            $table->foreign('subCategory_id')
                    ->references('id')
                    ->on('sub_categories')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('domains');
    }
}
