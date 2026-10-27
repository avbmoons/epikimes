<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use App\Models\Item;
use App\Models\Mail;
use App\Models\User;
use Illuminate\Http\Request;

class StartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $itemsCh = Item::pluck('title');
        $itemsString = Item::pluck('status');

        $colorsCh = Color::pluck('title');

        $categoriesCh = Category::pluck('title');
        $categoriesString = Category::pluck('status');

        $usersCh = User::pluck('name');
        $usersString = User::pluck('is_admin');

        $mailsCh = Mail::pluck('username');
        $mailsString = Mail::pluck('status');

        $itemsWithColors = Item::with('colors')->get();
        $colorsWithItems = Color::with('items')->get();

        return \view('admin.start.index', compact('itemsCh', 'itemsString', 'colorsCh', 'categoriesCh', 'categoriesString', 'usersCh', 'usersString', 'mailsCh', 'mailsString', 'itemsWithColors', 'colorsWithItems'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
