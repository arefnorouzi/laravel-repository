<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\StorePostRequest;
use App\Http\Requests\Post\UpdatePostRequest;
use App\Interfaces\CategoryInterface;
use App\Interfaces\PostInterface;
use Illuminate\Support\Facades\Log;

class PostController extends BaseCrudController
{
    protected PostInterface $repository;
    protected CategoryInterface $categoryRepository;
    const COLUMNS = ['id', 'title', 'deleted_at'];

    public function __construct(PostInterface $repository, CategoryInterface $categoryRepository)
    {
        $this->repository = $repository;
        $this->categoryRepository = $categoryRepository;
    }

    public function index(): object
    {
        return parent::_index(self::COLUMNS);
    }

    public function store(StorePostRequest $request): object
    {
        $request = $request->validated();
        //do something
        return parent::_store($request);
    }

    public function update(UpdatePostRequest $request, $id): object
    {
        $request = $request->validated();
        //do something
        return parent::_update($request, $id);
    }

    public function create(): object
    {
        try {
            $categories = $this->categoryRepository->select_items();
        }
        catch (\Exception $e)
        {
            Log::error($e->getMessage());
            $categories = [];
        }
        return response()->json([
            'categories' => $categories
        ]);
    }

    public function edit(int $id): object
    {
        try {
            $model = $this->repository->find_by_id_with_trash($id);
            $categories = $this->categoryRepository->select_items();
        }
        catch (\Exception $e)
        {
            Log::error($e->getMessage());
            return response()->json([
                'message' => 'Item Not Found'
            ],404);
        }
        return response()->json([
            'model' => $model,
            'categories' => $categories
        ]);
    }
}
