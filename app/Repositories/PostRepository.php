<?php
namespace App\Repositories;
use App\Interfaces\PostInterface;
use App\Models\Post;
use App\Abstracts\AbstractCrud;
class PostRepository extends AbstractCrud implements PostInterface
{
    protected Post $model;
    public function __construct(Post $model)
    {
        $this->model = $model;
    }

    public function posts_with_category_and_author()
    {
        return $this->model->orderby('id','desc')
            ->with(['category:id,title','author:id,name'])
            ->paginate(10, ['id', 'title', 'slug', 'category_id', 'user_id']);
    }

    public function posts_in_category_with_author($category_id)
    {
        return $this->model->where('category_id','=', $category_id)
            ->orderby('id','desc')
            ->with(['category:id,title','user:id,name'])
            ->paginate(10, ['id', 'title', 'slug', 'category_id', 'user_id']);
    }
}
