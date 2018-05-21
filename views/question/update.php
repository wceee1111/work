<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Question */

$this->title = 'Update Question: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => '问题', 'url' => ['index', 'id' => $model->QuestionId]];
$this->params['breadcrumbs'][] = ['label' => $model->QuestionId, 'url' => ['view', 'id' => $model->QuestionId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="question-update">

    <h1><?= Html::encode($this->title) ?></h1>


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
