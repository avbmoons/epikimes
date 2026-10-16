<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PageElements\EditRequest;
use App\Models\PageElement;
use App\QueryBuilders\PageElementsQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PageElementsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PageElementsQueryBuilder $pageElementsQueryBuilder): View
    {
        $elementsList = $pageElementsQueryBuilder->getElementsWithPagination(10); //getAll();

        return \view('admin.elements.index', [
            'elementsList' => $elementsList
        ]);
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
    public function edit(PageElement $element): View
    {
        return \view('admin.elements.edit', [
            'element' => $element,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditRequest $request, PageElement $element): RedirectResponse
    {
        $data = $request->safe()->except(['image']);
        $element->fill($data);
        //$element->fill($request->validated());

        $element->is_visible = $request->has('is_visible');

        if ($request->hasFile('image')) {
            $fileName = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('elements', $fileName, 'public');
            $element->image_path = $fileName;
        }

        if ($element->save()) {
            return redirect()->route('admin.elements.index');
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
