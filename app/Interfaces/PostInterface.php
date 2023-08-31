<?php
namespace App\Interfaces;

interface PostInterface
{
    public function posts_with_category_and_author();
    public function posts_in_category_with_author($category_id);
}
