<?php

namespace App\Sort\Product;

use App\Sort\General\AbstractSortProcessor;
use Illuminate\Support\Collection;

class ProductSortProcessor extends AbstractSortProcessor
{
  public function __construct() {
    $this->sorts = new Collection([
        new PriceSort(),
        new RatingSort(),
        new NewestSort(),
    ]);
  }

}