<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Userbackend */

$this->title = 'Update Userbackend: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Userbackends', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Uid, 'url' => ['view', 'id' => $model->Uid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="userbackend-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
