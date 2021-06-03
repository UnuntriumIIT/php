<?php
namespace app\domain\repository;


use app\domain\entity\StatusEntity;

/**
 * Интерфейс репозитория задач
 */
interface IStatusRepository
{
    public function findAll(array $params): array;
    public function findByPk(int $pk): ?StatusEntity;
}