<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->uuid()->primary();

            $table->string('title')->nullable(false);
            $table->string('slug')->nullable(false)->index();

            $table->integer('sort')->default(0)->index();
            $table->boolean('published')->default(true)->index();

            $table->softDeletes();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('categories');
    }
};
