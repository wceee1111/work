<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Useranswer */

$this->title = 'Update Useranswer: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Useranswers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->UAid, 'url' => ['view', 'id' => $model->UAid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="useranswer-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
