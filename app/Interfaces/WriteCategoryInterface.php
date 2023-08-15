<?php

namespace App\Interfaces;

interface WriteCategoryInterface
{
    public function store_item($data);
    public function update_item($data, $id);
    public function delete_item($id);
}
