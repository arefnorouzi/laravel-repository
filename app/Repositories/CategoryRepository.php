<?php
namespace App\Repositories;

use App\Interfaces\CategoryInterface;
use App\Abstracts\ReadAbstractRepository;
use App\Models\Category;

class CategoryRepository extends ReadAbstractRepository implements CategoryInterface
{
    protected Category $model;

    public function __construct(Category $model)
    {
        $this->model = $model;
    }

    public function category_with_posts($id, $count)
    {
        return $this->model->whereId($id)
            ->with('posts:id,title,slug,category_id')
            ->paginate($count);
    }

    public function select_items()
    {
        return $this->model->get(['id','title']);
    }
}
