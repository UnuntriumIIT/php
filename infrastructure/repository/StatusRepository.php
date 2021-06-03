<?php
namespace app\infrastructure\repository;

use app\domain\entity\StatusEntity;
use app\domain\fabric\StatusFabric;
use app\domain\repository\IStatusRepository;
use app\models\Status;

/**
 * Реализация репозитория задач
 */
class StatusRepository implements IStatusRepository
{
    /**
     * @param array $params
     * @return array
     */
    public function findAll(array $params): array
    {
        return array_map(function ($task) {
            return StatusFabric::instance($task->attributes);
        }, Status::find()->all());
    }

    /**
     * @param int $pk
     * @return StatusEntity|null
     */
    public function findByPk(int $pk): ?StatusEntity
    {
        $status = Status::findOne(['id' => $pk]);
        return StatusFabric::instance($status->attributes);
    }
}