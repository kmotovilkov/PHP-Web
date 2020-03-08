<form method="post">
    <input type="hidden" name="product_id" value="<?=$product['product_id']?>"/>
    <table>
        <tr>
            <th>Product_id:</th>
            <td><?=$product['product_id']?></td>
        </tr>
        <tr>
            <th>Name:</th>
            <td><input type="text" name="product_name" value="<?=$product['product_name']?>"/></td>
        </tr>
        <tr>
            <th>Price:</th>
            <td><input type="text" name="price" value="<?=$product['price']?>"/></td>
        </tr>
        <tr>
            <th>Description:</th>
            <td><textarea name="description"><?=$product['description']?></textarea></td>
        </tr>
        <tr>
            <th>Category</th>
            <td>
                <select name="cat_id">
                    <option></option>
                    <?php foreach($categories_obj->getList() as $category): ?>
                        <?php $selected = $product['cat_id']==$category['cat_id']?'selected':'';?>
                        <option value="<?=$category['cat_id']?>" <?=$selected?>><?=$category['cat_name']?></option>
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