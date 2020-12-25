<?php
/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = Yii::t('app', 'About');
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    #customers {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #customers td, #customers th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #customers tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    #customers tr:hover {
        background-color: #ddd;
    }

    #customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #4CAF50;
        color: white;
    }
</style>
<div id="sasa" class="site-about">
    <table id="customers">
        <thead>
        <tr>
            <th>Company</th>
            <th>Contact</th>
            <th>input</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>Sardor</td>
            <td>Dehqonov</td>
            <td><input value="<?= random_int(25, 256) ?>" type="text"></td>
        </tr>
        <tr>
            <td>Erkinjon</td>
            <td>Qaxxorov</td>
            <td><input value="<?= random_int(25, 256) ?>" type="text"></td>
        </tr>
        <tr>
            <td>Anvarjon</td>
            <td>Komilov</td>
            <td><input value="<?= random_int(25, 256) ?>" type="text"></td>
        </tr>
        <tr>
            <td>Shoxrux</td>
            <td>Azimjonov</td>
            <td><input value="<?= random_int(25, 256) ?>" type="text"></td>
        </tr>

        </tbody>
    </table>
</div>
<br>
<button class="ok">ok</button>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(function () {
        $('button.ok').click(function (e) {
            var data1 = [];
            var data2 = [];
            var input = [];

            $('#sasa > table > tbody > tr').each(function (index) {
                var tex1 = $(this).find('td:eq(0)').text();
                    data1.push(tex1);
            });
            $('#sasa > table > tbody > tr').each(function (index) {
                var tex2 = $(this).find('td:eq(1)').text();
                    data2.push(tex2);
            });

            $('#sasa > table > tbody > tr ').each(function () {
                var inp = $(this).find('input').val();
                input.push(inp);
            });
            $.get('/site/ajax', {data1: data1,data2: data2, input:input}, function (response) {
                if (response.result == "success") {
                    console.log(response.result);
                }
            });
            // console.log(data1);
            // console.log(data2);
            // console.log(input);
        });

    });


</script>
