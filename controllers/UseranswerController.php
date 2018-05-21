<?php

namespace app\controllers;

use app\models\Question;
use app\models\Surveyinfo;
use Yii;
use app\models\Useranswer;
use app\models\UseranswerSearch;
use yii\base\Model;
use yii\data\Pagination;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;

/**
 * UseranswerController implements the CRUD actions for Useranswer model.
 */
class UseranswerController extends Controller
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
     * Lists all Useranswer models.
     * @return mixed
     */
    public function actionIndex($id)
    {
        /*searchModel = new UseranswerSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);*/
        $model = new Useranswer();
        $query = Question::find();
        $query->joinWith('options')
            ->where(['SurveyInfoId' => $id]);


        $count = count(Yii::$app->request->post('Useranswer', []));
        $settings = [new Useranswer()];
        for($i = 1; $i < $count; $i++) {
            $settings[] = new Useranswer();
        }


        if (Model::loadMultiple($settings, Yii::$app->request->post()) && Model::validateMultiple($settings)) {

            foreach ($settings as $setting) {

                if(!empty($setting->CheckboxId)){
                $setting->CheckboxId=implode(',',$setting->CheckboxId);
                }
                $setting->save(false);
            }
            return $this->redirect('index');
        }
        $pagination = new Pagination([
            'defaultPageSize' => 30,
            'totalCount' => $query->count(),
        ]);
        $question = $query->orderBy('QuestionNo')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();


        return $this->render('index', [
            //'dataProvider' => $dataProvider,
            'pagination' => $pagination,
            'question'=>$question,

            'model'=>$model,
            'settings'=>$settings,
        ]);
    }

    /**
     * Displays a single Useranswer model.
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
     * Creates a new Useranswer model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Useranswer();

        $count = count(Yii::$app->request->post('Useranswer', []));
        $settings = [new Useranswer()];
        for($i = 1; $i < $count; $i++) {
            $settings[] = new Useranswer();
        }



        if (Model::loadMultiple($settings, Yii::$app->request->post()) && Model::validateMultiple($settings)) {
            var_dump($settings);
            exit();
            foreach ($settings as $setting) {
                $setting->save(false);
            }
            return $this->redirect('index');
        }

        /*if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->UAid]);
        }*/

        return $this->render('create', [
            'settings' => $settings
        ]);
    }

    /**
     * Updates an existing Useranswer model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->UAid]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Useranswer model.
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
     * Finds the Useranswer model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Useranswer the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Useranswer::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
