<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\SurveyInfo */

$this->title = $model->SurveyInfoId;
$this->params['breadcrumbs'][] = ['label' => 'Survey Infos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="survey-info-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->SurveyInfoId], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->SurveyInfoId], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'SurveyInfoId',
            'SurveyName',
            'SurveyDescription',
            'SurveyStarttime:datetime',
            'SurveyEndtime:datetime',
            'auther',
        ],
    ]) ?>

</div>
