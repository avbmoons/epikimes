<?php

namespace App\QueryBuilders;

use App\Models\Category;
use App\Models\Color;
use Brick\Math\BigInteger;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

final class CategoriesQueryBuilder extends QueryBuilder
{
  public Builder $model;

  public function __construct()
  {
    $this->model = Category::query();
  }

  public function getAll(): Collection
  {
    return $this->model->get();
  }

  public function getCategoriesByStatus(string $status): Collection
  {
    return Category::query()->where('status', $status)->get();
  }

  public function getCategoriesActive(): Collection
  {
    return Category::query()->where('status', 'active')->get();
  }

  public function getCategoryById(int $id): Collection
  {
    return Category::query()->where('id', $id)->get();
  }

  public function getCategoriesWithPagination(int $quantity = 10): LengthAwarePaginator
  {
    $search = request()->query('search');
    return Category::query()
    ->when($search, function($q) use ($search) {
      $q->where(function($inner) use ($search) {
        if (is_numeric($search)) {
          $inner->where('id', $search);
        } else {
          $inner->whereRaw('1 = 0');
        }
            $inner->orWhere('title', 'LIKE', "%{$search}%")
            ->orWhere('description', 'LIKE', "%{$search}%")
            ->orWhere('status', 'LIKE', "%{$search}%")
            ->orWhereRaw("DATE_FORMAT(updated_at, '%d.%m.%Y %H:%i') LIKE CONCAT('%', ?, '%')", [$search]);
      });
    })
    ->orderBy('id', 'asc')
    ->paginate($quantity)
    ->withQueryString();

    //return $this->model->paginate($quantity);
  }
}