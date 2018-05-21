<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SurveyInfoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="survey-info-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'SurveyInfoId') ?>

    <?= $form->field($model, 'SurveyName') ?>

    <?= $form->field($model, 'SurveyDescription') ?>

    <?= $form->field($model, 'SurveyStarttime') ?>

    <?= $form->field($model, 'SurveyEndtime') ?>

    <?php // echo $form->field($model, 'auther') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
