<?php

use App\Models\Category;
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
        Schema::create('tags', function (Blueprint $table) {
            $table->uuid()->primary();

            $table->foreignIdFor(Category::class)->nullable()->constrained('categories', 'uuid')->nullOnDelete();

            $table->string('title')->nullable(false);
            $table->string('slug')->nullable(false)->index();

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
        Schema::dropIfExists('tags');
    }
};
