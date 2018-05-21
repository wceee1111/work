<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\QuestionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="question-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'QuestionId') ?>

    <?= $form->field($model, 'SurveyInfoId') ?>

    <?= $form->field($model, 'QuestionType') ?>

    <?= $form->field($model, 'QuestionTopic') ?>

    <?= $form->field($model, 'QuestionNo') ?>

    <?php // echo $form->field($model, 'isRequired') ?>

    <?php // echo $form->field($model, 'Direction') ?>

    <?php // echo $form->field($model, 'AddDate') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
