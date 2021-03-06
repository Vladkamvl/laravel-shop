<?php


namespace App\Repositories;

use App\Models\ShopCategory as Model;

class ShopCategoryRepository extends CoreRepository
{


    /**
     * @return string
     */
    protected function getModelClass()
    {
        return Model::class;
    }

    /**
     * @return Model
     */
    public function getAll(){
        $columns = ['id', 'title', 'description', 'image'];

        $categories = $this->startCondition()
            ->select($columns)
            ->orderBy('created_at', 'DESC')
            ->get();

        return $categories;
    }

    /**
     * @param int $id
     */
    public function getById($id){
        $columns = ['id', 'title', 'description', 'image'];
        $category = $this->startCondition()
            ->find($id);
        return $category;
    }
}
