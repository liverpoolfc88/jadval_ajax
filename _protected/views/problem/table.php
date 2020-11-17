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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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
                'id'=>'startDT'
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
                'id'=>'endDT'
            ],
            'name'=> 'endDT',
            'pluginOptions' => [
                'autoclose' => true,
                'format' =>'yyyy-mm-dd'
            ]
        ]); ?>
    </div>
    <div class="col-md-3">
<!--        --><?//= Html::submitButton('Qidirish', ['class' => ' btn btn-primary']) ?>
        <input class="jadval btn btn-primary" type="button" value="bossss">
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

<!--<input class="jadval" type="button" value="button">-->
<!---->
<!--<section style="padding: 50px 0">-->
<!--    <form action="/action_page.php">-->
<!--    <form>-->
<!--        <input type="date" id="startDT" name="startDT">-->
<!--        <input type="date" id="endDT" name="endDT">-->
<!--        <input class="jadval" type="button" value="bossss">-->
<!--    </form>-->
<!--</section>-->
<section style="padding-bottom: 50px" >
    <div >
        <p class="salom">LiverpoolFC </p>
    </div>
    <div >
        <input type="text" name="nomi" class="name">
        <input type="text" name="maydoni" class="maydon">
        <input type="button" class="ok" value="ok">
    </div>

</section>

<script>
    $(function(){
        $(".jadval").click(function (event) {
            event.preventDefault();
            $("#loading").show();
            $("#section").show();

            $.ajax({
                method: "POST",
                data: {
                    'startDT':$('#startDT').val(),
                    'endDT':$('#endDT').val()
                },
                dataType: 'json',
                url: '/problem/table',
                succes: function (data) {
                    console.log(data);
                },
                error:function(e){
                    console.log(e);
                }.bind(this),
            });
        });
    });


    $(function () {
        // $(".name").bind('blur', xodisa)
        $(".ok").bind('click', xodisa)
    });
    function xodisa() {
        $(".salom").html('Liverpoolfc CHEMPION')
        $.ajax({
            method: "POST",

            data: {
                'nomi':$('.name').val(),
                'maydoni':$('.maydon').val()
            },
            dataType: 'json',
            url: '/tuman/create',
            succes: function (data) {
                console.log(data);
            },
            error:function(e){
                console.log(e);
            }.bind(this),
        });
    }
</script>


<section >
    <div id="loading" style="display: none">Kuting....</div>
</section>

<section  style="display: none" id="section">
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

<!---->
<!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>-->
<script>
    var w = window.innerWidth;
    // var h = window.innerHeight-190;
    var h = window.innerHeight-280;
    document.getElementById("stil").style.height = h+"px";
</script>
