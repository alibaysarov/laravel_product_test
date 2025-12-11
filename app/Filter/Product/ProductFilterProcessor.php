<?php

namespace App\Filter\Product;

use App\Filter\General\AbstractFilterProcessor;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

class ProductFilterProcessor extends AbstractFilterProcessor
{

  public function getBuilder(): Builder
  {
    return Product::query();
  }

  public function __construct() {
    $this->filters = new Collection([
      new SearchFilter(),
      new RatingFilter(),
      new StockFilter(),
      new PriceFrom(),
      new PriceTo(),
      new CategoryFilter(),
    ]);
  }

}