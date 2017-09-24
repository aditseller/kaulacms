<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Channel */

$this->title = 'Edit Channel: ' . $model->id_channel;
$this->params['breadcrumbs'][] = ['label' => 'Channels', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Edit';
?>
<div class="channel-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
