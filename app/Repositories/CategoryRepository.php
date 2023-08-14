<?php

use App\Models\Category;

class CategoryRepository implements CategoryInterface
{
    public function get_items_with_trash()
    {
        return Category::withTrashed()->all();
    }

    public function get_items()
    {
        return Category::all();
    }

    public function find_item($id)
    {
        return Category::findOrFail($id);
    }

    public function find_item_with_trash($id)
    {
        return Category::withTrashed()->findOrFail($id);
    }

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
