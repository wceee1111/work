<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Question */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="question-form">
    <?php $form = ActiveForm::begin(); ?>


    <?=  $form->field($model, 'QuestionType')->radioList(['0' => '单选', '1' => '多选','2' => '问答'], ['style' => 'padding-top: 5px;'])?>

    <?= $form->field($model, 'QuestionTopic')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'QuestionNo')->textInput() ?>

    <?= $form->field($model, 'isRequired')->textInput() ?>

    <?= $form->field($model, 'Direction')->textInput(['maxlength' => true]) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
