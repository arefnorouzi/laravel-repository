<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Interfaces\PostInterface;
use Illuminate\Support\Facades\Log;

class PostApiController extends Controller
{
    private PostInterface $post;
    private int $paginate_count;

    public function __construct(PostInterface $post)
    {
        $this->post = $post;
        $this->paginate_count = 10;
    }

    public function posts(): object
    {
        try {
            $posts = $this->post->posts_with_category_and_author($this->paginate_count);
        }
        catch (\Exception $e)
        {
            Log::info($e->getMessage());
            $posts = [];
        }
        return response()->json([
            'posts' => $posts
        ]);
    }

    public function posts_in_category($category_id): object
    {
        try {
            $posts = $this->post->posts_in_category_with_author($category_id);
        }
        catch (\Exception $e)
        {
            Log::info($e->getMessage());
            $posts = [];
        }
        return response()->json([
            'posts' => $posts
        ]);
    }
}
