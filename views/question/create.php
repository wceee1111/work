<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Question */

$this->title = 'Create Question';
$this->params['breadcrumbs'][] = ['label' => '问题', 'url' => ['index', 'id' => $SurveyInfoId]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="question-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'SurveyInfoId'=>$SurveyInfoId,
    ]) ?>

</div>
