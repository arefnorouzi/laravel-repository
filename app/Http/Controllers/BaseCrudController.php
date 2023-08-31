<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;

abstract class BaseCrudController extends Controller
{
    const PAGINATE_COUNT = 10;

    final public function _index($columns): object
    {
        try {
            $model = $this->repository
                ->get_items_with_trash(self::PAGINATE_COUNT, $columns);
        }
        catch (\Exception $e)
        {
            Log::info($e->getMessage());
            $model = [];
        }
        return response()->json([
            'model' => $model
        ]);
    }

    public function show($id): object
    {
        try {
            $model = $this->repository->find_by_id($id);
        }
        catch (\Exception $e)
        {
            Log::error($e->getMessage());
            return response()->json([
                'message' => 'Item Not Found'
            ],404);
        }
        return response()->json([
            'model' => $model
        ]);
    }

    final public function _store($request): object
    {
        try {
            $model = $this->repository->store_item($request);
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
            'model' => $model
        ], 201);
    }


    final public function _update($request, $id): object
    {
        try {
            $this->repository->update_item($request, $id);
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
            $this->repository->delete_item($id);
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
