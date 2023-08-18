<?php
namespace App\Interfaces;

interface PostInterface
{
    public function get_items($count, array $columns);
    public function get_items_with_trash($count, array $columns);
    public function find_item($id);
    public function find_item_with_trash($id);
    public function posts_with_category_and_author($count);
    public function posts_in_category_with_author($category_id, $count);
}
