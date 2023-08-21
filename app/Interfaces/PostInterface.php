<?php
namespace App\Interfaces;

interface PostInterface extends BaseInterface
{
    public function posts_with_category_and_author($count);
    public function posts_in_category_with_author($category_id, $count);
}
