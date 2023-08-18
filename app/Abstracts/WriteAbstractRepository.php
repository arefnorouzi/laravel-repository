<?php

namespace App\Abstracts;

class WriteAbstractRepository
{

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
        return $this->model->whereId($id)->delete();
    }
}
