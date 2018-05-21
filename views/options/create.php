<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Options */

$this->title = 'Create Options';
$this->params['breadcrumbs'][] = ['label' => 'Options', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="options-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'QuestionId'=>$QuestionId,
    ]) ?>

</div>
