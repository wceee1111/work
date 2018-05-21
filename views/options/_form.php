<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Options */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="options-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'OptionNo')->textInput() ?>

    <?= $form->field($model, 'OptionContent')->textInput(['maxlength' => true]) ?>

    <?php if($model->isNewRecord){$model->IsOther = 0;}?>

    <?=  $form->field($model, 'IsOther')->radioList(['1' => '是', '0' => '否'], ['style' => 'padding-top: 5px;'])?>

    <?= $form->field($model, 'Remark')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
