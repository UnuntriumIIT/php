<?php
namespace app\domain\entity;

use yii\base\Model;

/**
 * Сущность статуса
 */
class TypeEntity extends Model
{
    /** @var int|null */
    private $id;
    /** @var string */
    private $name;

    /**
     * StatusEntity constructor.
     * @param int|null $id
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
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }
}