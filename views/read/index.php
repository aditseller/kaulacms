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
            //['class' => 'yii\grid\SerialColumn'],

            //'id_read',
			'created_at',
            'title',
            'channel',
            // 'tag',
             'source',
			 'created_by',

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
