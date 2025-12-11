<?php

namespace App\Sort\Product;

use App\Filter\General\QueryParam;
use App\Sort\General\AbstractSort;
use Illuminate\Database\Eloquent\Builder;

class NewestSort extends AbstractSort
{

  public function getField(): string
  {
    return 'newest';
  }

  public function apply(Builder $builder, $value): Builder
  {
    return $builder->orderBy('created_at', $value);
  }

}