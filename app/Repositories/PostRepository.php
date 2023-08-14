<?php
use App\Models\Post;
class PostRepository implements PostInterface
{
    public function get_items_with_trash()
    {
        return Post::withTrashed()->paginate(10);
    }

    public function get_items()
    {
        return Post::paginate(10);
    }

    public function find_item($id)
    {
        return Post::findOrFail($id);
    }

    public function find_item_with_trash($id)
    {
        return Post::withTrashed()->findOrFail($id);
    }

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

    public function posts_with_category_and_author()
    {
        return Post::orderby('id','desc')
            ->with(['category:id,title','user:id,name'])
            ->paginate(10, ['id', 'title', 'slug', 'category_id', 'user_id']);
    }

    public function posts_in_category_with_author($category_id)
    {
        return Post::where('category_id','=', $category_id)
            ->orderby('id','desc')
            ->with(['category:id,title','user:id,name'])
            ->paginate(10, ['id', 'title', 'slug', 'category_id', 'user_id']);
    }
}
