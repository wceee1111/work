<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SurveyInfo */

$this->title = '创建一个问卷';
$this->params['breadcrumbs'][] = ['label' => '问卷', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="survey-info-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'lm'=>$lm,
    ]) ?>

</div>
