<header>
        <h1>Welcome to My To-Do App</h1>
    </header>

    <div class="task-container">
        <h2 id="title">Your Tasks</h2>
        <!-- <ul>
            <?php
            // Include the database configuration file
            include '../config/db_conn.php';

            // Get all tasks from the database
            $query = "SELECT * FROM tasks";
            $result = mysqli_query($conn, $query);

            // Check if there are any tasks
            if (mysqli_num_rows($result) > 0) {
                // Loop through the tasks and display them
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<li>" . $row['task_name'] . "</li>";
                }
            } else {
                echo "<li>No tasks found</li>";
            }
            ?> -->
        <!-- Add a button to add new tasks -->
        <button onclick="location.href='add_task.php';">Add New Task</button>
    </div>