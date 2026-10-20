<?php

namespace App\Http\Controllers\Admin;

use App\Enums\Palette;
use App\Enums\Status;
use App\Http\Controllers\Controller;
use App\Http\Requests\Items\CreateRequest;
use App\Http\Requests\Items\EditRequest;
use App\Models\Item;
use App\QueryBuilders\CategoriesQueryBuilder;
use App\QueryBuilders\ColorsQueryBuilder;
use App\QueryBuilders\ItemsQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ItemsQueryBuilder $itemsQueryBuilder, CategoriesQueryBuilder $categoriesQueryBuilder): View
    {
        $itemsList = $itemsQueryBuilder->getItemsWithPagination(5);
        return \view('admin.catalog.index', [
            'itemsList' => $itemsList,
            'categories' => $categoriesQueryBuilder->getAll(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(CategoriesQueryBuilder $categoriesQueryBuilder, ColorsQueryBuilder $colorsQueryBuilder): View
    {
        return \view('admin.catalog.create', [
            'categories' => $categoriesQueryBuilder->getAll(),
            'colors' => $colorsQueryBuilder->getAll(),
            'statuses' => Status::all(),
            'palettes' => Palette::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request): RedirectResponse
    {
        $data = $request->safe()->except(['image']);

        $data['is_new'] = $request->has('is_new') ? 1 : 0;
        
        if (!isset($data['year'])) {
            $data['year'] = date('Y');
        }

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();

            $file->storeAs('catalog', $fileName, 'public');

            $data['file_path'] = $fileName;
        }
        
        $item = Item::create($data); //($request->validated());

        if ($item->save()) {
            $item->colors()->attach($request->getColorIds());
            return redirect()->route('admin.catalog.index')->with('success', 'Item created success');
        }
        return back()->with('error', 'Item did not saved');
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
    public function edit(Item $catalog, CategoriesQueryBuilder $categoriesQueryBuilder, ColorsQueryBuilder $colorsQueryBuilder): View
    {
        $statuses = Status::all();
        $palettes = Palette::all();

        return view('admin.catalog.edit', [
            'item' => $catalog,
            'categories' => $categoriesQueryBuilder->getAll(),
            'colors' => $colorsQueryBuilder->getAll(),
            'statuses' => $statuses,
            'palettes' => $palettes,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditRequest $request, Item $catalog): RedirectResponse
    {
        //dd($request->all(), $request->file('image'));

    
        $item = $catalog;
        $data = $request->safe()->except(['image']);

        $data['is_new'] = $request->has('is_new') ? 1 : 0;

        if ($request->hasFile('image')) {
            if ($item->file_path && Storage::disk('public')->exists('catalog/' . $item->file_path)) {
                Storage::disk('public')->delete('catalog/' . $item->file_path);
            }
            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();

            $file->storeAs('catalog', $fileName, 'public');

            $data['file_path'] = $fileName;            
        } else {
            $data['file_path'] = $item->file_path;
        }

        //$item = $item->fill($request->validated());

        //if ($item->save()) {
        if ($item->update($data)) {
            $item->colors()->sync($request->getColorIds());

            return redirect()->route('admin.catalog.index')->with('success', 'Changes are successful');
        }

        return \back()->with('error', 'No changes made');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $catalog)
    {
        try {
            $item = $catalog;   //->delete();

            if ($item->file_path && Storage::disk('public')->exists('catalog/' . $item->file_path)) {
                Storage::disk('public')->delete('catalog/' . $item->file_path);
            }

            $item->colors()->detach();

            $item->delete();

            return \response()->json('ok');
        } catch (\Exception $exception) {
            //\Log::error($exception->getMessage(), [$exception]);

            return \response()->json(['ok' => false, 'error' => $exception->getMessage()], 500);
        }
    }
}
