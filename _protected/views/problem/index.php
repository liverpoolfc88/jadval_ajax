<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProblemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Problems';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="problem-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Problem', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'sector',
            'shift',
            'date',
            'model',
            //'res_person_tabel',
            //'department',
            //'PO',
            //'problem:ntext',
            //'spent_on',
            //'comment:ntext',
            //'winno',
            //'user_id',
            //'created_at',
            //'finished_at',
            //'repair_case',
            //'money_spent',
            //'problem_status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
