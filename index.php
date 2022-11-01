<!-- PHP -->
<?php
    include('config/db_connect.php'); 
    $sql = 'SELECT * FROM `todo` ORDER BY `created_at`';
    $result = mysqli_query($conn, $sql); 
    $todo = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);
    mysqli_close($conn);
?>

<!-- HTML --> 
<!DOCTYPE html>
<html lang="en">
    
<!-- Header and CSS -->
<link rel="stylesheet" href="styles\style.css">
<?php include('./templates/header.php'); ?>

    <!-- Main -->
    <main class="container mt-5">
        <div class="main-header d-flex justify-content-between align-items-center">
            <h1 class="text-white">Tasks</h1>
            <a href="create.php" id="add-task" class="btn btn-primary px-3">Add +</a>
        </div>
        <hr class="border-white">
        <!-- All Tasks -->
        <div class="task-container">
            <?php foreach($todo as $todo) : ?>
                <!-- Task -->
                <div class="task bg-warning p-4 rounded">
                    <a href="details.php?id=<?php echo $todo['id'] ?>" class="text-dark">
                        <div class="task-info">
                            <h2><?php echo htmlspecialchars($todo['title']); ?></h2>
                            <p><?php echo htmlspecialchars($todo['description']); ?></p>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </main>

    <!--  Footer -->
    <?php include('./templates/footer.php'); ?>

</html>