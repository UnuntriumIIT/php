<?php
namespace app\domain\entity;

use yii\base\Model;

/**
 * Сущность статуса
 */
class CommentEntity extends Model
{
    /** @var int */
    private $id;
    /** @var string */
    private $text;
    /** @var int */
    private $task;
    /** @var string */
    private $date;
    /** @var string */
    private $author;

    /**
     * StatusEntity constructor.
     * @param int|null $id
     * @param string|null $text
     * @param int|null $taskId
     * @param string|null $date
     * @param string|null $author
     */
    public function __construct(
        int $id = null,
        string $text = null,
        int $taskId = null,
        string $date = null,
        string $author = null
    )
    {
        $this->id = $id;
        $this->text = $text;
        $this->task = $taskId;
        $this->date = $date;
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
     * @param int|null $id
     */
    public function setId(?int $id)
    {
        $this->id = $id;
    }

    /**
     * @return string|null
     */
    public function getText(): ?string
    {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText(string $text)
    {
        $this->text = $text;
    }

    /**
     * @return int|null
     */
    public function getTask(): ?int
    {
        return $this->task;
    }

    /**
     * @param int $task
     */
    public function setTask(int $task)
    {
        $this->task = $task;
    }

    /**
     * @return string|null
     */
    public function getDate(): ?string
    {
        return $this->date;
    }

    /**
     * @param string $date
     */
    public function setDate(string $date)
    {
        $this->date = $date;
    }

    /**
     * @return string
     */
    public function getAuthor(): ?string
    {
        return $this->author;
    }

    /**
     * @param string|null $author
     */
    public function setAuthor(?string $author): void
    {
        $this->author = $author;
    }
}