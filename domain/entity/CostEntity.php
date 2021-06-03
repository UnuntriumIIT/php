<?php


namespace app\domain\entity;

use yii\base\Model;

class CostEntity extends Model
{
    /** @var int|int */
    private $id;
    /** @var int */
    private $taskId;
    /** @var string */
    private $text;
    /** @var int */
    private $cost;

    /**
     * StatusEntity constructor.
     * @param int|null $id
     * @param string|null $text
     * @param int|null $taskId
     * @param int|null $cost
     */
    public function __construct(
        int $id = null,
        int $taskId = null,
        string $text = null,
        int $cost = null
    )
    {
        $this->id = $id;
        $this->taskId = $taskId;
        $this->text = $text;
        $this->cost = $cost;
    }

    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getTaskId(): ?int
    {
        return $this->taskId;
    }

    /**
     * @param int $taskId
     */
    public function setTaskId(int $taskId): void
    {
        $this->taskId = $taskId;
    }

    /**
     * @return string
     */
    public function getText(): ?string
    {
        return $this->text;
    }

    /**
     * @param string|null $text
     */
    public function setText(?string $text): void
    {
        $this->text = $text;
    }

    /**
     * @return int
     */
    public function getCost(): ?int
    {
        return $this->cost;
    }

    /**
     * @param int|null $cost
     */
    public function setCost(?int $cost): void
    {
        $this->cost = $cost;
    }
}