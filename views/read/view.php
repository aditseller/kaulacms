<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Read */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Reads', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="read-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_read], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_read], [
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
            'id_read',
            'title',
            'teaser',
            'content:ntext',
            'created_by',
            'created_at',
            'channel',
            'tag',
            'source',
        ],
    ]) ?>

</div>
