<?php

namespace App\Repositories;

use App\Interfaces\WriteCategoryInterface;
use App\Models\Category;

class WriteCategoryRepository implements WriteCategoryInterface
{
    public function store_item($data)
    {
        return Category::create($data);
    }

    public function update_item($data, $id)
    {
        return Category::whereId($id)->update($data);
    }

    public function delete_item($id)
    {
        return Category::destroy($id);
    }
}
