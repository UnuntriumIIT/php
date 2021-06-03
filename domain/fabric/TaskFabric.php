<?php
namespace app\domain\fabric;

use app\domain\entity\TaskEntity;

/**
 * Фабрика задач
 */
class TaskFabric
{
    /**
     * @param array $params
     * @return TaskEntity
     */
    public static function instance(array $params): TaskEntity
    {
        return new TaskEntity(
            $params['id'] ?? null,
            $params['title'] ?? '',
            $params['description'] ?? '',
            $params['status'] ?? null,
            $params['type'] ?? null,
            $params['comments'] ?? null,
            $params['costs'] ?? null,
            $params['author'] ?? ''
        );
    }

    /**
     * @return TaskEntity
     */
    public static function empty(): TaskEntity
    {
        return new TaskEntity();
    }
}