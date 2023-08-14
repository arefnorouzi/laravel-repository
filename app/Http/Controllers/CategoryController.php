<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{
    private \CategoryInterface $category;

    public function __construct(\CategoryInterface $category)
    {
        $this->category = $category;
    }

    public function index(): object
    {
        try {
            $categories = $this->category->get_items_with_trash();
        }
        catch (\Exception $e)
        {
            Log::info($e->getMessage());
            $categories = [];
        }
        return response()->json([
            'categories' => $categories
        ]);
    }

    public function show($id): object
    {
        try {
            $category = $this->category->find_item_with_trash($id);
        }
        catch (\Exception $e)
        {
            Log::error($e->getMessage());
            return response()->json([
                'message' => 'Item Not Found'
            ],404);
        }
        return response()->json([
            'category' => $category
        ]);
    }

    public function create()
    {
        //todo
    }

    public function store()
    {
        //todo
    }

    public function update()
    {
        //todo
    }

    public function destroy($id): object
    {
        try {
            $this->category->delete_item($id);
        }
        catch (\Exception $e)
        {
            Log::error($e->getMessage());
            return response()->json([
                'message' => 'Error in delete item'
            ],400);
        }
        return response()->json([
            'message' => 'Item Deleted Successfully'
        ]);
    }
}
