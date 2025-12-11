<?php

namespace App\Filter\General;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

/**
 *
 */
abstract class AbstractFilterProcessor
{

  /**
   * @var Collection<int, QueryParam>
   */
  protected Collection $filters;
  abstract public function getBuilder(): Builder;

  public function filter(object $filterDto,Builder $builder = null): Builder
  {
    if ($builder === null) {
      $builder = $this->getBuilder();
    }
    $applicableFilters = $this->getApplicableFilters($filterDto);

    foreach ($applicableFilters as $filter) {
      $value = $filterDto->all()[$filter->getField()];

      $builder = $filter->apply($builder, $value);
    }
    return $builder;
  }

  /**
   * @param  object  $filterDto
   *
   * @return Collection<int, QueryParam>
   */
  private function getApplicableFilters(object $filterDto): Collection
  {
    $fields = $filterDto->all();
    return $this->filters->filter(function (QueryParam $filter) use ($fields) {
      $name = $filter->getField();
      if (!array_key_exists($name, $fields)) {
        return false;
      }
      $value = $fields[$name];
      return $filter->isActive($value);
    });
  }

}