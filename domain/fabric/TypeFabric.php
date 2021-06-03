<?php
namespace app\domain\fabric;

use app\domain\entity\TypeEntity;

/**
 * Фабрика задач
 */
class TypeFabric
{
    /**
     * @param array $params
     * @return TypeEntity
     */
    public static function instance(array $params)
    {
        return new TypeEntity(
            $params['id'] ?? null,
            $params['name'] ?? ''
        );
    }
}