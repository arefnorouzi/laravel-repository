<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category\StoreCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Interfaces\CategoryInterface;
use App\Interfaces\WriteCategoryInterface;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{
    private CategoryInterface $category;
    private WriteCategoryInterface $write_category;
    private int $paginate_count;

    public function __construct(CategoryInterface $category, WriteCategoryInterface $write_category)
    {
        $this->category = $category;
        $this->write_category = $write_category;
        $this->paginate_count = 10;
    }

    public function index(): object
    {
        try {
            $categories = $this->category
                ->get_items_with_trash($this->paginate_count, ['id','title','deleted_at']);
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

    public function store(StoreCategoryRequest $request): object
    {
        $request = $request->validated();
        try {
            $category = $this->write_category->store_item($request);
        }
        catch (\Exception $e)
        {
            Log::error($e->getMessage());
            return response()->json([
                'message' => 'Error in store item'
            ],400);
        }
        return response()->json([
            'message' => 'New item added successfully',
            'category' => $category
        ], 201);
    }

    public function update(UpdateCategoryRequest $request, $id): object
    {
        $request = $request->validated();
        try {
            $this->write_category->update_item($request, $id);
        }
        catch (\Exception $e)
        {
            Log::error($e->getMessage());
            return response()->json([
                'message' => 'Error in update item'
            ],400);
        }
        return response()->json([
            'message' => 'Item updated successfully',
        ]);
    }

    public function destroy($id): object
    {
        try {
            $this->write_category->delete_item($id);
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
