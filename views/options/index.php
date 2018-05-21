<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OptionsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '选项';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="options-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('新建一个选项',['create', 'id' => $QuestionId], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'OptionId',
            //'QuestionId',
            'OptionNo',
            'OptionContent',
            //'OptionScore',
            [
                'attribute'=>'IsOther',
                'format'=>'raw',
                'value'=> function($data){
                    $IS=array("否","是");
                    return $IS[$data->IsOther];
                }
            ],
            //'Remark',
            //'AddDate',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
