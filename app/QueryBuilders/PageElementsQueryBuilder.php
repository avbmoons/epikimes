<?php

namespace App\QueryBuilders;

use App\Models\PageElement;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

final class PageElementsQueryBuilder extends QueryBuilder
{
  public Builder $model;

  public function __construct()
  {
    $this->model = PageElement::query();
  }

  public function getAll(): Collection
  {
    return $this->model->get(); //->groupBy('page');
  }

  public function getElementsForPage( string $page): Collection
  {
    return $this->model->where('page', $page)->get()->keyBy('element_key');
  }

  public function getElementsForGlobalBlocks(array $pages): Collection
  {
    return $this->model->whereIn('page', $pages)->get();
  }

  public function getElementsWithPagination(int $quantity = 10): LengthAwarePaginator
  {
    $search = request()->query('search');
    return PageElement::query()
      ->when($search, function($q) use ($search) {
        $q->where(function($inner) use ($search) {
          if (is_numeric($search)) {
            $inner->where('id', $search);
          } else {
            $inner->whereRaw('1 = 0');
          }
              $inner->orWhere('page', 'LIKE', "%{$search}%")
              ->orWhere('title', 'LIKE', "%{$search}%")
              ->orWhere('image_path', 'LIKE', "%{$search}%")
              ->orWhere('color', 'LIKE', "%{$search}%")
              ->orWhere('is_visible', 'LIKE', "%{$search}%")
              ->orWhereRaw("DATE_FORMAT(updated_at, '%d.%m.%Y %H:%i') LIKE CONCAT('%', ?, '%')", [$search]);
        });
      })
      ->orderBy('id', 'asc')
      //->groupBy('page')
      ->paginate($quantity)
      ->withQueryString();
  }
}