<?php
namespace app\domain\repository;


use app\domain\entity\CommentEntity;

/**
 * Интерфейс репозитория задач
 */
interface ICommentRepository
{
    public function findByTaskId(int $taskId): array;
    public function save(CommentEntity $entity): void;
}