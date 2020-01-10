<?php

$email = $name = $surname = $title = $ingredients = '';
$errors = array('email'=>'', 'name'=>'', 'surname'=>'', 'title'=>'', 'ingredients'=>'');

if(isset($_POST['submit'])){
    // echo htmlspecialchars($_POST['email']);
    // echo htmlspecialchars($_POST['name']);
    // echo htmlspecialchars($_POST['surname']);
    // echo htmlspecialchars($_POST['title']);
    // echo htmlspecialchars($_POST['ingredients']);

    // check email
    if(empty($_POST['email'])) {
        $errors['email'] = "An email is required <br/>";
    } else {
        $email = $_POST['email'];
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) { 
            $errors['email'] = "Email must be a valid email address!";
        }
        // echo htmlspecialchars($_POST['email']);
    }

    // check name
    if(empty($_POST['name'])) {
        $errors['name'] = "A name is required";
    } else {
        $name = $_POST['name'];
        // if(!preg_match('/^[a-zA-Z\s]+$/', $name)) {
        if(!preg_match('/^[\s\p{L}]+$/u', $name)) {
            $errors['name'] = "Name must be letters and spaces only";
        }
        // echo htmlspecialchars($_POST['name']);
    }

    // check surname
    if(empty($_POST['surname'])) {
        $errors['surname'] = "A surname is required";
    } else {
        $surname = $_POST['surname'];
        // if(!preg_match('/^[a-zA-Z\s]+$/', $surname)) {
        if(!preg_match('/^[\s\p{L}]+$/u', $surname)) {
            $errors['surname'] = "Surname must be letters and spaces only";
        }
        // echo htmlspecialchars($_POST['surname']);
    }

    //  check title
    if(empty($_POST['title'])) {
        $errors['title'] = "A title is required";
    } else {
        $title = $_POST['title'];
        // if(!preg_match('/^[a-zA-Z\s]+$/', $title)) {
        if(!preg_match('/^[\s\p{L}]+$/u', $title)) {
            $errors['title'] = "Title must be letters and spaces only";
        }
        // echo htmlspecialchars($_POST['title']);
    }

    // check ingredients
    if(empty($_POST['ingredients'])) {
        $errors['ingredients'] = "At least one ingredient is required";
    } else {
        $ingredients = $_POST['ingredients'];
        if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)) {
            $errors['ingredients'] = "Ingredients must be a comma separated list";
        }
        // echo htmlspecialchars($_POST['ingredients']);
    }

    if(array_filter($errors)){
        // echo "There are errors in the form";
    } else {
        // echo "Form is valid";
        header('Location: index.php');
    }

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
        <input class="form-control" type="text" name="email" id="email" value="<?php echo htmlspecialchars($email) ?>" />
        <div class="text-danger"><?php echo $errors['email']; ?></div>
        </div>
        <div class="form-group">
        <label for="name">Your Name:</label>
        <input class="form-control" type="text" name="name" id="name" value="<?php echo htmlspecialchars($name) ?>" />
        <div class="text-danger"><?php echo $errors['name']; ?></div>
        </div>
        <div class="form-group">
        <label for="surname">Your Surname:</label>
        <input class="form-control" type="text" name="surname" id="surname" value="<?php echo htmlspecialchars($surname) ?>" />
        <div class="text-danger"><?php echo $errors['surname']; ?></div>
        </div>
        <div class="form-group">
        <label for="title">Recipe Title:</label>
        <input class="form-control" type="text" name="title" id="title" value="<?php echo htmlspecialchars($title) ?>" />
        <div class="text-danger"><?php echo $errors['title']; ?></div>
        </div>
        <div class="form-group">
        <label for="ingredients">Ingredients (comma separated):</label>
        <input class="form-control" type="text" name="ingredients" id="ingredients" value="<?php echo htmlspecialchars($ingredients) ?>" />
        <div class="text-danger"><?php echo $errors['ingredients']; ?></div>
        </div>
        <button type="submit" name="submit" class="btn btn-primary btn-sm">Submit</button>
    </form>
    </div>
    </div>
</div>

<?php include('templates/footer.php'); ?>
    
</html>