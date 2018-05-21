<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SurveyInfoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '问卷';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="survey-info-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('创建一个问卷', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'SurveyInfoId',
            [
                'attribute'=>'SurveyName',
                'format'=>'raw',
                'value'=> function($data){
                    //超链接
                    return Html::a($data->SurveyName, ['question/index', 'id' => $data->SurveyInfoId]);
                }
            ],
            'ColumnId',
            'SurveyDescription',
            'SurveyStarttime:datetime',
            'SurveyEndtime:datetime',
            'auther',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
