<?php /** @var \DTO\ProductDTO $data */ ?>
<form method="post">
    <input type="hidden" name="product_id" value="<?=$data->getProductId()?>"/>
    <table>
        <tr>
            <th>Product_id:</th>
            <td><?=$data->getProductId()?></td>
        </tr>
        <tr>
            <th>Name:</th>
            <td><input type="text" name="product_name" value="<?=$data->getProductName()?>"/></td>
        </tr>
        <tr>
            <th>Price:</th>
            <td><input type="text" name="price" value="<?=$data->getPrice()?>"/></td>
        </tr>
        <tr>
            <th>Description:</th>
            <td><textarea name="description"><?=$data->getDescription()?></textarea></td>
        </tr>
        <tr>
            <th>Category</th>
            <td>
                <select name="cat_id">
                    <option></option>
                    <?php foreach($data->getCatList() as $category): ?>
                        <?php $selected = $data->getCatId()==$category->getCatId()?'selected':'';?>
                        <option value="<?=$category->getCatId()?>" <?=$selected?>><?=$category->getCatName()?></option>
                    <?php endforeach; ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                <button type="submit" name="save" value="1">Create</button>
            </td>
        </tr>
    </table>
</form>