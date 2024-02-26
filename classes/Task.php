<?php
class Task {
    private $taskId;
    private $taskName;
    private $taskDescription;
    private $taskEndDate;
    private $taskStartDate;
    private $taskStatus;
    private $taskPriority;
    private $taskSlug;
    private $userId;

    public function __construct($taskId,$taskName, $taskDescription, $taskEndDate, $taskStartDate, $taskStatus, $taskPriority, $taskSlug,$userId) {
        $this->taskName = $taskName;
        $this->taskDescription = $taskDescription;
        $this->taskEndDate = $taskEndDate;
        $this->taskStartDate = $taskStartDate;
        $this->taskStatus = $taskStatus;
        $this->taskPriority = $taskPriority;
        $this->taskSlug = $taskSlug;
        $this->userId = $userId;
    }

    public function getTaskId() {
        return $this->taskId;
    }

    public function getTaskName() {
        return $this->taskName;
    }

    public function getTaskDescription() {
        return $this->taskDescription;
    }

    public function getTaskEndDate() {
        return $this->taskEndDate;
    }

    public function getTaskStartDate() {
        return $this->taskStartDate;
    }

    public function getTaskStatus() {
        return $this->taskStatus;
    }

    public function getTaskPriority() {
        return $this->taskPriority;
    }

    public function getTaskSlug() {
        return $this->taskSlug;
    }

    public function getUserId() {
        return $this->userId;
    }

    public function setTaskId($taskId) {
        $this->taskId = $taskId;
    }

    public function setTaskName($taskName) {
        $this->taskName = $taskName;
    }

    public function setTaskDescription($taskDescription) {
        $this->taskDescription = $taskDescription;
    }

    public function setTaskEndDate($taskEndDate) {
        $this->taskEndDate = $taskEndDate;
    }

    public function setTaskStartDate($taskStartDate) {
        $this->taskStartDate = $taskStartDate;
    }

    public function setTaskStatus($taskStatus) {
        $this->taskStatus = $taskStatus;
    }

    public function setTaskPriority($taskPriority) {
        $this->taskPriority = $taskPriority;
    }

    public function setTaskSlug($taskSlug) {
        $this->taskSlug = $taskSlug;
    }

    public function setUserId($userId) {
        $this->userId = $userId;
    }

    public function __toString() {
        return "Task Name: " . $this->taskName . " Task Description: " . $this->taskDescription . " Task End Date: " . $this->taskEndDate . " Task Start Date: " . $this->taskStartDate . " Task Status: " . $this->taskStatus . " Task Priority: " . $this->taskPriority . " Task Slug: " . $this->taskSlug . " User Id: " . $this->userId;
    }



}