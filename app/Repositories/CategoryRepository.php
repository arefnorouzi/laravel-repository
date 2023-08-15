<?php
namespace App\Repositories;

use App\Interfaces\CategoryInterface;
use App\Models\Category;

class CategoryRepository implements CategoryInterface
{
    public function get_items_with_trash()
    {
        return Category::withTrashed()->paginate(10);
    }

    public function get_items()
    {
        return Category::paginate(10);
    }

    public function find_item($id)
    {
        return Category::findOrFail($id);
    }

    public function find_item_with_trash($id)
    {
        return Category::withTrashed()->findOrFail($id);
    }

    public function category_with_posts($id)
    {
        return Category::whereId($id)
            ->with('posts:id,title,slug,category_id')
            ->paginate(10);
    }

    public function select_items()
    {
        return Category::get(['id','title']);
    }
}
