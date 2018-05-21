<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Userbackend */

$this->title = 'Create Userbackend';
$this->params['breadcrumbs'][] = ['label' => 'Userbackends', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="userbackend-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
