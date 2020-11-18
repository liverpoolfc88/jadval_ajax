<?php

namespace app\controllers;

use Yii;
use app\models\Problem;
use app\models\ProblemSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;

/**
 * ProblemController implements the CRUD actions for Problem model.
 */
class ProblemController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Problem models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProblemSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

//     public function actionTable()
//    {
//        if(isset($_POST)){
//            $startDT = $_POST['startDT'];
//            $endDT = $_POST['endDT'];
//
//            // $jadval = ProblemMonitorings::find()->andFilterWhere(['between', 'date', $startDT,$endDT])->all();
//            $jadval = Problem::find()->andFilterWhere(['between', 'date', $startDT,$endDT])->all();
////            var_dump($jadval); die();
//            return $this->render('table',[
//                'jadvall'=>json_encode($jadval),
//                'jadval'=>$jadval
//
//            ]);
//        }
//        $jadval = Problem::find()->all();
//
//        return $this->render('table',[
////            'jadval'=>$jadval
//        ]);
//    }


    public function actionTable()
    {
        $request = Yii::$app->request;

        if($request->post()){
            $startDT = $request->post('startDT');
            $endDT = $request->post('endDT');

            $jadval = Problem::find()->andFilterWhere(['between', 'date', $startDT,$endDT])->all();
//            $jadval = Problem::find()->where(['user_id'=>8])
//                ->select(['sectors.name'])
//                ->leftJoin('sectors', 'problem.sector = sectors.id')
//                ->all();


//            $jadval = Problem::find()
//                ->where(['user_id'=>8])
//                ->joinWith('uchastka')
//                ->all();


            \Yii::$app->response->format = Response::FORMAT_JSON;

//            return $this->render('table',[
//                'jadval'=>$jadval
//            ]);

            return [
                'jadval'=>$jadval
            ];
        }
        $jadval = Problem::find()->where(['user_id'=>8])->all();
//        \Yii::$app->response->format = Response::FORMAT_JSON;

        return $this->render('table');
    }

    /**
     * Displays a single Problem model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Problem model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Problem();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Problem model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Problem model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Problem model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Problem the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Problem::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
