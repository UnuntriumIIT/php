<?php
namespace app\domain\entity;

use DateTime;
use yii\base\Model;

/**
 * Сущность задачи
 */
class TaskEntity extends Model
{
    /** @var int */
    private $id;
    /** @var string */
    private $title;
    /** @var string */
    private $description;
    /** @var StatusEntity */
    private $status;
    /** @var TypeEntity */
    private $type;
    /** @var CommentEntity[] */
    private $comments;
    /** @var CostEntity[] */
    private $costs;
    /** @var string */
    private $author;

    /**
     * TaskEntity constructor.
     * @param int|null $id
     * @param string|null $title
     * @param string|null $description
     * @param StatusEntity|null $status
     * @param TypeEntity|null $type
     * @param array|null $comments
     * @param array|null $costs
     * @param string|null $author
     */
    public function __construct(
        int $id = null,
        string $title = null,
        string $description = null,
        StatusEntity $status = null,
        TypeEntity $type = null,
        array $comments = null,
        array $costs = null,
        string $author = null
    )
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->status = $status;
        $this->type = $type;
        $this->comments = $comments;
        $this->costs = $costs;
        $this->author = $author;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     *
     */
    public function setId(?int $id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getAuthor(): ?string
    {
        return $this->author;
    }

    /**
     * @param string $author
     */
    public function setAuthor(?string $author): void
    {
        $this->author = $author;
    }

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string|null $title
     */
    public function setTitle(?string $title)
    {
        $this->title = $title;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     */
    public function setDescription(?string $description)
    {
        $this->description = $description;
    }

    /**
     * @return StatusEntity|null
     */
    public function getStatus(): ?StatusEntity
    {
        return $this->status;
    }

    /**
     * @param StatusEntity|null $status
     */
    public function setStatus(?StatusEntity $status)
    {
        $this->status = $status;
    }

    /**
     * @return TypeEntity|null
     */
    public function getType(): ?TypeEntity
    {
        return $this->type;
    }

    /**
     * @param TypeEntity|null $type
     */
    public function setType(?TypeEntity $type)
    {
        $this->type = $type;
    }

    /**
     * @return CommentEntity[]
     */
    public function getComments(): array
    {
        return $this->comments;
    }

    /**
     * @param CommentEntity[] $comments
     */
    public function setComments(array $comments)
    {
        $this->comments = $comments;
    }

    /**
     * @return CostEntity[]
     */
    public function getCosts(): ?array
    {
        return $this->costs;
    }

    /**
     * @param CostEntity[] $costs
     */
    public function setCosts(?array $costs): void
    {
        $this->costs = $costs;
    }
}