<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple To-Do List</title>
</head>
<body>
    <h1>Simple To-Do List</h1>

    <form action="addtask.php" method="post">
        <input type="text" name="task" placeholder="Enter task">
        <button type="submit">Add Task</button>
    </form>

    <h2>Tasks:</h2>
    <ul>
        <?php include 'tasks.php'; ?>
    </ul>
</body>
</html>
