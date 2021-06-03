<?php


namespace app\domain\service;


use app\domain\dto\CostDto;
use app\domain\fabric\CostFabric;
use app\domain\repository\ICostRepository;

class CostService
{
    private $costRepository;

    /**
     * CostService constructor.
     * @param ICostRepository $costRepository
     */
    public function __construct(
        ICostRepository $costRepository
    ) {
        $this->costRepository = $costRepository;
    }

    /**
     * @param CostDto $dto
     */
    public function save(CostDto $dto): void
    {

        $entity = CostFabric::instance($dto->toArray());
        $this->costRepository->save($entity);
    }
}