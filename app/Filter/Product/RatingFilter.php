<?php

namespace App\Filter\Product;

use App\Filter\General\QueryParam;
use Illuminate\Database\Eloquent\Builder;

class RatingFilter implements QueryParam
{

  public function getField(): string
  {
    return 'rating_from';
  }

  public function isActive($value): bool
  {
    return $value !== null;
  }

  public function apply(Builder $builder, $value): Builder
  {
    return $builder->where('rating','>=', $value);
  }

}