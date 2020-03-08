<?php

spl_autoload_register();

$db = DBConnection::getConnection();
$products_obj = new Products($db);
$categories_obj = new Categories($db);

$product = ['product_id'=>'','product_name'=> '', 'price'=>'','description'=>''];

if($_POST){
    $db->beginTransaction();
    $product_id = $_POST['product_id']??null;
    $product_name = $_POST['product_name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $cat_id = $_POST['cat_id'];

    if(!$product_id) {
        $product_id = $products_obj->createProduct($product_name, $price, $description, $cat_id);
        $mode = 1;
    }else{
        $products_obj->updateProduct($product_id,$product_name, $price, $description, $cat_id);
        $mode = 2;
    }
    $db->commit();
    header('Location: view_product.php?product_id='.$product_id.'&mode='.$mode);
    exit;

}elseif(isset($_GET['product_id'])){
    $product = $products_obj->getOne($_GET['product_id']);

}
include 'header.php';
include 'edit_form.php';
include 'footer.php';