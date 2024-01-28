<?php 
    $title = 'Home';
    require_once 'includes/header.php'; 
    require_once 'services/color.php'; 

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST['id'];
        $result = delete($id);
        if ($result) {
            header('Location: index.php');
            exit();
        } else {
            echo 'Query error: ' . mysqli_error($conn);
        }
    }

    $sql = "SELECT * FROM color";
    if (isset($_GET['search']) && !empty($_GET['search'])) {
        $search = mysqli_real_escape_string($conn, $_GET['search']);
        $sql .= " WHERE title LIKE '%$search%'";
    }
    $result = mysqli_query($conn, $sql);
?>

<section class="container">
    <h1 style="color: #007bff;">Color Palette</h1>
    <a href="add.php" class="add-button">Add Color</a>
    <form class="search-form" method="GET">
        <input type="text" name="search" placeholder="Search by name">
        <button type="submit" class="search-button">Search</button>
    </form>

    <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <div class="color-item" style="border: 2px solid <?php echo htmlspecialchars($row['code']); ?>;">
            <h3 style="color: <?php echo htmlspecialchars($row['code']); ?>;">
                <?php echo htmlspecialchars($row['title']); ?>
            </h3>
            <p style="color: #555;"><?php echo htmlspecialchars($row['code']); ?></p>
            <div class="action-buttons-container">
                <a href="edit.php?id=<?php echo $row['id']; ?>&title=<?php echo urlencode($row['title']); ?>&code=<?php echo urlencode($row['code']); ?>" class="action-button edit-button">
                    Edit
                </a>

                <form method="post" class="delete-form">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <button type="submit" class="action-button delete-button" name="delete">Delete</button>
                </form>
            </div>
        </div>
    <?php endwhile; ?>
</section>

<style>
    .container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
    }

    .add-button,
    .search-button,
    .edit-button,
    .delete-button {
        background-color: #007bff;
        color: white;
        padding: 10px 15px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        text-decoration: none;
        display: inline-block;
        margin-right: 10px;
        margin-bottom: 10px;
        transition: background-color 0.3s ease;
    }

    .add-button:hover,
    .search-button:hover,
    .edit-button:hover,
    .delete-button:hover {
        background-color: #0056b3;
    }

    .search-form {
        margin-bottom: 20px;
    }

    .color-item {
        padding: 15px;
        margin-bottom: 20px;
        border-radius: 8px;
    }

    .action-buttons-container {
        display: flex;
        align-items: center;
    }

    .delete-form {
        margin-left: auto;
    }
</style>

<?php require_once 'includes/footer.php'; ?>