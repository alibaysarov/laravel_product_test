<?php

namespace App\Filter\Product;

use App\Filter\General\QueryParam;
use Illuminate\Database\Eloquent\Builder;

class CategoryFilter implements QueryParam
{

  public function getField(): string
  {
    return 'category_id';
  }

  public function isActive($value): bool
  {
    return $value !== null;
  }

  public function apply(Builder $builder, $value): Builder
  {
    return $builder->where('category_id', $value);
  }

}