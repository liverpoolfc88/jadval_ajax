<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\DetailView;
use app\models\Problem;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProblemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Problems';
$this->params['breadcrumbs'][] = $this->title;
?>


<div style="padding-bottom: 50px" class="col-md-12">
    <h3 style="text-align:center">  Vaqt oralig'ida ma'lumotlarni excelga export qilish!</h3>
    <?php $form = ActiveForm::begin([
//                        'method' => 'post',
//            'action' => ['exell'],
    ]); ?>
    <div class="col-md-3">
        <?= DatePicker::widget([
            'options' => ['placeholder' => 'Dan ',
                // 'value' => date('Y-m-d')
                'class'=> 'inputform',
            ],
            'name'=> 'startDT',
            'pluginOptions' => [
                'autoclose' => true,
                'format' =>'yyyy-mm-dd'
            ]
        ]); ?>
    </div>
    <div class="col-md-3">
        <?= DatePicker::widget([
            'options' => ['placeholder' => 'Gacha',
                // 'value' => date('Y-m-d')
                'class'=> 'inputform',
            ],
            'name'=> 'endDT',
            'pluginOptions' => [
                'autoclose' => true,
                'format' =>'yyyy-mm-dd'
            ]
        ]); ?>
    </div>
    <div class="col-md-3">
        <?= Html::submitButton('Qidirish', ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>

    <div class="col-md-3">
        <a  class="btn btn-primary" onclick="exportTableToExcel('tblData')" href="">EXELGA KO'CHIRISH</a>
    </div>
</div>

<script>
    function exportTableToExcel(tableID, filename = ''){
        var downloadLink;
        var dataType = 'application/vnd.ms-excel';
        var tableSelect = document.getElementById(tableID);
        var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');

        // Specify file name
        filename = filename?filename+'.xls':'excel_data.xls';

        // Create download link element
        downloadLink = document.createElement("a");

        document.body.appendChild(downloadLink);

        if(navigator.msSaveOrOpenBlob){
            var blob = new Blob(['\ufeff', tableHTML], {
                type: dataType
            });
            navigator.msSaveOrOpenBlob( blob, filename);
        }else{
            // Create a link to the file
            downloadLink.href = 'data:' + dataType + ', ' + tableHTML;

            // Setting the file name
            downloadLink.download = filename;

            //triggering the function
            downloadLink.click();
        }
    }

</script>




<section>
    <div class="container-fluid">
        <div style="overflow-x:auto;" id="stil" class="row">
            <table border="1" id="tblData"  class=" table table-striped">
                <thead style="text-align: center; width: 100%" class="thead">
                    <tr>
                        <th>T/R</th>
                        <th>Sana</th>
                        <th>Uchastka</th>
                        <th>Smena</th>
                        <th>Model</th>
                        <th>Tabel raqam</th>
                        <th>Bo'lim nomi</th>
                        <th>P/O</th>
                        <th>Win kod</th>
                        <th>Defect cod</th>
                        <th>Sarflangan vaqt</th>
                        <th>Ism Sharifi</th>
                        <th>Muommo</th>
                        <th>Izox</th>
                        <th>Ochilgan vaqti</th>
                        <th>Yopilgan vaqti</th>
                        <th>Xarajat qiymati</th>
                        <th>Nuqson xajmi</th>

                    </tr>
                </thead>
                <tbody style="text-align: center;">
                <? if ($jadval){ ?>
                <? foreach ($jadval as $key => $value){ ?>
                <tr>
                    <td><?=$key+1?></td>
                    <td><?=$value->date?></td>
                    <td><?=$value->uchastka->name?></td>
                    <td><?=$value->shift?></td>
                    <td><?=$value->model?></td>
                    <td><?=$value->res_person_tabel?></td>
                    <td><?=$value->bolim->name?></td>
                    <td><?=$value->PO?></td>
                    <td><?=$value->winno?></td>
                    <td><?=$value->defectName->tag_id?></td>
                    <td><?=$value->spent_on?></td>
                    <td>Dehqonov Sadorbek</td>
                    <td><?=$value->problem?></td>
                    <td><?=$value->comment?></td>
                    <td><?=$value->created_at?></td>
                    <td><?=$value->finished_at?></td>
                    <td><?=$value->money_spent?></td>
                    <td><?=$value->repair_case?></td>
                </tr>
                <?}}?>
                </tbody>
            </table>

        </div>
    </div>
</section>


<style type="text/css">
    .thead{
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #4CAF50;
        color: white;
        padding: 8px;
        border-spacing: 2px;
    }
    thead tr th {
        border: 1px solid #ddd !important;
        text-align: center;
    }
    tbody tr th {
        border: 1px solid #ddd !important;
        text-align: center;
    }
    tbody tr td {
        border: 1px solid #ddd !important;
        text-align: center;
    }

</style>


<meta name="viewport" content="width=device-width, initial-scale=1">
<script>
    var w = window.innerWidth;
    // var h = window.innerHeight-190;
    var h = window.innerHeight-280;
    document.getElementById("stil").style.height = h+"px";
</script>