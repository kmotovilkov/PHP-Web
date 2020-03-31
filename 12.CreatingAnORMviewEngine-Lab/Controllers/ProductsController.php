<?php

namespace Controllers;

use DTO\ProductDTO;
use Models\Categories;
use Models\Products;

class ProductsController extends BaseController
{

    public function index()
    {
        $model = new Products($this->db_connection);
        $data =  $model->getList();
        $this->view->renderView($data);
    }

    public function edit(?int $product_id)
    {

        $product = new ProductDTO();
        $model = new Products($this->db_connection);
        if ($_POST) {

            $product_name = $_POST['product_name'];
            $price = $_POST['price'];
            $description = $_POST['description'];
            $cat_id = $_POST['cat_id'];

            if (!$product_id) {
                $product_id = $model->createProduct($product_name, $price, $description, $cat_id);
                $mode = 1;
            } else {
                $model->updateProduct($product_id, $product_name, $price, $description, $cat_id);
                $mode = 2;
            }

            $this->redirect('/products/view/' . $product_id);

        } elseif ($product_id) {
            $product = $model->getOne($product_id);
        }

        $categories_model = new Categories($this->db_connection);
        $product->setCatList($categories_model->getList());

        $this->view->renderView($product);
    }

    public function view($product_id)
    {
        $model = new Products($this->db_connection);
        if (!$product_id) {
            throw new \Exception('No product id');
        }

        $product = $model->getOne($product_id);

        if (!$product) {
            throw new \Exception('No product found!');
        }

        $this->view->renderView($product);
    }

}
