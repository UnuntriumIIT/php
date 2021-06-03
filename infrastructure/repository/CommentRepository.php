<?php
namespace app\infrastructure\repository;

use app\domain\entity\CommentEntity;
use app\domain\entity\UserEntity;
use app\domain\fabric\CommentFabric;
use app\domain\repository\ICommentRepository;
use app\models\Comment;
use Throwable;

/**
 * Реализация репозитория задач
 */
class CommentRepository implements ICommentRepository
{
    /**
     * @param int $taskId
     * @return array
     */
    public function findByTaskId(int $taskId): array
    {
        $comments = Comment::findAll(['task_id' => $taskId]);
        return array_map(function ($item) {
            return CommentFabric::instance($item->attributes);
        }, $comments);
    }

    /**
     * @param CommentEntity $entity
     * @throws Throwable
     */
    public function save(CommentEntity $entity): void
    {
        try {
            $comment = new Comment();
            $comment->text = $entity->getText();
            $comment->task_id = $entity->getTask();
            $comment->create_date = date("Y-m-d H:i:s");
            $comment->author = $entity->getAuthor();
            $comment->save();
        } catch (\Exception $e) {
            var_dump($e->getMessage());die;
        }
    }
}