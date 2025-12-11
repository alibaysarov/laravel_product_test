<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *     schema="ProductFilterRequest",
 *     type="object",
 *     title="Product Filter Request",
 *     description="Параметры фильтрации и сортировки товаров"
 * )
 */
class ProductFilterRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   */
  public function authorize(): bool
  {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   */
  public function rules(): array
  {
    return [
      // Ценовой диапазон
      'price_from'   => ['sometimes', 'numeric', 'min:0'],
      'price_to'     => ['sometimes', 'numeric', 'min:0', 'gte:price_from'],

      // Поиск по названию/описанию
      'search'       => ['sometimes', 'string', 'max:255'],

      // Рейтинг
      'rating_from'  => ['sometimes', 'integer', 'between:0,5'],


      'page'         => ['sometimes', 'integer', 'min:1'],

      'newest'       => ['sometimes', 'in:asc,desc'],

      'price_sort'   => ['sometimes', 'in:asc,desc'],

      'rating_sort'  => ['sometimes', 'in:asc,desc'],

      'category_id'  => ['sometimes', 'integer', 'exists:categories,id'],
    ];
  }

  /**
   * @OA\Property(property="price_from", type="number", example=130, description="Минимальная цена")
   * @OA\Property(property="price_to",   type="number", example=300, description="Максимальная цена")
   * @OA\Property(property="search",     type="string", example="Leather", description="Поиск по названию")
   * @OA\Property(property="rating_from", type="integer", example=4, description="Минимальный рейтинг (0–5)")
   * @OA\Property(property="page",       type="integer", example=1, minimum=1, description="Номер страницы")
   * @OA\Property(property="newest",     type="string", enum={"asc","desc"}, example="desc", description="Сортировка по новизне")
   * @OA\Property(property="price_sort", type="string", enum={"asc","desc"}, example="desc", description="Сортировка по цене")
   * @OA\Property(property="rating_sort",type="string", enum={"asc","desc"}, example="desc", description="Сортировка по рейтингу")
   * @OA\Property(property="category_id",type="integer", example=2, description="ID категории")
   *
   * @return array
   */
  public function validationData(): array
  {
    return $this->all();
  }
}
