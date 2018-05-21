<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\Useranswer */

$this->title = 'Create Useranswer';
$this->params['breadcrumbs'][] = ['label' => 'Useranswers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="useranswer-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="useranswer-form">

        <?php $form = ActiveForm::begin(); ?>


        <?php
        foreach ($settings as $index => $setting) {
            echo $form->field($setting, "[$index]OptionId");
            echo Html::activeHiddenInput($setting, "[$index]QuestionId",array('value'=>1));
        }

        ?>

        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>


</div>
