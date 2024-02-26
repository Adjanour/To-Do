<?php

class TaskAssignment
{
    private $id;
    private $taskId;
    private $taskStatusId;
    private $taskPriorityId;
    private $taskAssignerUserId;
    private $taskAssigneeUserId;
    private $taskName;
    private $taskDescription;
    private $taskAssigneeFirstName;
    private $taskAssigneeLastName;
    private $taskAssignerFirstName;
    private $taskAssignerLastName;
    private $taskStatusName;
    private $taskPriorityName;
    private $taskProgress;
    private $taskRemarks;
    private $taskIsActive;

    public function __construct(
        int $id,
        Task $task,
        float $taskProgress = 0.0,
        ?string $taskRemarks = null,
        int $taskAssigneeUserId,
        int $taskIsActive = 1 ,
        string $taskName = null ,
        string $taskDescription = null,
        string $taskAssigneeFirstName = null,
        string $taskAssigneeLastName = null,
        string $taskAssignerFirstName = null,
        string $taskAssignerLastName = null,
        string $taskStatusName = null,
        string $taskPriorityName = null,
        ) {
        $this->id = $id;
        $this->taskAssignerUserId = $task->getUserId();
        $this->taskAssigneeUserId = $taskAssigneeUserId;
        $this->taskId = $task->getTaskId();
        $this->taskStatusId = $task->getTaskStatus();
        $this->taskPriorityId = $task->getTaskPriority();
        $this->taskProgress = $taskProgress;
        $this->taskRemarks = $taskRemarks;
        $this->taskIsActive = $taskIsActive;
        $this->taskName = $taskName;
        $this->taskDescription = $taskDescription;
        $this->taskAssigneeFirstName = $taskAssigneeFirstName;
        $this->taskAssigneeLastName = $taskAssigneeLastName;
        $this->taskAssignerFirstName = $taskAssignerFirstName;
        $this->taskAssignerLastName = $taskAssignerLastName;
        $this->taskStatusName = $taskStatusName;
        $this->taskPriorityName = $taskPriorityName;
    }


    public function getId(): int
    {
        return $this->id;
    }

    public function getTaskName(): string
    {
        return $this->taskName;
    }

    public function getTaskDescription(): string
    {
        return $this->taskDescription;
    }

    public function getAssigneeFirstName(): string
    {
        return $this->taskAssigneeFirstName;
    }

    public function getAssigneeLastName(): string
    {
        return $this->taskAssigneeLastName;
    }

    public function getTaskStatusName(): string
    {
        return $this->taskStatusName;
    }

    public function getPriorityName(): string
    {
        return $this->taskPriorityName;
    }

    public function getProgress(): float
    {
        return $this->taskProgress;
    }

    public function getRemarks(): ?string
    {
        return $this->taskRemarks;
    }

    public function getTaskAssignerUserId(): int
    {
        return $this->taskAssignerUserId;
    }

    public function getTaskAssigneeUserId(): int
    {
        return $this->taskAssigneeUserId;
    }

    public function getTaskId(): int
    {
        return $this->taskId;
    }

    public function getTaskStatusId(): int
    {
        return $this->taskStatusId;
    }

    public function getTaskPriorityId(): int
    {
        return $this->taskPriorityId;
    }

    public function getIsActive(): int
    {
        return $this->taskIsActive;
    }

    public function setTaskAssignerUserId(int $taskAssignerUserId): void
    {
        $this->taskAssignerUserId = $taskAssignerUserId;
    }

    public function setTaskAssigneeUserId(int $taskAssigneeUserId): void
    {
        $this->taskAssigneeUserId = $taskAssigneeUserId;
    }

    public function setTaskId(int $taskId): void
    {
        $this->taskId = $taskId;
    }

    public function setTaskStatusId(int $taskStatusId): void
    {
        $this->taskStatusId = $taskStatusId;
    }

    public function setTaskPriorityId(int $taskPriorityId): void
    {
        $this->taskPriorityId = $taskPriorityId;
    }

    public function setIsActive(int $taskIsActive): void
    {
        $this->taskIsActive = $taskIsActive;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function setTaskName(string $taskName): void
    {
        $this->taskName = $taskName;
    }

    public function setTaskDescription(string $taskDescription): void
    {
        $this->taskDescription = $taskDescription;
    }

    public function setAssigneeFirstName(string $assigneeFirstName): void
    {
        $this->taskAssigneeFirstName = $assigneeFirstName;
    }

    public function setAssigneeLastName(string $assigneeLastName): void
    {
        $this->taskAssigneeFirstName = $assigneeLastName;
    }

    public function setTaskStatusName(string $taskStatusName): void
    {
        $this->taskStatusName = $taskStatusName;
    }

    public function setPriorityName(string $priorityName): void
    {
        $this->taskPriorityName = $priorityName;
    }

    public function setProgress(float $progress): void
    {
        $this->taskProgress = $progress;
    }

    public function setRemarks(?string $remarks): void
    {
        $this->taskRemarks = $remarks;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'taskId' => $this->taskId,
            'taskStatusId' => $this->taskStatusId,
            'taskPriorityId' => $this->taskPriorityId,
            'taskAssignerUserId' => $this->taskAssignerUserId,
            'taskAssigneeUserId' => $this->taskAssigneeUserId,
            'taskName' => $this->taskName,
            'taskDescription' => $this->taskDescription,
            'taskAssigneeFirstName' => $this->taskAssigneeFirstName,
            'taskAssigneeLastName' => $this->taskAssigneeLastName,
            'taskAssignerFirstName' => $this->taskAssignerFirstName,
            'taskAssignerLastName' => $this->taskAssignerLastName,
            'taskStatusName' => $this->taskStatusName,
            'taskPriorityName' => $this->taskPriorityName,
            'taskProgress' => $this->taskProgress,
            'taskRemarks' => $this->taskRemarks,
            'taskIsActive' => $this->taskIsActive,
        ];
    }

    public function toJson(): string
    {
        return json_encode($this->toArray());
    }

    

    public function __toString(): string
    {
        return $this->toJson();
    }









}
