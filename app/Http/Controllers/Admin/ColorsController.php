<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Colors\CreateRequest;
use App\Http\Requests\Colors\EditRequest;
use App\Models\Color;
use App\QueryBuilders\ColorsQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ColorsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ColorsQueryBuilder $colorsQueryBuilder): View
    {
        $colorsList = $colorsQueryBuilder->getColorsWithPagination();
        return \view('admin.colors.index', [
            'colorsList' => $colorsList
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.colors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        $color = Color::create($request->validated());

        if ($color->save()) {
            return \redirect()->route('admin.colors.index');
        }
        return \back();
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
    public function edit(Color $color): View
    {
        return \view('admin.colors.edit', [
            'color' => $color,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditRequest $request, Color $color): RedirectResponse
    {
        $color = $color->fill($request->validated());

        if ($color->save()) {
            return redirect()->route('admin.colors.index');
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Color $color)
    {
        try {
            $color->delete();

            return \response()->json('ok');
        } catch (\Exception $exception) {
            //\Log::error($exception->getMessage(), [$exception]);

            return \response()->json('error', 400);
        }
    }
}
