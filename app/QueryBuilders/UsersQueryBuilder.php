<?php

namespace App\QueryBuilders;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Override;

final class UsersQueryBuilder extends QueryBuilder
{
  public Builder $model;

  public function __construct()
  {
    $this->model = User::query();
  }

  public function getAll(): Collection
  {
    return $this->model->get();
  }

  public function getUserById(int $id): Collection
  {
    return User::query()->where('id', $id)->get();
  }

  public function getUsersWithPagination(int $quantity = 10): LengthAwarePaginator
    {
        $search = request()->query('search');

        return User::query()
            ->when($search, function ($q) use ($search) {
                $q->where(function($inner) use ($search) {
                    $inner->where('id', $search)
                    ->orWhere('name', 'LIKE', "%{$search}%")
                    ->orWhere('email', 'LIKE', "%{$search}%")
                    ->orWhere('is_admin', 'LIKE', "%{$search}%")
                    ->orWhere('last_login_at', 'LIKE', "%{$search}%");
                });
            })
            ->orderBy('id', 'desc') // 'asc'
            ->paginate(10)
            ->withQueryString();

    }


}
