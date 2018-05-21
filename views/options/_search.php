<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\OptionsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="options-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'OptionId') ?>

    <?= $form->field($model, 'QuestionId') ?>

    <?= $form->field($model, 'OptionNo') ?>

    <?= $form->field($model, 'OptionContent') ?>

    <?= $form->field($model, 'OptionScore') ?>

    <?php // echo $form->field($model, 'IsOther') ?>

    <?php // echo $form->field($model, 'Remark') ?>

    <?php // echo $form->field($model, 'AddDate') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
