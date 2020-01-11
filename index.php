<?php 

// MySQLi
// connect to database
$conn = mysqli_connect('localhost', 'jarek', 'C@8hC6&kGLteE#A', 'recipes');

// check connection
if(!$conn){
    echo "Connection error: " . mysqli_connect_error();
}

// 3 step to get data from database

// 1 
// write query for all recipes
$sql = 'SELECT title, ingredients, id FROM recipes ORDER BY created_at';

// 2
// make query and get result
$result = mysqli_query($conn, $sql);

// 3
// fetch the rows from previous step as an array
$recipes = mysqli_fetch_all($result, MYSQLI_ASSOC);

// ...and also
// free result from memory
mysqli_free_result($result);

// close connection
mysqli_close($conn);

// print result to the screen
// print_r($recipes)

?>



<!DOCTYPE html>
<html lang="en">
<?php include('templates/header.php'); ?>

<h1 class="text-center">Recipes</h1>
<div class="container">
    <div class="row">

    <?php foreach ($recipes as $recipe) { ?>

        <div class="col col-12 col-sm-6 col-md-6 col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?php echo htmlspecialchars($recipe['title']); ?></h5>
                    <ul class="list-group">
                    <?php foreach(explode(',', $recipe['ingredients']) as $ingredient) { ?>
                        <li class="list-group-item"><?php echo htmlspecialchars($ingredient); ?></li>
                    <?php } ?>
                    </ul>
                <div class="card-footer text-right">
                <a href="#" class="card-link">Details</a>
                </div>
                </div>
            </div>
        </div>

    <?php } ?>


    </div>
</div>

<?php 

    

?>


<?php include('templates/footer.php'); ?>
    
</html>