<?php
namespace App\Repositories;

use App\Interfaces\CategoryInterface;
use App\Models\Category;
use App\Abstracts\AbstractCrud;

class CategoryRepository extends AbstractCrud implements CategoryInterface
{
    protected Category $model;
    public function __construct(Category $model)
    {
        $this->model = $model;
    }

    public function category_with_posts($id, $count, $columns)
    {
        return $this->model->whereId($id)
            ->with('posts:id,title,slug,category_id')
            ->paginate($count, $columns);
    }

    public function select_items()
    {
        return $this->model->get(['id','title']);
    }
}
