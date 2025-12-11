<?php

namespace App\Sort\General;

use App\Filter\General\QueryParam;
use Illuminate\Database\Eloquent\Builder;

abstract class AbstractSort implements QueryParam
{

  abstract public function getField(): string;

  public function isActive($value): bool
  {
    if ($value == null) {
      return false;
    }
    return strtolower($value) == 'asc' || strtolower($value) == 'desc';
  }

  abstract public function apply(Builder $builder, $value): Builder;

}