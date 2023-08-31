<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category\StoreCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Interfaces\CategoryInterface;

class CategoryController extends BaseCrudController
{
    protected CategoryInterface $repository;
    const COLUMNS = ['id', 'title', 'deleted_at'];

    public function __construct(CategoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function index(): object
    {
        return parent::_index(self::COLUMNS);
    }

    public function store(StoreCategoryRequest $request): object
    {
        $request = $request->validated();
        //do something
        return parent::_store($request);
    }

    public function update(UpdateCategoryRequest $request, $id): object
    {
        $request = $request->validated();
        //do something
        return parent::_update($request, $id);
    }

    public function create()
    {
        //todo
    }
    public function edit($id)
    {
        //todo
    }

}
