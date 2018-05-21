<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\LinkPager;
use yii\widgets\ActiveForm;
use app\models\Useranswer;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UseranswerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '';
//$this->params['breadcrumbs'][] = $this->title;
?>


<div class="useranswer-index">
    <div class="col-lg-2">
    </div>
    <div class="col-lg-8">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>




    <?php $form = ActiveForm::begin(); ?>


        <?php


        $count = count($question);//获取题目总数
        $settings = [new Useranswer()];
        for ($i = 1; $i < $count; $i++) {
            $settings[] = new Useranswer();
        }

        foreach ($question as $index => $q) {
            $o = array();
            foreach ($q->options as $value) {
                $o[$value->OptionId] = $value->OptionContent;
            }
            if ($q->QuestionType == "0") {

                echo $form->field($settings[$index], "[$index]OptionId")
                    //->radioList($o, ['style' => 'padding-top: 5px; font-size:14px;font-weight:800;'])
                    ->radioList($o)
                    ->label(($index + 1) . '.' . $q->QuestionTopic);

            } elseif ($q->QuestionType == "1") {

                echo $form->field($settings[$index], "[$index]CheckboxId")
                    ->checkboxList($o)
                    ->label(($index + 1) . '.' . $q->QuestionTopic);


            } elseif ($q->QuestionType == "2") {

                echo $form->field($settings[$index], "[$index]OptionContent")
                    //->textarea(['style'=>'width:700px;height:100px;resize:none;'])
                    ->textarea(['ros' => 4, 'autofocus' => true])
                    ->label(($index + 1) . '.' . $q->QuestionTopic);

            } else {

            }
            echo Html::activeHiddenInput($settings[$index], "[$index]Uid", array('value' => '0'));
            echo Html::activeHiddenInput($settings[$index], "[$index]QuestionId", array('value' => $q->QuestionId));
            echo Html::activeHiddenInput($settings[$index], "[$index]AddDate", array('value' => time()));


            //echo $form->field($settings[$index], "[$index]OptionId")->textInput()->hiddenInput(['value' => 'test'])->label(false);
        }


        ?>
        </ul>

        <?= LinkPager::widget([
            'pagination' => $pagination,
            'maxButtonCount' => 1,
        ]) ?>

        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>
    </div>


    <?php ActiveForm::end(); ?>


</div>
