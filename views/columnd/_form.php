<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Columnd */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="columnd-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ColumnNo')->textInput() ?>

    <?= $form->field($model, 'ColumnName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Remark')->textInput(['maxlength' => true]) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
