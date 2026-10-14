<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\QueryBuilders\CategoriesQueryBuilder;
use App\QueryBuilders\ColorsQueryBuilder;
use App\QueryBuilders\ItemsQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index(ItemsQueryBuilder $itemsQueryBuilder, CategoriesQueryBuilder $categoriesQueryBuilder, ColorsQueryBuilder $colorsQueryBuilder):View
    {
        $itemsList = $itemsQueryBuilder->getAllWithSearch();
        return (\view('catalog.index', [
            'categories' => $categoriesQueryBuilder->getAll(),
            'colors' => $colorsQueryBuilder->getAll(),
            'itemsList' => $itemsList,
        ]));
    }

    public function show(int $id, Item $item, CategoriesQueryBuilder $categoriesQueryBuilder, ColorsQueryBuilder $colorsQueryBuilder): View
    {
        $item = Item::findOrFail($id);

        return \view('catalog.show', [
            'item' => $item,
            'categories' => $categoriesQueryBuilder->getAll(),
            'colors' => $colorsQueryBuilder->getAll(),
        ]);
    }
}
