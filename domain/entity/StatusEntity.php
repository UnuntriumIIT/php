<?php
namespace app\domain\entity;

use yii\base\Model;

/**
 * Сущность статуса
 */
class StatusEntity extends Model
{
    /** @var int|int */
    private $id;
    /** @var string */
    private $name;

    /**
     * StatusEntity constructor.
     * @param int $id
     * @param string $name
     */
    public function __construct(
        ?int $id,
        string $name
    )
    {
        $this->id = $id;
        $this->name = $name;
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
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name)
    {
        $this->name = $name;
    }
}