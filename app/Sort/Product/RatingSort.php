<?php

namespace App\Sort\Product;

use App\Filter\General\QueryParam;
use App\Sort\General\AbstractSort;
use Illuminate\Database\Eloquent\Builder;

class RatingSort extends AbstractSort
{

  public function getField(): string
  {
    return 'rating_sort';
  }

  public function apply(Builder $builder, $value): Builder
  {
    return $builder->orderBy('rating', $value);
  }

}