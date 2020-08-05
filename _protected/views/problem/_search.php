<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProblemSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="problem-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'sector') ?>

    <?= $form->field($model, 'shift') ?>

    <?= $form->field($model, 'date') ?>

    <?= $form->field($model, 'model') ?>

    <?php // echo $form->field($model, 'res_person_tabel') ?>

    <?php // echo $form->field($model, 'department') ?>

    <?php // echo $form->field($model, 'PO') ?>

    <?php // echo $form->field($model, 'problem') ?>

    <?php // echo $form->field($model, 'spent_on') ?>

    <?php // echo $form->field($model, 'comment') ?>

    <?php // echo $form->field($model, 'winno') ?>

    <?php // echo $form->field($model, 'user_id') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'finished_at') ?>

    <?php // echo $form->field($model, 'repair_case') ?>

    <?php // echo $form->field($model, 'money_spent') ?>

    <?php // echo $form->field($model, 'problem_status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
