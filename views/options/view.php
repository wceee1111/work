<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Options */

$this->title = $model->OptionId;
$this->params['breadcrumbs'][] = ['label' => 'Options', 'url' => ['index' ,'id' => $model->QuestionId]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="options-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->OptionId], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->OptionId], [
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
            'OptionId',
            'QuestionId',
            'OptionNo',
            'OptionContent',
            'OptionScore',
            'IsOther',
            'Remark',
            'AddDate',
        ],
    ]) ?>

</div>
