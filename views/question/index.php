<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $searchModel app\models\QuestionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Questions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="question-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('创建一个新问题', ['create', 'id' => $SurveyInfoId], ['class' => 'btn btn-success']) ?>
    </p>
    <?=

    GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'QuestionId',
            //'SurveyInfoId',
            [
                'attribute' => 'QuestionType',
                'headerOptions' => ['width' => '100'],
                'format' => 'raw',
                'value' => function ($data) {
                    $QT = array("单选", "多选", "问答");
                    return $QT[$data->QuestionType];
                }
            ],
            [
                'attribute' => 'QuestionTopic',
                'headerOptions' => ['width' => '300'],
                'format' => 'raw',
                'value' => function ($data) {

                    if ($data->QuestionType === 2) {
                        return $data->QuestionTopic;
                    } else {
                        //超链接
                        $str = Html::GetPartStr($data->QuestionTopic, 10);//截取长度
                        return Html::a($str, ['options/index', 'id' => $data->QuestionId]);
                    }
                }
            ],
            'QuestionNo',
            //'isRequired',
            //'Direction',
            //'AddDate',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>
</div>
