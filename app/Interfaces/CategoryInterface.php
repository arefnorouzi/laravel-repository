<?php
namespace App\Interfaces;

interface CategoryInterface
{
    public function category_with_posts($id, $count, $columns);
    public function select_items();
}
