<?php
namespace app\infrastructure\repository;

use app\domain\entity\TypeEntity;
use app\domain\fabric\TypeFabric;
use app\domain\repository\ITypeRepository;;
use app\models\Type;

/**
 * Реализация репозитория задач
 */
class TypeRepository implements ITypeRepository
{
    /**
     * @param array $params
     * @return array
     */
    public function findAll(array $params): array
    {
        return array_map(function ($task) {
            return TypeFabric::instance($task->attributes);
        }, Type::find()->all());
    }

    /**
     * @param int $pk
     * @return TypeEntity|null
     */
    public function findByPk(int $pk): ?TypeEntity
    {
        $status = Type::findOne(['id' => $pk]);
        return TypeFabric::instance($status->attributes);
    }
}