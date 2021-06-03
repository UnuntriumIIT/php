<?php
namespace app\domain\repository;

use app\domain\entity\TypeEntity;

/**
 * Интерфейс репозитория задач
 */
interface ITypeRepository
{
    public function findAll(array $params): array;
    public function findByPk(int $pk): ?TypeEntity;
}