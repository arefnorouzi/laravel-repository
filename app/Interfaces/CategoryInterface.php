<?php
namespace App\Interfaces;

interface CategoryInterface
{
    public function get_items($count, array $columns);
    public function get_items_with_trash($count, array $columns);
    public function find_item($id);
    public function find_item_with_trash($id);
    public function category_with_posts($id, $count);
    public function select_items();
}
