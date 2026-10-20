<?php

namespace App\QueryBuilders;

use App\Models\Mail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class MailsQueryBuilder extends QueryBuilder
{
  public Builder $model;

  public function __construct()
  {
    $this->model = Mail::query();
  }

  function getAll(): Collection
  {
    return Mail::query()->get();
  }

  public function getMailsByStatus(string $status): Collection
  {
    return Mail::query()->where('status', $status)->get();
  }

  public function getMailsActive(): Collection
  {
    return Mail::query()->where('status', 'active')->get();
  }

  public function getMailById(int $id): Collection
  {
    return Mail::query()->where('id', $id)->get();
  }

  public function getMailsByUserId(int $userId): Collection
  {
    return Mail::query()->where('user_id', $userId)->get();
  }

  public function getMailsWithPagination(int $quantity = 10): LengthAwarePaginator
  {
    $search = request()->query('search');

    return Mail::query()
            ->when($search, function ($q) use ($search) {
                $q->where(function($inner) use ($search) {
                    $inner->where('id', $search)
                    ->orWhere('username', 'LIKE', "%{$search}%")
                    ->orWhere('email', 'LIKE', "%{$search}%")
                    ->orWhere('description', 'LIKE', "%{$search}%")
                    ->orWhere('status', 'LIKE', "%{$search}%")
                    ->orWhere('updated_at', 'LIKE', "%{$search}%");
                });
            })
            ->orderBy('id', 'asc') // 'desc'
            ->paginate(10)
            ->withQueryString();

  }
}
