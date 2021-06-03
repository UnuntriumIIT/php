<?php


namespace app\infrastructure\repository;

use app\domain\entity\CostEntity;
use app\domain\fabric\CostFabric;
use app\domain\repository\ICostRepository;
use app\models\Cost;
use Throwable;

class CostRepository implements ICostRepository
{
    /**
     * @param int $taskId
     * @return array
     */
    public function findByTaskId(int $taskId): array
    {
        $costs = Cost::findAll(['task_id' => $taskId]);
        return array_map(function ($item) {
            return CostFabric::instance($item->attributes);
        }, $costs);
    }

    /**
     * @param CostEntity $entity
     * @throws Throwable
     */
    public function save(CostEntity $entity): void
    {
        try {
            $cost = new Cost();
            $cost->text = $entity->getText();
            $cost->cost = $entity->getCost();
            $cost->task_id = $entity->getTaskId();
            $cost->save();
        } catch (\Exception $e) {
            var_dump($e->getMessage());die;
        }
    }
}