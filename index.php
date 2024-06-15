<?php
session_start();

if (!isset($_SESSION['tasks'])) {
    $_SESSION['tasks'] = [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['new_task'])) {
        $_SESSION['tasks'][] = $_POST['new_task'];
    } elseif (isset($_POST['delete_task'])) {
        array_splice($_SESSION['tasks'], $_POST['delete_task'], 1);
    } elseif (isset($_POST['update_task']) && isset($_POST['task_index'])) {
        $_SESSION['tasks'][$_POST['task_index']] = $_POST['update_task'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anime To-do App</title>
    <link rel="stylesheet" href="styles2.css">
</head>
<body>
    <div class="app-container">
        <header>
            <h1>Anime To-do App</h1>
        </header>
        <main>
            <div class="input-container">
                <form method="post">
                    <input type="text" name="new_task" id="new-task" placeholder="Add a new task" required>
                    <button type="submit" id="add-task-btn">Add</button>
                </form>
            </div>
            <ul id="task-list">
                <?php foreach ($_SESSION['tasks'] as $index => $task): ?>
                <li>
                    <form method="post" class="task-form">
                        <input type="hidden" name="delete_task" value="<?php echo $index; ?>">
                        <button type="submit" class="task-button delete-button">Delete</button>
                    </form>
                    <div class="task-display">
                        <input type="text" value="<?php echo htmlspecialchars($task); ?>" class="task-input" disabled>
                        <button class="task-button edit-button" onclick="enableEditing(this)">Edit</button>
                    </div>
                    <form method="post" class="task-form edit-form" style="display:none;">
                        <input type="hidden" name="task_index" value="<?php echo $index; ?>">
                        <input type="text" name="update_task" value="<?php echo htmlspecialchars($task); ?>" class="task-input">
                        <button type="submit" class="task-button save-button">Save</button>
                        <button type="button" class="task-button cancel-button" onclick="cancelEditing(this)">Cancel</button>
                    </form>
                </li>
                <?php endforeach; ?>
            </ul>
            <div class="back-button-container">
                <a href="index.html" class="back-button">Back to Home</a>
            </div>
        </main>
        <footer>
            <p>&copy; 2024 Anime To-do App. All rights reserved.</p>
        </footer>
    </div>
    <script src="scripts.js"></script>
</body>
</html>
