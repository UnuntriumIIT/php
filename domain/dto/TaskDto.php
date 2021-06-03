<?php
namespace app\domain\dto;

use yii\base\Model;

/**
 * DTO задачи
 */
class TaskDto extends Model
{
    /** @var int */
    public $id;
    /** @var string */
    public $title;
    /** @var string */
    public $description;
    /** @var string */
    public $author;
    /** @var int */
    public $status;
    /** @var int */
    public $type;

    /**
     * TaskDto constructor.
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        if (isset($config['status']) && isset($config['status']['id'])) {
            $this->status = $config['status']['id'];
        }
        if (isset($config['type']) && isset($config['type']['id'])) {
            $this->type = $config['type']['id'];
        }
        if (isset($config['title'])) {
            $this->title = $config['title'];
        }
        if (isset($config['description'])) {
            $this->description = $config['description'];
        }
        if (isset($config['id'])) {
            $this->id = $config['id'];
        }
        if (isset($config['author'])) {
            $this->author = $config['author'];
        }
    }
}