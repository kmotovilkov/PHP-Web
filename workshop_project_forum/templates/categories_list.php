<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
    <link rel="stylesheet" href="templates/styles/all.css">
</head>
<body>
<div class="container">
    <table border="2">
        <thead>
        <tr>
            <th>Name</th>
            <th>Questions Count</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($categories as $category): ?>
            <tr>
                <td><a href="<?= url("category.php?id={$category['id']}"); ?>">
                        <?= $category['name']; ?></a></td>
                <td><?= $category['questions_count']; ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>
