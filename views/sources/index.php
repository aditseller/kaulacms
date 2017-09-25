<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SourcesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sources';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sources-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('<span class="glyphicon glyphicon-plus"></span> Add Sources', ['add'], ['class' => 'btn btn-warning']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            [
				'attribute'=>'id_source',
				'label'=>'Id',
				'format'=>'raw',
				'headerOptions' => ['width' => '8%'],
			],
            'source',

            ['class' => 'yii\grid\ActionColumn',
        'header' => '',
        'headerOptions' => ['style'=>'width:8%'],
        'template'=>'{edit} {delete}',
          'buttons' => [
		   'edit' => function($url, $model) {
                return Html::a('<span class="glyphicon glyphicon-pencil"></span>',$url, [
                    'title' => Yii::t('yii','edit'),'class'=>'btn btn-info btn-sm',
                    
                ]);
              },
              'delete' => function($url, $model) {
                return Html::a('<span class="glyphicon glyphicon-trash"></span>',$url, [
                    'title' => Yii::t('yii','delete'),'class'=>'btn btn-danger btn-sm',
                    'data-confirm' => Yii::t('yii','Are You Sure Delete this Data ?'),
                    'data-method' => 'post',
                ]);
              }  
          ],
          ],
        ],
    ]); ?>
</div>
