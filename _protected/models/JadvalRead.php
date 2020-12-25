<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jadval_read".
 *
 * @property int $id
 * @property string $name1
 * @property string $name2
 * @property string $input
 */
class JadvalRead extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jadval_read';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
//            [['name1', 'name2', 'input'], 'required'],
            [['name1', 'name2', 'input'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name1' => 'Name1',
            'name2' => 'Name2',
            'input' => 'Input',
        ];
    }
}
