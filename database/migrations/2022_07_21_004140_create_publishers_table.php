<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publishers', function (Blueprint $table) {
            $table->uuid()->primary();

            $table->string('title')->nullable(false);
            $table->string('slug')->nullable(false)->index();

            $table->string('logo_src')->nullable();

            $table->integer('sort')->default(0)->index();
            $table->boolean('published')->default(true)->index();

            $table->softDeletes();

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
        Schema::dropIfExists('publishers');
    }
};
