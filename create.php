<!-- PHP -->
<?php
    include( 'config\db_connect.php' );

    $title = $description = '';
    $errors = array('title' => '', 'description' => '');

    if (isset($_POST['submit'])) {
	    if (!(array_filter($errors))) {
            $title = mysqli_real_escape_string($conn , $_POST['title']);
            $description = mysqli_real_escape_string($conn , $_POST['description']);

            $sql = "INSERT INTO `todo` (`title`, `description`) VALUES( '$title' , '$description' )";

            if(mysqli_query($conn, $sql)){
                header('Location: index.php');
            } else{
                echo 'Query Error: ' . mysqli_error($conn);
            }
	    }	
    }
?>

<!-- HTML -->
<!DOCTYPE html>
<html lang="en">

<!-- Header and CSS -->
<link rel="stylesheet" href="styles\style.css">
<?php include('./templates/header.php'); ?>

    <!-- Main -->
    <main class="container mt-5">
        <div class="form-container">
            <form class="mx-auto bg-info rounded p-5" action="create.php" method="POST" style="max-width: 500px;">
                <label for="title" class="fw-bold mb-1">Title</label>
                <input type="text" name="title" placeholder="Task Title" class="form-control mb-3" required>
                <label for="description" class="fw-bold mb-1">Description</label>
                <textarea name="description" placeholder="Task Description" rows="4" class="form-control" style="resize: none;" required></textarea>
                <div class="d-grid gap-2">
                    <button class="btn btn-dark mt-3" type="submit" name="submit">Save</button>
                </div>
            </form>
        </div>
    </main>

    <!-- Footer -->
    <?php include('./templates/footer.php'); ?>

</body>

</html>