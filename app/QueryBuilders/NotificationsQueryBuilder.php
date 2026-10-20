<?php

namespace App\QueryBuilders;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Pagination\LengthAwarePaginator;
use Override;

final class NotificationsQueryBuilder extends QueryBuilder
{
  public Builder $model;

  public function __construct()
  {
    $this->model = DatabaseNotification::query();
  }

  public function getAll(): Collection
  {
    return $this->model->get();
  }

  public function getNotificationsWithPagination(int $quantity = 8): LengthAwarePaginator
  {
    $search = request()->query('search');
    return DatabaseNotification::query()
    ->when($search, function($q) use ($search) {
      $q->where(function($inner) use ($search) {
        $inner->when(is_numeric($search), function($sub) use ($search) {
          $sub->where('notifiable_id', $search);
        });
        // if (is_numeric($search)) {
        //   $inner->where('notifiable_id', $search);
        // } else {
        //   $inner->whereRaw('1 = 0');
        // }
            $inner->orWhere('data->title', 'LIKE', "%{$search}%")
            ->orWhere('data->message', 'LIKE', "%{$search}%")
            // ->orWhere('notifiable_id', 'LIKE', "%{$search}%")
            ->orWhereRaw("DATE_FORMAT(created_at, '%d.%m.%Y %H:%i') LIKE CONCAT('%', ?, '%')", [$search])
            ->orWhereHas('notifiable', function ($userQuery) use ($search) {
              $userQuery->where('name', 'LIKE', "%{$search}%")
                        ->orWhere('email', 'LIKE', "%{$search}%");
            });
      });
    })
    ->orderBy('created_at', 'desc')
    ->paginate($quantity)
    ->withQueryString();
  }
}
