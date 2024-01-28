<?php 
    $title = 'Edit';
    require_once 'includes/header.php';

    require_once 'services/color.php';

    $id = isset($_GET['id']) ? $_GET['id'] : null;
    $title = isset($_GET['title']) ? urldecode($_GET['title']) : '';
    $code = isset($_GET['code']) ? urldecode($_GET['code']) : '';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = isset($_POST['id']) ? $_POST['id'] : null;
        $title = isset($_POST['title']) ? $_POST['title'] : '';
        $code = isset($_POST['code']) ? $_POST['code'] : '';

        $id = filter_var($id, FILTER_VALIDATE_INT);
        $title = mysqli_real_escape_string($conn, $title);
        $code = mysqli_real_escape_string($conn, $code);

        if ($id === false) {
            echo 'Invalid ID.';
        } else {
            $result = update($id, $title, $code);

            if ($result) {
                header('Location: index.php');
                exit();
            } else {
                echo 'Query error: ' . mysqli_error($conn);
            }
        }
    }
?>

<section class="container">
    <form method="post">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
        <input type="text" name="title" value="<?php echo htmlspecialchars($title); ?>">
        <input type="color" name="code" value="<?php echo htmlspecialchars($code); ?>">
        <button type="submit" name="update"> Update </button>
    </form>
</section>

<?php require_once 'includes/footer.php'; ?>