<?php
namespace app\domain\service;

use app\domain\dto\TaskDto;
use app\domain\entity\TaskEntity;
use app\domain\fabric\TaskFabric;
use app\domain\repository\IStatusRepository;
use app\domain\repository\ITaskRepository;
use app\domain\repository\ITypeRepository;

/**
 * Сервис задач
 */
class TaskService
{
    private $taskRepository;
    private $statusRepository;
    private $typeRepository;

    /**
     * TaskService constructor.
     * @param ITaskRepository $taskRepository
     * @param IStatusRepository $statusRepository
     * @param ITypeRepository $typeRepository
     */
    public function __construct(
        ITaskRepository $taskRepository,
        IStatusRepository $statusRepository,
        ITypeRepository $typeRepository
    )
    {
        $this->taskRepository = $taskRepository;
        $this->statusRepository = $statusRepository;
        $this->typeRepository = $typeRepository;
    }

    /**
     * @param array $params
     * @return TaskEntity[]
     */
    public function findAll(array $params): array
    {
        return $this->taskRepository->findAll($params);
    }

    /**
     * @param int $pk
     * @return TaskEntity|null
     */
    public function findByPk(int $pk): ?TaskEntity
    {
        return $this->taskRepository->findByPk($pk);
    }

    /**
     * @param TaskDto $dto
     */
    public function save(TaskDto $dto): void
    {
        $status = $this->statusRepository->findByPk($dto->status);
        $type = $this->typeRepository->findByPk($dto->type);

        if ($dto->id) {
            $entity = $this->taskRepository->findByPk($dto->id);
            $entity->setTitle($dto->title);
            $entity->setDescription($dto->description);
            $entity->setStatus($status);
            $entity->setType($type);
            $entity->setAuthor($dto->author);
        } else {
            $entity = TaskFabric::instance(
                array_merge(
                    $dto->attributes, [
                        'status' => $status,
                        'type' => $type
                    ]
                )
            );
        }
        $this->taskRepository->save($entity);
    }

    /**
     * @param int $pk
     */
    public function delete(int $pk): void
    {
        $this->taskRepository->delete($pk);
    }

    /**
     * @return array
     */
    public function getStatusList(): array
    {
        return $this->statusRepository->findAll([]);
    }

    /**
     * @return array
     */
    public function getTypeList(): array
    {
        return $this->typeRepository->findAll([]);
    }
}
