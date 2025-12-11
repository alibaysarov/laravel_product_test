<?php

namespace App\Filter\Product;

use App\Filter\General\QueryParam;
use Illuminate\Database\Eloquent\Builder;

class SearchFilter implements QueryParam
{

  public function getField(): string
  {
    return 'search';
  }

  public function isActive($value): bool
  {
    return trim($value) !== '' && $value !== null;
  }

  public function apply(Builder $builder, $value): Builder
  {
    $searchTerm = trim($value);

    $escapedTerm = str_replace(['%', '_'], ['\%', '\_'], $searchTerm);

    return $builder->where('name', 'ILIKE', '%' . $escapedTerm . '%');
  }
}