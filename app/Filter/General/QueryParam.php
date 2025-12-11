<?php

namespace App\Filter\General;

use Illuminate\Database\Eloquent\Builder;

interface QueryParam
{

  public function getField(): string;
  public function isActive($value): bool;

  public function apply(Builder $builder, $value): Builder;

}