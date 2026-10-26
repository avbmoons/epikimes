<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\QueryBuilders\ItemsQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImagesCleanerController extends Controller
{
    public function clear(Request $request): JsonResponse
    {
        $request->validate([
            'files' => 'required|array',
            'files.*' => 'string',
        ]);

        $filesToDelete = $request->input('files');
        $deletedCount = 0;

        foreach ($filesToDelete as $fileName) {
            $fileName = basename($fileName);
            $fullPath = 'catalog/' . $fileName;

            if (Storage::disk('public')->exists($fullPath)) {
                Storage::disk('public')->delete($fullPath);
                $deletedCount++;
            }
        }

        return response()->json([
            'ok' => true,
            'message' => "Success files deleted: {$deletedCount}"
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $dbImages = Item::whereNotNull('file_path')->pluck('file_path')->toArray();
        $diskFiles = Storage::disk('public')->files('catalog');
        $garbageFiles = [];

        foreach($diskFiles as $file) {
            $fileName = basename($file);
            if (str_starts_with($fileName,'.')) {
                continue;
            }

            if (!in_array($fileName, $dbImages)) {
                $garbageFiles[] = [
                    'name' => $fileName,
                    'full_path' => $file,
                    'size' => round(Storage::disk('public')->size($file)/1024, 2).'Kb',
                ];
            }
        }
        return \view('admin.images-cleaner.index', compact('garbageFiles'));
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
    // public function clear(Request $request): JsonResponse
    // {
    //     $request->validate([
    //         'files' => 'required|array',
    //         'files.*' => 'string',
    //     ]);

    //     $filesToDelete = $request->input('files');
    //     $deletedCount = 0;

    //     foreach ($filesToDelete as $fileName) {
    //         $fileName = basename($fileName);
    //         $fullPath = 'catalog/' . $fileName;

    //         if (Storage::disk('public')->exists($fullPath)) {
    //             Storage::disk('public')->delete($fullPath);
    //             $deletedCount++;
    //         }
    //     }

    //     return response()->json([
    //         'ok' => true,
    //         'message' => "Success files deleted: {$deletedCount}"
    //     ]);
    // }

    public function destroy(string $id)
    {
        //
    }
}
