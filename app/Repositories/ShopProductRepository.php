<?php


namespace App\Repositories;


use App\Models\ShopProduct as Model;

class ShopProductRepository extends CoreRepository
{
    /**
     * @return string
     */
    public function getModelClass()
    {
        return Model::class;
    }

    /**
     * @param null $perPage
     * @return Model
     */
    public function getAllWithPagination($perPage = null){
        $columns = ['id', 'title', 'description', 'image', 'category_id'];

        $products = $this->startCondition()
            ->select($columns)
            ->with(['category:id,title'])
            ->orderBy('created_at', 'DESC')
            ->paginate($perPage);

        return $products;
    }

    /**
     * @param int $id
     * @return Model
     */
    public function getById($id){
        $columns = ['id', 'title', 'description', 'image', 'category_id'];

        $product = $this->startCondition()
            ->select($columns)
            ->with(['category:id,title'])
            ->find($id);

        return $product;
    }
}
