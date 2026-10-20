<?php

namespace App\Http\Controllers;

use App\QueryBuilders\ItemsQueryBuilder;
use App\QueryBuilders\PageElementsQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(ItemsQueryBuilder $itemsQueryBuilder):View
    {
        $builder = new PageElementsQueryBuilder();
        $elements = $builder->getElementsForPage('home');
        $newItems = $itemsQueryBuilder->getNewItems();

        return \view('home.index', [
            'elements' => $elements,
            'newItems' => $newItems,
        ]);
    }
}
