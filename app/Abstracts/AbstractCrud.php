<?php
namespace App\Abstracts;
abstract class AbstractCrud
{

    public function find_by_id($id)
    {
        return $this->model->findOrFail($id);
    }

    public function find_by_id_with_trash($id)
    {
        return $this->model->withTrashed()->findOrFail($id);
    }

    public function get_items($count, $columns)
    {
        return $this->model->paginate($count, $columns);
    }

    public function get_items_with_trash($count, $columns)
    {
        return $this->model->withTrashed()->paginate($count, $columns);
    }

    public function store_item($data)
    {
        return $this->model->create($data);
    }

    public function update_item($data, $id)
    {
        return $this->model->whereId($id)->update($data);
    }

    public function delete_item($id)
    {
        return $this->model->destroy($id);
    }

}
