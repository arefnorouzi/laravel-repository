<?php

namespace App\Repositories;

use App\Interfaces\WritePostInterface;
use App\Models\Post;

class WritePostRepository implements WritePostInterface
{
    public function store_item($data)
    {
        return Post::create($data);
    }

    public function update_item($data, $id)
    {
        return Post::whereId($id)->update($data);
    }

    public function delete_item($id)
    {
        return Post::destroy($id);
    }
}
