<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ReadSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Reads';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="read-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('<span class="glyphicon glyphicon-plus"></span> Add Article', ['add'], ['class' => 'btn btn-warning']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_read',
            'title',
            'teaser',
            'content:ntext',
            'created_by',
            // 'created_at',
            // 'channel',
            // 'tag',
            // 'source',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
