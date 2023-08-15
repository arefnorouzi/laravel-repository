<?php
namespace App\Interfaces;

interface CategoryInterface
{
    public function get_items();
    public function get_items_with_trash();
    public function find_item($id);
    public function find_item_with_trash($id);
    public function category_with_posts($id);
    public function select_items();
}
