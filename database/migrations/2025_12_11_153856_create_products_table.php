<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

  public function up(): void
  {
    Schema::create('products', function (Blueprint $table) {
      $table->id();
      $table->string('name');
      $table->decimal('price', 10, 2);
      $table->foreignId('category_id')->constrained()->onDelete('cascade');
      $table->boolean('in_stock')->default(true);
      $table->float('rating')->default(0)->check('rating >= 0 AND rating <= 5');
      $table->timestamps();

      $table->index('name');

      $table->index(['category_id', 'in_stock', 'price']);

      $table->index('rating');

      $table->index('created_at');
      $table->softDeletes();
    });

    DB::statement('CREATE EXTENSION IF NOT EXISTS pg_trgm');
    DB::statement('CREATE INDEX products_name_trgm_idx ON products USING gin (name gin_trgm_ops)');
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    DB::statement('DROP INDEX IF EXISTS products_name_trgm_idx');
    Schema::dropIfExists('products');
  }

};
