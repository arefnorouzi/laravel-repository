<?php

namespace App\Repositories;

use App\Interfaces\WritePostInterface;
use App\Abstracts\WriteAbstractRepository;
use App\Models\Post;

class WritePostRepository extends WriteAbstractRepository implements WritePostInterface
{
    protected Post $model;

    public function __construct(Post $model)
    {
        $this->model = $model;
    }
}
