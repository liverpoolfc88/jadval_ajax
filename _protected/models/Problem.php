<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "problem".
 *
 * @property int $id
 * @property int|null $sector
 * @property string $shift
 * @property string|null $date
 * @property string|null $model
 * @property string|null $res_person_tabel
 * @property int $department
 * @property string|null $PO
 * @property string|null $problem
 * @property int|null $spent_on
 * @property string|null $comment
 * @property string|null $winno
 * @property int|null $user_id
 * @property string|null $created_at
 * @property string|null $finished_at
 * @property int|null $repair_case
 * @property int|null $money_spent
 * @property int|null $problem_status
 */
class Problem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'problem';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sector', 'department', 'spent_on', 'user_id', 'repair_case', 'money_spent', 'problem_status'], 'integer'],
            [['shift', 'department'], 'required'],
            [['date', 'created_at', 'finished_at'], 'safe'],
            [['problem', 'comment'], 'string'],
            [['shift'], 'string', 'max' => 10],
            [['model'], 'string', 'max' => 150],
            [['res_person_tabel'], 'string', 'max' => 25],
            [['PO', 'winno'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sector' => 'Sector',
            'shift' => 'Shift',
            'date' => 'Date',
            'model' => 'Model',
            'res_person_tabel' => 'Res Person Tabel',
            'department' => 'Department',
            'PO' => 'Po',
            'problem' => 'Problem',
            'spent_on' => 'Spent On',
            'comment' => 'Comment',
            'winno' => 'Winno',
            'user_id' => 'User ID',
            'created_at' => 'Created At',
            'finished_at' => 'Finished At',
            'repair_case' => 'Repair Case',
            'money_spent' => 'Money Spent',
            'problem_status' => 'Problem Status',
        ];
    }
}
