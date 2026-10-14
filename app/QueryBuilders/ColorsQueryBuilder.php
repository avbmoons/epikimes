<?php

namespace App\QueryBuilders;

use App\Models\Color;
use Brick\Math\BigInteger;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

final class ColorsQueryBuilder extends QueryBuilder
{
  public Builder $model;

  public function __construct()
  {
    $this->model = Color::query();
  }

  public function getAll(): Collection
  {
    return $this->model->get();
  }

  public function getColorById(int $id): Collection
  {
    return Color::query()->where('id', $id)->get();
  }

  public function getColorsWithPagination(int $quantity = 10): LengthAwarePaginator
  {
    $search = request()->query('search');
    return Color::query()
    ->when($search, function($q) use ($search) {
      $q->where(function($inner) use ($search) {
        if (is_numeric($search)) {
          $inner->where('id', $search);
        } else {
          $inner->whereRaw('1 = 0');
        }
            $inner->orWhere('title', 'LIKE', "%{$search}%")
            ->orWhere('description', 'LIKE', "%{$search}%")
            ->orWhere('updated_at', 'LIKE', "%{$search}%")
            ->orWhereRaw("DATE_FORMAT(updated_at, '%d.%m.%Y %H:%i') LIKE CONCAT('%', ?, '%')", [$search]);
            //->orWhere('status', 'LIKE', "%{$search}%");
      });
    })
    ->orderBy('id', 'asc')
    ->paginate($quantity)
    ->withQueryString();
    //return $this->model->paginate($quantity);
  }
}