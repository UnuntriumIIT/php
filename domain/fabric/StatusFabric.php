<?php
namespace app\domain\fabric;

use app\domain\entity\StatusEntity;

/**
 * Фабрика задач
 */
class StatusFabric
{
    /**
     * @param array $params
     * @return StatusEntity
     */
    public static function instance(array $params) : StatusEntity
    {

        return new StatusEntity(
            $params['id'] ?? null,
            $params['name'] ?? ''
        );
    }
}