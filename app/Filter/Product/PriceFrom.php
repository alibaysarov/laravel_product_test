<?php

namespace App\Filter\Product;

use App\Filter\General\QueryParam;
use Illuminate\Database\Eloquent\Builder;

class PriceFrom implements QueryParam
{

  public function getField(): string
  {
    return 'price_from';
  }

  public function isActive($value): bool
  {
    return $value !== null && (int) $value >= 0;
  }

  public function apply(Builder $builder, $value): Builder
  {
    return $builder->where('price', '>=',$value);
  }

}