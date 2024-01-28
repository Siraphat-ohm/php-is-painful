<?php 
    $title = 'Add';
    require_once 'includes/header.php'; 
    require_once 'services/color.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (empty($_POST['title']) || empty($_POST['code'])) {
            echo 'Please fill out the form';
        } else {
            $title = $_POST['title'];
            $code = $_POST['code'];
            $result = add($title, $code);
            if ($result) {
                header('Location: index.php');
                exit();
            } else {
                echo 'Query error: ' . mysqli_error($conn);
            }
        }
    } 
?>

<div style="text-align: center; margin-top: 50px;">
    <form method="POST" style="max-width: 400px; margin: auto; padding: 20px; border: 1px solid #ccc; border-radius: 10px; background-color: #f8f9fa;">
        <h2 style="color: #007bff;"><?php echo $title; ?> Color</h2>
        <div style="margin-bottom: 15px;">
            <input type="text" name="title" placeholder="Title" style="width: 100%; padding: 10px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 5px;">
        </div>
        <div style="margin-bottom: 15px;">
            <input type="color" id="code" name="code" value="#000000" style="width: 100%; padding: 10px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 5px;">
        </div>
        <button type="submit" style="background-color: #007bff; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">Add Color</button>
    </form>
</div>

<?php require_once 'includes/footer.php'; ?>
