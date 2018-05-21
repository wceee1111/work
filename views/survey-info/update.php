<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SurveyInfo */

$this->title = 'Update Survey Info: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Survey Infos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->SurveyInfoId, 'url' => ['view', 'id' => $model->SurveyInfoId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="survey-info-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
