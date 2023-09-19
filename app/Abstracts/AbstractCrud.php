<?php
namespace App\Abstracts;
abstract class AbstractCrud
{

    public function getModel()
    {
        return $this->model;
    }

    public function find_by_id($id)
    {
        return $this->getModel()->findOrFail($id);
    }

    public function find_by_id_with_trash($id)
    {
        return $this->getModel()->withTrashed()->findOrFail($id);
    }

    public function get_items($count, $columns)
    {
        return $this->getModel()->paginate($count, $columns);
    }

    public function get_items_with_trash($count, $columns)
    {
        return $this->getModel()->withTrashed()->paginate($count, $columns);
    }

    public function store_item($data)
    {
        return $this->getModel()->create($data);
    }

    public function update_item($data, $id)
    {
        return $this->getModel()->whereId($id)->update($data);
    }

    public function delete_item($id)
    {
        return $this->getModel()->destroy($id);
    }

}
