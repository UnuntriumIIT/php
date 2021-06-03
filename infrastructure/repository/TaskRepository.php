<?php
namespace app\infrastructure\repository;

use app\domain\entity\TaskEntity;
use app\domain\fabric\CommentFabric;
use app\domain\fabric\CostFabric;
use app\domain\fabric\StatusFabric;
use app\domain\fabric\TaskFabric;
use app\domain\fabric\TypeFabric;
use app\domain\repository\ITaskRepository;
use app\models\Comment;
use app\models\Cost;
use app\models\Status;
use app\models\Task;
use app\models\Type;

/**
 * Реализация репозитория задач
 */
class TaskRepository implements ITaskRepository
{
    /**
     * @param array $params
     * @return array
     */
    public function findAll(array $params): array
    {
        $query = Task::find();
        if (isset($params['id'])) {
            $query->andWhere(['id' => $params['id']]);
        }

        if (isset($params['title'])) {
            $query->andWhere(['title' => $params['title']]);
        }

        if (isset($params['description'])) {
            $query->andWhere(['description' => $params['description']]);
        }

        if (isset($params['type'])) {
            $query->andWhere(['type' => $params['type']]);
        }

        if (isset($params['status'])) {
            $query->andWhere(['status' => $params['status']]);
        }
        if (isset($params['author'])) {
            $query->andWhere(['author' => $params['author']]);
        }

        return array_map(function ($task) {
            $params = $task->attributes;
            $status = Status::findOne(['id' => $task->status]);
            $params['status'] = StatusFabric::instance($status->attributes);
            $type = Type::findOne(['id' => $task->type]);
            $params['type'] = TypeFabric::instance($type->attributes);
            $params['comments'] = array_map(function ($item) use ($task) {
                return CommentFabric::instance(
                    array_merge(
                        $item->attributes,
                        [
                            'task' => $task->id,
                            'date' => $item->create_date
                        ]
                    )
                );
            }, Comment::findAll(['task_id' => $task->id]));
            $params['costs'] = array_map(function ($item) use ($task) {
                return CostFabric::instance(
                    array_merge(
                        $item->attributes,
                        [
                            'task' => $task->id
                        ]
                    )
                );
            }, Cost::findAll(['task_id' => $task->id]));
            return TaskFabric::instance($params);
        }, $query->all());
    }

    /**
     * @param int $pk
     * @return TaskEntity|null
     */
    public function findByPk(int $pk): ?TaskEntity
    {
        $task = Task::findOne($pk);
        $params = $task->attributes;
        $status = Status::findOne(['id' => $task->status]);
        $params['status'] = StatusFabric::instance($status->attributes);
        $type = Type::findOne(['id' => $task->type]);
        $params['type'] = TypeFabric::instance($type->attributes);
        $params['comments'] = array_map(function ($item) use ($task) {
            return CommentFabric::instance(
                array_merge(
                    $item->attributes,
                    [
                        'task' => $task->id,
                        'date' => $item->create_date
                    ]
                )
            );
        }, Comment::findAll(['task_id' => $task->id]));
        $params['costs'] = array_map(function ($item) use ($task) {
            return CostFabric::instance(
                array_merge(
                    $item->attributes,
                    [
                        'task' => $task->id
                    ]
                )
            );
        }, Cost::findAll(['task_id' => $task->id]));
        return TaskFabric::instance($params);

    }

    /**
     * @param TaskEntity $entity
     * @throws \Throwable
     */
    public function save(TaskEntity $entity): void
    {
        try {
            if ($entity->getId()) {
                $task = Task::findOne(['id' => $entity->getId()]);
            } else {
                $task = new Task();
            }
            $task->title = $entity->getTitle();
            $task->description = $entity->getDescription();
            $task->status = $entity->getStatus()->getId();
            $task->type = $entity->getType()->getId();
            $task->author = $entity->getAuthor();
            $task->create_date = date("Y-m-d H:i:s");
            $task->save();
        } catch (\Exception $e) {
            var_dump($e->getMessage());die;
        }
    }

    /**
     * @param TaskEntity $entity
     * @throws \Throwable
     */
    public function delete(int $pk): void
    {
        $task = Task::findOne(['id' => $pk]);
        $task->delete();
    }

}