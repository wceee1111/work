<?php

namespace app\controllers;

use Yii;
use app\models\SurveyInfo;
use app\models\SurveyInfoSearch;
use app\models\Columnd;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Html;

/**
 * SurveyInfoController implements the CRUD actions for SurveyInfo model.
 */
class SurveyInfoController extends Controller
{
    /**
     * @inheritdoc
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
     * Lists all SurveyInfo models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SurveyInfoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionIndexs($id)
    {

        $searchModel = new SurveyInfoSearch();
        $dataProvider = $searchModel->Csearch(Yii::$app->request->queryParams,$id);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Displays a single SurveyInfo model.
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
     * Creates a new SurveyInfo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SurveyInfo();
        $lm=\yii\helpers\Html::Getlm();//获取栏目arr缓存

        if ($model->load(Yii::$app->request->post())) {
            if(!empty($model->SurveyStarttime)){
                $model->SurveyStarttime=strtotime($model->SurveyStarttime);
            }
            if(!empty($model->SurveyEndtime)){
                $model->SurveyEndtime=strtotime($model->SurveyEndtime);
            }
            $model->auther= Yii::$app->user->identity->Uid;
            if ($model->save()) {
                if ($model->ColumnId !== null) {
                    \yii\helpers\Html::updatehomepagelmcache($model->ColumnId);
                }
                return $this->redirect(['view', 'id' => $model->SurveyInfoId]);
            }
        }

        return $this->render('create', [
            'model' => $model,
            'lm'=>$lm,
        ]);
    }

    /**
     * Updates an existing SurveyInfo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $lm=\yii\helpers\Html::Getlm();//获取栏目arr缓存

        if(!empty($model->SurveyStarttime)){
            $model->SurveyStarttime=date('Y-m-d',$model->SurveyStarttime);
        }
        if(!empty($model->SurveyEndtime)){
            $model->SurveyEndtime=date('Y-m-d',$model->SurveyEndtime);
        }

        if ($model->load(Yii::$app->request->post())) {
            if(!empty($model->SurveyStarttime)){
                $model->SurveyStarttime=strtotime($model->SurveyStarttime);
            }
            if(!empty($model->SurveyEndtime)){
                $model->SurveyEndtime=strtotime($model->SurveyEndtime);
            }
            $model->auther= Yii::$app->user->identity->Uid;
            if ($model->save()) {
                if ($model->ColumnId !== null) {
                    \yii\helpers\Html::updatehomepagelmcache($model->ColumnId);
                }
                return $this->redirect(['view', 'id' => $model->SurveyInfoId]);
            }
        }

        return $this->render('create', [
            'model' => $model,
            'lm'=>$lm,
        ]);
    }

    /**
     * Deletes an existing SurveyInfo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model=$this->findModel($id);
        $ColumnId=$model->ColumnId;
        $model->delete();
        if ($ColumnId !== null) {
            \yii\helpers\Html::updatehomepagelmcache($ColumnId);
        }
        return $this->redirect(['index']);
    }

    /**
     * Finds the SurveyInfo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SurveyInfo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SurveyInfo::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
