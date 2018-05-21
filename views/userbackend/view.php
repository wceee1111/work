<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Userbackend */

$this->title = $model->Uid;
$this->params['breadcrumbs'][] = ['label' => 'Userbackends', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="userbackend-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->Uid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->Uid], [
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
            'Uid',
            'username',
            'password_hash',
            'auth_key',
            'email:email',
            'Authority',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
