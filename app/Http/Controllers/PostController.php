<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\StorePostRequest;
use App\Http\Requests\Post\UpdatePostRequest;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{
    private \PostInterface $post;
    private \CategoryInterface $category;

    public function __construct(\PostInterface $post, \CategoryInterface $category)
    {
        $this->post = $post;
        $this->category = $category;
    }

    public function index(): object
    {
        try {
            $posts = $this->post->get_items_with_trash();
        }
        catch (\Exception $e)
        {
            Log::info($e->getMessage());
            $posts = [];
        }
        return response()->json([
            'posts' => $posts
        ]);
    }

    public function show($id): object
    {
        try {
            $post = $this->post->find_item_with_trash($id);
        }
        catch (\Exception $e)
        {
            Log::error($e->getMessage());
            return response()->json([
                'message' => 'Item Not Found'
            ],404);
        }
        return response()->json([
            'post' => $post
        ]);
    }

    public function create()
    {
        try {
            $categories = $this->category->select_items();
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

    public function store(StorePostRequest $request): object
    {
        $request = $request->validated();
        try {
            $post = $this->post->store_item($request);
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
            'post' => $post
        ], 201);
    }

    public function update(UpdatePostRequest $request, $id): object
    {
        $request = $request->validated();
        try {
            $this->post->update_item($request, $id);
        }
        catch (\Exception $e)
        {
            Log::error($e->getMessage());
            return response()->json([
                'message' => 'Error in update item'
            ],400);
        }
        return response()->json([
            'message' => 'New item added successfully'
        ]);
    }

    public function destroy($id): object
    {
        try {
            $this->post->delete_item($id);
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
