<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Columnd */

$this->title = 'Create Columnd';
$this->params['breadcrumbs'][] = ['label' => 'Columnds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="columnd-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
