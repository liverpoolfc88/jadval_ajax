<?php

namespace app\controllers;
use app\models\Tuman;

class TumanController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionCreate()
    {
        $tuman = new Tuman();
//        var_dump($_POST); die();
//        $tuman->name = $_POST['nomi'];
//        $tuman->maydoni = $_POST['maydoni'];

//        $tuman->name = $request->nomi;
//        $tuman->maydoni = $request->maydoni;


        if (isset($_POST)){

        $tuman->name = $_POST['nomi'];
        $tuman->maydoni = $_POST['maydoni'];

            $tuman->save();
        }


        return json_encode($_POST);
    }

}
