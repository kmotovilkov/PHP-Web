<?php
if (isset($_GET['categories']) && isset ($_GET['tags']) && isset($_GET['months'])) {

    $categoriesArr = explode(", ", $_GET['categories']);
    $tagsArr = explode(", ", $_GET['tags']);
    $monthsArr = explode(", ", $_GET['months']);

    echo "<h2>Categories</h2><ul>";
    foreach ($categoriesArr as $categorie) {
        echo "<li>$categorie</li>";
    }
    echo "</ul><h2>Tags</h2><ul>";
    foreach ($tagsArr as $tags) {
        echo "<li>$tags</li>";
    }
    echo "</ul><h2>Months</h2><ul>";
    foreach ($monthsArr as $month) {
        echo "<li>$month</li>";
    }
    echo "</ul>";
}
?>

<form>
    <div>Categories:
        <input type="text" name="categories"/></div>
    <div>Tags:
        <input type="text" name="tags"/></div>
    <div>Months:
        <input type="text" name="months"/></div>
    <div><input type="submit" name="Generate"/></div>
</form>
