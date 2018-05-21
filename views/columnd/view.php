<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Columnd */

$this->title = $model->ColumnId;
$this->params['breadcrumbs'][] = ['label' => 'Columnds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="columnd-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ColumnId], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ColumnId], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ColumnId',
            'ColumnNo',
            'ColumnName',
            'Remark',
            'AddDate',
        ],
    ]) ?>

</div>
