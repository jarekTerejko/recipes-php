<?php 

if(isset($_POST['submit'])){
    echo htmlspecialchars($_POST['email']);
    echo htmlspecialchars($_POST['name']);
    echo htmlspecialchars($_POST['surname']);
    echo htmlspecialchars($_POST['title']);
    echo htmlspecialchars($_POST['ingredients']);
}


?>


<!DOCTYPE html>
<html lang="en">
<?php include('templates/header.php'); ?>

<div class="container">
<div class="row">
<div class="col-md-8 mx-auto">
    <h4>Add a Recipe</h4>
    <form action="add.php" method="POST">
    <div class="form-group">
        <label for="email">Your Email:</label>
        <input class="form-control" type="text" name="email" id="email" />
        </div>
        <div class="form-group">
        <label for="name">Your Name:</label>
        <input class="form-control" type="text" name="name" id="name" />
        </div>
        <div class="form-group">
        <label for="surname">Your Surname:</label>
        <input class="form-control" type="text" name="surname" id="surname" />
        </div>
        <div class="form-group">
        <label for="title">Recipe Title:</label>
        <input class="form-control" type="text" name="title" id="title" />
        </div>
        <div class="form-group">
        <label for="ingredients">Ingredients comma separated:</label>
        <input class="form-control" type="text" name="ingredients" id="ingredients" />
        </div>
        <button type="submit" name="submit" class="btn btn-primary btn-sm">Submit</button>
    </form>
    </div>
    </div>
</div>

<?php include('templates/footer.php'); ?>
    
</html>