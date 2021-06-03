<?php
namespace app\domain\service;

use app\domain\dto\CommentDto;
use app\domain\fabric\CommentFabric;
use app\domain\repository\ICommentRepository;

/**
 * Сервис задач
 */
class CommentService
{
    private $commentRepository;

    /**
     * CommentService constructor.
     * @param ICommentRepository $commentRepository
     */
    public function __construct(
        ICommentRepository $commentRepository
    ) {
        $this->commentRepository = $commentRepository;
    }

    /**
     * @param CommentDto $dto
     */
    public function save(CommentDto $dto): void
    {

        $entity = CommentFabric::instance($dto->toArray());
        $this->commentRepository->save($entity);
    }
}
