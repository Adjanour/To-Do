<?php
// Include necessary files
global $ConnStrx;
require_once './utils/functions.php';
require_once './config/dbconn.php';
include './repositories/TaskAssignementRepository.php';

// Create instance of TaskAssignmentRepository
$taskRepository = new TaskAssignmentRepository($ConnStrx);

// Fetch tasks from the repository
$tasks = $taskRepository->getTaskAssignments();
?>

    <div class="container">
        <h1>Task Manager</h1>

        <!-- Task List -->
        <table>
            <thead>
            <tr>
                <th>Task Name</th>
                <th>Assignee</th>
                <th>Assigner</th>
                <th>Status</th>
                <th>Priority</th>
                <th>Start Date</th>
                <th>End Date</th>
            </tr>
            </thead>
            <tbody>
<?php
// Check if tasks exist
if ($tasks) {
    // Display tasks
    foreach ($tasks as $task) {
        echo "<tr>";
        echo "<td>" . $task['taskName'] . "</td>";
        echo "<td>" . $task['taskAssigneeFirstName'] . " " . $task['taskAssigneeLastName'] . "</td>";
        echo "<td>" . $task['taskAssignerFirstName'] . " " . $task['taskAssignerLastName'] . "</td>";
        echo "<td>" . $task['taskStatus'] . "</td>";
        echo "<td>" . $task['taskPriority'] . "</td>";
        echo "<td>" . $task['taskStartDate'] . "</td>";
        echo "<td>" . $task['taskEndDate'] . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='7'>No tasks found</td></tr>";
}
?>
            </tbody>
        </table>


        <button class="add-task-btn" onclick="location.href='add_task.php';">Add New Task</button>
    </div>

