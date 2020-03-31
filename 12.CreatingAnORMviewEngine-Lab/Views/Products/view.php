<?php /** @var \DTO\ProductDTO $data */ ?>
<form method="post">

    <table border="1">
        <tr>
            <th>Product_id:</th>
            <td><?=$data->getProductId()?></td>
        </tr>
        <tr>
            <th>Name:</th>
            <td><?=$data->getProductName()?></td>
        </tr>
        <tr>
            <th>Price:</th>
            <td><?=$data->getPrice()?></td>
        </tr>
        <tr>
            <th>Description:</th>
            <td><?=$data->getDescriptionOrNA()?></td>
        </tr>
        <tr>
            <th>Category</th>
            <td><?=$data->getCatName()?></td>
        </tr>
    </table>
</form>