<?php /** @var \DTO\ProductDTO[] $data */
echo '<a href="/'.APP_ROOT.'/products/edit">Create new product</a>';
echo '<table border="1"><thead><tr><td>Id</td><td>Name</td><td>cat</td><td>Create date</td></tr></thead>';
foreach ($data as $product){
    echo '<tr>';
    echo '<td>'.$product->getProductId().'</td>';
    echo '<td>'.$product->getProductName().'</td>';
    echo '<td>'.$product->getCatName().'</td>';
    echo '<td>'.$product->getCreateDateFormated().'</td>';
    echo '<td><a href="products/view/'.$product->getProductId().'">View</a></td>';
    echo '<td><a href="products/edit/'.$product->getProductId().'">Edit</a></td>';
    echo '</tr>';
}
echo '</table>';