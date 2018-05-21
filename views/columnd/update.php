<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Columnd */

$this->title = 'Update Columnd: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Columnds', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ColumnId, 'url' => ['view', 'id' => $model->ColumnId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="columnd-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
