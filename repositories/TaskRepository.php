<?php

class TaskRepository {
    private $connection;
    
    public function __construct(mysqli $connection) {
        $this->$connection = $connection;
    }
    
    public function addTask($task) {
        $query = "INSERT INTO tbltasks (tskName, tskDescription, tskEndDate, tskStaIdfk, tskPriorityIdfk) VALUES (:taskName, :taskDescription, :taskDueDate, :taskStatus, :taskPriority, :taskCategory, :taskUserId)";
        $statement = $this->connection->prepare($query);
        $statement->bindValue(':taskName', $task->getTaskName());
        $statement->bindValue(':taskDescription', $task->getTaskDescription());
        $statement->bindValue(':taskDueDate', $task->getTaskDueDate());
        $statement->bindValue(':taskStatus', $task->getTaskStatus());
        $statement->bindValue(':taskPriority', $task->getTaskPriority());
        $statement->bindValue(':taskCategory', $task->getTaskCategory());
        $statement->bindValue(':taskUserId', $task->getTaskUserId());
        $statement->execute();
        $statement->closeCursor();
    }
    
    public function getTasks($userId) {
        $query = "SELECT * FROM tbltasks WHERE tskIdpk = :userId";
        $statement = $this->connection->prepare($query);
        $statement->bindValue(':userId', $userId);
        $statement->execute();
        $tasks = $statement->fetchAll();
        $statement->closeCursor();
        return $tasks;
    }
    
    public function getTask($taskId) {
        $query = "SELECT * FROM tbltasks WHERE tskIdpk = :taskId";
        $statement = $this->connection->prepare($query);
        $statement->bindValue(':taskId', $taskId);
        $statement->execute();
        $task = $statement->fetch();
        $statement->closeCursor();
        return $task;
    }

    
    
    public function updateTask($task) {
        $query = "UPDATE tbltasks SET taskName = :taskName, taskDescription = :taskDescription, taskDueDate = :taskDueDate, taskStatus = :taskStatus, taskPriority = :taskPriority, taskCategory = :taskCategory WHERE taskId = :taskId";
        $statement = $this->connection->prepare($query);
        $statement->bindValue(':taskName', $task->getTaskName());
        $statement->bindValue(':taskDescription', $task->getTaskDescription());
    }

    public function completeTask($taskId) {
        $query = "UPDATE tbltasks SET taskStatus = 'Complete' WHERE taskId = :taskId";
        $statement = $this->connection->prepare($query);
        $statement->bindValue(':taskId', $taskId);
        $statement->execute();
        $statement->closeCursor();
    }

    public function changeTaskstatus($taskId, $status) {
        $query = "UPDATE tbltasks SET taskStatus = :status WHERE taskId = :taskId";
        $statement = $this->connection->prepare($query);
        $statement->bindValue(':status', $status);
        $statement->bindValue(':taskId', $taskId);
        $statement->execute();
        $statement->closeCursor();
    }   

    public function deleteTask($taskId) {
        $query = "DELETE FROM tbltasks WHERE taskId = :taskId";
        $statement = $this->connection->prepare($query);
        $statement->bindValue(':taskId', $taskId);
        $statement->execute();
        $statement->closeCursor();
    }

    public function getTaskStatuses() {
        $query = "SELECT * FROM tbltaskStatuses";
        $statement = $this->connection->prepare($query);
        $statement->execute();
        $statuses = $statement->fetchAll();
        $statement->closeCursor();
        return $statuses;
    }

    public function getTaskPriorities() {
        $query = "SELECT * FROM tblpriorities";
        $statement = $this->connection->prepare($query);
        $statement->execute();
        $priorities = $statement->fetchAll();
        $statement->closeCursor();
        return $priorities;
    }



}