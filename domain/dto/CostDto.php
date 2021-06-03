<?php


namespace app\domain\dto;


use yii\base\Model;

class CostDto extends Model
{
    /** @var int */
    public $id;
    /** @var string */
    public $text;
    /** @var int */
    public $taskId;
    /** @var string */
    public $cost;

    /**
     * CommentDto constructor.
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        if (isset($config['text'])) {
            $this->text = $config['text'];
        }
        if (isset($config['cost'])) {
            $this->cost = $config['cost'];
        }
        if (isset($config['task'])) {
            $this->taskId = $config['task'];
        }
        if (isset($config['id'])) {
            $this->id = $config['id'];
        }
    }
}