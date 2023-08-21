<?php

namespace App\Interfaces;

interface BaseInterface
{
    public function get_items($count, array $columns);
    public function get_items_with_trash($count, array $columns);
    public function find_item($id);
    public function find_item_with_trash($id);
}
