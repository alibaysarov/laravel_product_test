<?php

namespace App\Http\Controllers;

use App\Filter\Product\ProductFilterProcessor;
use App\Http\Requests\ProductFilterRequest;
use App\Sort\Product\ProductSortProcessor;
use Illuminate\Http\Request;


/**
 * @OA\Info(
 *     title="My Laravel API",
 *     version="1.0.0"
 * )
 * @OA\Server(url=L5_SWAGGER_CONST_HOST)
 *
 * @OA\Schema(
 *     schema="Product",
 *     type="object",
 *     @OA\Property(property="id", type="integer"),
 *     @OA\Property(property="name", type="string"),
 *     @OA\Property(property="price", type="number", format="float"),
 *     @OA\Property(property="in_stock", type="boolean")
 * )
 */
class ProductController extends Controller
{
    public function __construct(
      protected readonly ProductFilterProcessor $productFilterProcessor,
      protected readonly ProductSortProcessor $productSortProcessor,
    ) {

    }

  /**
   * @OA\Get(
   *     path="/v1/products",
   *     tags={"Products"},
   *     summary="List products",
   *     @OA\Response(
   *         response=200,
   *         description="OK",
   *         @OA\JsonContent(
   *             type="array",
   *             @OA\Items(ref="#/components/schemas/Product")
   *         )
   *     )
   * )
   */
    public function list(ProductFilterRequest $request)
    {
      $request->validated();

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
