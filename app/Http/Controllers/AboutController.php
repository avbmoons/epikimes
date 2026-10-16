<?php

namespace App\Http\Controllers;

use App\QueryBuilders\PageElementsQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index():View
    {
        $builder = new PageElementsQueryBuilder();
        $elements = $builder->getElementsForPage('about');

        return \view('about.index', compact('elements'));
    }
}
