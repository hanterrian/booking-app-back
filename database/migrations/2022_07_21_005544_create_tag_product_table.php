<?php

use App\Models\Product;
use App\Models\Tag;
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
        Schema::create('tag_product', function (Blueprint $table) {
            $table->foreignIdFor(Tag::class, 'tag_uuid')->constrained('tags', 'uuid')->cascadeOnDelete();
            $table->foreignIdFor(Product::class, 'product_uuid')->constrained('products', 'uuid')->cascadeOnDelete();

            $table->primary(['tag_uuid', 'product_uuid']);
            $table->index(['tag_uuid', 'product_uuid']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tag_product');
    }
};
