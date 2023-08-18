<?php

namespace App\Repositories;

use App\Interfaces\WriteCategoryInterface;
use App\Abstracts\WriteAbstractRepository;
use App\Models\Category;

class WriteCategoryRepository extends WriteAbstractRepository implements WriteCategoryInterface
{
    protected Category $model;

    public function __construct(Category $model)
    {
        $this->model = $model;
    }
}
