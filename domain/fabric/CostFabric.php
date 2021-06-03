<?php


namespace app\domain\fabric;


use app\domain\entity\CostEntity;

class CostFabric
{
    /**
     * @param array $params
     * @return CostEntity
     */
    public static function instance(array $params): CostEntity
    {
        return new CostEntity(
            $params['id'] ?? null,
            $params['taskId'] ?? null,
            $params['text'] ?? '',
            $params['cost'] ?? null
        );
    }

    /**
     * @return CostEntity
     */
    public static function empty(): CostEntity
    {
        return new CostEntity();
    }
}