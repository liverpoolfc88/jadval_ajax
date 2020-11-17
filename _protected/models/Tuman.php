<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tuman".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $maydoni
 *
 * @property Viloyat $id0
 */
class Tuman extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tuman';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'maydoni'], 'string', 'max' => 255],
            [['id'], 'exist', 'skipOnError' => true,  'targetAttribute' => ['id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'maydoni' => 'Maydoni',
        ];
    }

    /**
     * Gets query for [[Id0]].
     *
     * @return \yii\db\ActiveQuery
     */
//    public function getId0()
//    {
//        return $this->hasOne(Viloyat::className(), ['id' => 'id']);
//    }
}
