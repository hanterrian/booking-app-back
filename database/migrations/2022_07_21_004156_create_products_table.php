<?php

use App\Models\Author;
use App\Models\Category;
use App\Models\Publisher;
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
        Schema::create('products', function (Blueprint $table) {
            $table->uuid()->primary();

            $table->foreignIdFor(Publisher::class)->nullable()->constrained('publishers', 'uuid')->nullOnDelete();
            $table->foreignIdFor(Category::class)->nullable()->constrained('categories', 'uuid')->nullOnDelete();

            $table->string('title')->nullable(false);
            $table->string('slug')->nullable(false)->index();
            $table->string('sku')->nullable(false)->index();

            $table->longText('description')->nullable();

            $table->integer('stock')->default(0)->nullable(false);

            $table->string('thumbnail_src')->nullable();

            $table->decimal('price')->nullable(false);

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
        Schema::dropIfExists('products');
    }
};
