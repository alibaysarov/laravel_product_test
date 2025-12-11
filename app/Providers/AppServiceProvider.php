<?php

namespace App\Providers;

use App\Filter\General\AbstractFilterProcessor;
use App\Filter\Product\ProductFilterProcessor;
use App\Sort\General\AbstractSortProcessor;
use App\Sort\Product\ProductSortProcessor;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

  public array $bindings = [
    AbstractFilterProcessor::class => ProductFilterProcessor::class,
    AbstractSortProcessor::class => ProductSortProcessor::class,
  ];

  /**
   * Register any application services.
   */
  public function register(): void
  {
    //
  }

  /**
   * Bootstrap any application services.
   */
  public function boot(): void
  {
    //
  }

}
