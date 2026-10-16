<?php

namespace App\Http\Controllers;

use App\QueryBuilders\PageElementsQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index():View
    {
        $builder = new PageElementsQueryBuilder();
        $elements = $builder->getElementsForPage('home');

        return \view('home.index', compact('elements'));
    }
}
