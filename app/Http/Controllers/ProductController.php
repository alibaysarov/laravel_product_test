<?php

namespace App\Http\Controllers;

use App\Filter\Product\ProductFilterProcessor;
use App\Sort\Product\ProductSortProcessor;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(
      protected readonly ProductFilterProcessor $productFilterProcessor,
      protected readonly ProductSortProcessor $productSortProcessor,
    ) {

    }

    public function list(Request $request)
    {
      $filteredResults =  $this
        ->productFilterProcessor
        ->filter($request);
      $sortedResults = $this->productSortProcessor->sort($request, $filteredResults);

      $result = $sortedResults->paginate(8);

      return response()->json([
        'data' => $result,
      ]);
    }

}
