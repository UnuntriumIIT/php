<?php
namespace app\domain\dto;

use yii\base\Model;

/**
 * DTO задачи
 */
class CommentDto extends Model
{
    /** @var int */
    public $id;
    /** @var string */
    public $text;
    /** @var int */
    public $taskId;
    /** @var string */
    public $date;
    /** @var string */
    public $author;

    /**
     * CommentDto constructor.
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        if (isset($config['text'])) {
            $this->text = $config['text'];
        }
        if (isset($config['date'])) {
            $this->date = $config['date'];
        }
        if (isset($config['task'])) {
            $this->taskId = $config['task'];
        }
        if (isset($config['id'])) {
            $this->id = $config['id'];
        }
        if (isset($config['author'])) {
            $this->author = $config['author'];
        }
    }
}