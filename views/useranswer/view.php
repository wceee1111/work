<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Useranswer */

$this->title = $model->UAid;
$this->params['breadcrumbs'][] = ['label' => 'Useranswers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="useranswer-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->UAid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->UAid], [
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
            'UAid',
            'Uid',
            'QuestionId',
            'OptionId',
            'OptionContent',
            'AddDate',
        ],
    ]) ?>

</div>
