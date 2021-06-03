<?php
namespace app\domain\repository;

use app\domain\entity\TaskEntity;

/**
 * Интерфейс репозитория задач
 */
interface ITaskRepository
{
    public function findAll(array $params): array;
    public function findByPk(int $pk): ?TaskEntity;
    public function save(TaskEntity $entity): void;
    public function delete(int $pk): void;
}