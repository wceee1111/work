<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UseranswerSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="useranswer-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'UAid') ?>

    <?= $form->field($model, 'Uid') ?>

    <?= $form->field($model, 'QuestionId') ?>

    <?= $form->field($model, 'OptionId') ?>

    <?= $form->field($model, 'OptionContent') ?>

    <?php // echo $form->field($model, 'AddDate') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
