<?php


namespace app\domain\repository;

use app\domain\entity\CostEntity;

interface ICostRepository
{
    public function findByTaskId(int $taskId): array;
    public function save(CostEntity $entity): void;
}