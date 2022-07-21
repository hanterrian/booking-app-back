<?php

use App\Models\Author;
use App\Models\Product;
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
        Schema::create('author_product', function (Blueprint $table) {
            $table->foreignIdFor(Author::class, 'author_uuid')->constrained('authors', 'uuid')->cascadeOnDelete();
            $table->foreignIdFor(Product::class, 'product_uuid')->constrained('products', 'uuid')->cascadeOnDelete();

            $table->primary(['author_uuid', 'product_uuid']);
            $table->index(['author_uuid', 'product_uuid']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('author_product');
    }
};
