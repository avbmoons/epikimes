<?php

namespace App\QueryBuilders;

use App\Models\Color;
use App\Models\Item;
use Brick\Math\BigInteger;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

final class ItemsQueryBuilder extends QueryBuilder
{
  public Builder $model;

  public function __construct()
  {
    $this->model = Item::query();
  }

  public function getAll(): Collection
  {
    return $this->model->get();
  }

  public function getAllWithSearch(): Collection
  {
    $search = request()->query('search');
    $isYearOnly = preg_match('/^\d{4}$/', trim($search));

    return Item::query()
    ->with(['categories', 'colors'])  
    ->when($search, function($q) use ($search, $isYearOnly) {
      $q->where(function($inner) use ($search, $isYearOnly) {
        if (is_numeric($search) && !$isYearOnly) {
          $inner->where('id', $search);
        } else {
          $inner->whereRaw('1 = 0');
        }
        
        if ($isYearOnly) {
          $inner->orWhere('year', '=', $search);
        } else {
        
            $inner->orWhere('title', 'LIKE', "%{$search}%")
            ->orWhere('description', 'LIKE', "%{$search}%")
            ->orWhere('palette', 'LIKE', "%{$search}%")
            ->orWhere('size', 'LIKE', "%{$search}%")
            ->orWhere('year', 'LIKE', "%{$search}%")
            ->orWhere('status', 'LIKE', "%{$search}%")
            // ->orWhereHas('categories', function($categoryQuery) use ($search) {
            //   $categoryQuery->where('title', 'LIKE', "%{$search}%");
            // })
            ->orWhereRaw("DATE_FORMAT(updated_at, '%d.%m.%Y %H:%i') LIKE CONCAT('%', ?, '%')", [$search])
            ->orWhereHas('categories', function($categoryQuery) use ($search) {
              $categoryQuery->where('title', 'LIKE', "%{$search}%");
            })
            ->orWhereHas('colors', function($colorQuery) use ($search) {
              $colorQuery->where('title', 'LIKE', "%{$search}%");
            });
          }  
      });
    })
    ->orderBy('id', 'asc')
    ->get();
    //->paginate($quantity)
    //->withQueryString();
    //return $this->model->paginate($quantity);
  }

  public function getItemsByStatus(string $status): Collection
  {
    return Item::query()->where('status', $status)->get();
  }

  public function getItemsActive(): Collection
  {
    return Item::query()->where('status', 'active')->get();
  }

  public function getItemsByColors(): Collection
  {
    return $this->model
        ->join('item_has_colors', 'items.id', '=', 'item_has_colors.item_id')
        ->join('colors', 'item_has_colors.color_id', '=', 'colors.id')
        ->select('items.id', 'items.title', 'items.description', 'items.palette', 'items.size', 'items.year', 'items.file_path', 'items.category_id', 'items.is_new', 'items.status',)
        ->orderBy('items.id')
        ->get();
  }

  public function getItemById(int $id): Collection
  {
    return Item::query()->where('id', $id)->get();
  }

  public function getItemsWithPagination(int $quantity = 10): LengthAwarePaginator
  {
    $search = request()->query('search');
    $isYearOnly = preg_match('/^\d{4}$/', trim($search));

    return Item::query()
    ->with(['categories', 'colors'])  
    ->when($search, function($q) use ($search, $isYearOnly) {
      $q->where(function($inner) use ($search, $isYearOnly) {
        if (is_numeric($search) && !$isYearOnly) {
          $inner->where('id', $search);
        } else {
          $inner->whereRaw('1 = 0');
        }
        
        if ($isYearOnly) {
          $inner->orWhere('year', '=', $search);
        } else {
        
            $inner->orWhere('title', 'LIKE', "%{$search}%")
            ->orWhere('description', 'LIKE', "%{$search}%")
            ->orWhere('palette', 'LIKE', "%{$search}%")
            ->orWhere('size', 'LIKE', "%{$search}%")
            ->orWhere('year', 'LIKE', "%{$search}%")
            ->orWhere('status', 'LIKE', "%{$search}%")
            // ->orWhereHas('categories', function($categoryQuery) use ($search) {
            //   $categoryQuery->where('title', 'LIKE', "%{$search}%");
            // })
            ->orWhereRaw("DATE_FORMAT(updated_at, '%d.%m.%Y %H:%i') LIKE CONCAT('%', ?, '%')", [$search])
            ->orWhereHas('categories', function($categoryQuery) use ($search) {
              $categoryQuery->where('title', 'LIKE', "%{$search}%");
            })
            ->orWhereHas('colors', function($colorQuery) use ($search) {
              $colorQuery->where('title', 'LIKE', "%{$search}%");
            });
          }  
      });
    })
    ->orderBy('id', 'desc')
    ->paginate($quantity)
    ->withQueryString();
    //return $this->model->paginate($quantity);
  }
}
