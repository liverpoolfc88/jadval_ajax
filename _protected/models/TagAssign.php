<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tag_assign".
 *
 * @property int $id
 * @property string|null $tag_id
 * @property int|null $post_id
 * @property string|null $model
 * @property int|null $sector
 * @property string|null $shift
 * @property string|null $date
 * @property int|null $department
 * @property int|null $money_spent
 */
class TagAssign extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tag_assign';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['post_id', 'sector', 'department', 'money_spent'], 'integer'],
            [['date'], 'safe'],
            [['tag_id'], 'string', 'max' => 3],
            [['model'], 'string', 'max' => 50],
            [['shift'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tag_id' => 'Tag ID',
            'post_id' => 'Post ID',
            'model' => 'Model',
            'sector' => 'Sector',
            'shift' => 'Shift',
            'date' => 'Date',
            'department' => 'Department',
            'money_spent' => 'Money Spent',
        ];
    }
}
