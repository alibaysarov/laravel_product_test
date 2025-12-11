<?php

namespace App\Filter\Product;

use App\Filter\General\QueryParam;
use Illuminate\Database\Eloquent\Builder;

class StockFilter implements QueryParam
{

  public function getField(): string
  {
    return 'in_stock';
  }

  public function isActive($value): bool
  {
    return $value !== null;
  }

  public function apply(Builder $builder, $value): Builder
  {
    return $builder->where('in_stock', $value);
  }

}