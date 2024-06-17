<?php


class TaskAssignmentRepository
{
    private $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function getAllAssignments(): array
    {
        $sql = "SELECT
                    tka.tkaIdpk AS task_assignment_id,
                    tsk.tskName AS task_name,
                    tsk.tskDescription AS task_description,
                    usr.usrFirstName AS assignee_first_name,
                    usr.usrLastName AS assignee_last_name,
                    tas.staName AS task_status_name,
                    prt.prtName AS priority_name,
                    tka.tkaProgress AS task_progress,
                    tka.tkaRemarks AS task_remarks
                FROM tbltaskassignments tka
                JOIN tbltasks tsk ON tka.tkaTskIdfk = tsk.tskIdpk
                JOIN tblUsers usr ON tka.tkaAssigneeUsrIdfk = usr.usrIdpk
                JOIN tbltaskstatuses tas ON tka.tkaStaIdfk = tas.staIdpk
                JOIN tblpriorities prt ON tka.tkaPrtIdfk = prt.prtIdpk
                WHERE tkaIsActive = 1
                ORDER BY task_name;";

        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    public function getTaskAssignments(){
        $query = 'CALL GetTaskAssignments';
        $statement = $this->connection->prepare($query);
        $statement->execute();
        $result = $statement->get_result();

        $taskAssignments = array(); // Initialize an empty array to store the fetched data

        while ($row = $result->fetch_assoc()) {
            $taskAssignments[] = $row; // Append each fetched row to the array
        }

        return $taskAssignments;
    }


    public function getTaskAssignemntById($id){
        $query = 'CALL GetTaskAssignemntById(?)';
        $statement = $this->connection->prepare($query);
        $statement->bindValue(1, $id);
        $statement->execute();
        $taskAssignemnt = $statement->fetch();
        $statement->closeCursor();
        return $taskAssignemnt;
    }

    public function addTaskAssignemnt($taskAssignemnt){
        $query = 'CALL AddTaskAssignemnt(?,?,?,?,?,?,?,?)';
        $statement = $this->connection->prepare($query);
        $statement->bindValue(1, $taskAssignemnt->getTaskId());
        $statement->bindValue(2, $taskAssignemnt->getAssigneeId());
        $statement->bindValue(3, $taskAssignemnt->getStatusId());
        $statement->bindValue(4, $taskAssignemnt->getPriorityId());
        $statement->bindValue(5, $taskAssignemnt->getProgress());
        $statement->bindValue(6, $taskAssignemnt->getRemarks());
        $statement->bindValue(7, $taskAssignemnt->getIsActive());
        $statement->execute();
        $statement->closeCursor();
    }

    public function updateTaskAssignemnt($taskAssignemnt){
        $query = 'CALL UpdateTaskAssignemnt(?,?,?,?,?,?,?,?)';
        $statement = $this->connection->prepare($query);
        $statement->bindValue(1, $taskAssignemnt->getTaskId());
        $statement->bindValue(2, $taskAssignemnt->getAssigneeId());
        $statement->bindValue(3, $taskAssignemnt->getStatusId());
        $statement->bindValue(4, $taskAssignemnt->getPriorityId());
        $statement->bindValue(5, $taskAssignemnt->getProgress());
        $statement->bindValue(6, $taskAssignemnt->getRemarks());
        $statement->bindValue(7, $taskAssignemnt->getIsActive());
        $statement->execute();
        $statement->closeCursor();
    }

    public function deleteTaskAssignemnt($id){
        $query = 'CALL DeleteTaskAssignemnt(?)';
        $statement = $this->connection->prepare($query);
        $statement->bindValue(1, $id);
        $statement->execute();
        $statement->closeCursor();
    }

    // ... other methods for specific operations like adding, updating, or deleting task assignments ...
}
