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
        if(!Schema::hasTable('category')){
            Schema::create('category', function (Blueprint $table){
               $table->id();
               $table->integer('code')->nullable(false)->unique();
               $table->string('name', 255);
               $table->timestamps();
               $table->softDeletes();
            });
        }
        if(!Schema::hasTable('news')){
            Schema::create('news', function (Blueprint $table) {
                $table->id();
                $table->integer('category_code')->nullable(false)->comment('ID категории');
                $table->string('title', 255);
                $table->string('description', 1000);
                $table->string('fulltext', 5000);
                $table->string('image', 200)->nullable(true);
                $table->timestamps();
                $table->softDeletes();

                $table->foreign('category_code')->references('code')->on('category')->cascadeOnDelete()->cascadeOnUpdate();
            });

            }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
        Schema::dropIfExists('category');
    }
};
