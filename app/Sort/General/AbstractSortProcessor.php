<?php

namespace App\Sort\General;

use App\Filter\General\QueryParam;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

abstract class AbstractSortProcessor
{
  /**
   * @var Collection<int, QueryParam>
   */
  protected Collection $sorts;

  public function sort(object $filterDto,Builder $builder): Builder
  {
    $applicableFilters = $this->getApplicableSorts($filterDto);

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
  private function getApplicableSorts(object $filterDto): Collection
  {
    $fields = $filterDto->all();
    return $this->sorts->filter(function (QueryParam $filter) use ($fields) {
      $name = $filter->getField();
      if (!array_key_exists($name, $fields)) {
        return false;
      }
      $value = $fields[$name];
      return $filter->isActive($value);
    });
  }
}