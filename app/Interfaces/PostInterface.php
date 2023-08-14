<?php

interface PostInterface
{
    public function get_items();
    public function get_items_with_trash();
    public function find_item($id);
    public function find_item_with_trash($id);
    public function store_item($data);
    public function update_item($data, $id);
    public function delete_item($id);
    public function posts_with_category_and_author();
    public function posts_in_category_with_author($category_id);
}
