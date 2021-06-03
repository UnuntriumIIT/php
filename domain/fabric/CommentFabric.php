<?php
namespace app\domain\fabric;

use app\domain\entity\CommentEntity;

/**
 * Фабрика задач
 */
class CommentFabric
{
    /**
     * @param array $params
     * @return CommentEntity
     */
    public static function instance(array $params)
    {
        return new CommentEntity(
            $params['id'] ?? null,
            $params['text'] ?? '',
            $params['taskId'] ?? null,
            $params['date'] ?? '',
            $params['author'] ?? ''
        );
    }

    /**
     * @return CommentEntity
     */
    public static function empty(): CommentEntity
    {
        return new CommentEntity();
    }
}