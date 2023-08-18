<?php
namespace App\Abstracts;
class ReadAbstractRepository
{

    public function find_item($id)
    {
        $this->model->findOrFail($id);
    }

    public function find_item_with_trash($id)
    {
        $this->model->withTrashed()->findOrFail($id);
    }

    public function get_items($count, array $columns)
    {
        return $this->model->paginate($count, $columns);
    }

    public function get_items_with_trash($count, array $columns)
    {
        return $this->model->withTrashed()->paginate($count, $columns);
    }

}
