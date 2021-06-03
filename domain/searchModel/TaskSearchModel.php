<?php
namespace app\domain\searchModel;

use DateTime;
use yii\base\Model;

/**
 * Атрибутная модель поиска
 */
class TaskSearchModel extends Model
{
    /** @var int */
    public $id;
    /** @var string */
    public $title;
    /** @var string */
    public $description;
    /** @var int */
    public $status;
    /** @var int */
    public $type;
    /** @var string */
    public $author;

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            [['id', 'status', 'type'], 'integer'],
            [['title', 'description', 'author'], 'string']
        ];
    }
}