<?php
namespace App\Interfaces;

interface CategoryInterface extends BaseInterface
{
    public function category_with_posts($id, $count);
    public function select_items();
}
