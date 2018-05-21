<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\SurveyInfo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="survey-info-form">
    <div class="row">
        <div class="col-lg-6">
            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'SurveyName')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'SurveyDescription')->textInput(['maxlength' => true]) ?>

            <?=  $form->field($model, 'ColumnId')->dropDownList($lm, ['prompt'=>'请选择一个栏目']);; ?>

            <?= $form->field($model, 'SurveyStarttime')->
            widget(DatePicker::className(), ['dateFormat' => 'yyyy-MM-dd']) ?>


            <?= $form->field($model, 'SurveyEndtime')->
            widget(DatePicker::className(), ['dateFormat' => 'yyyy-MM-dd']) ?>



            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
