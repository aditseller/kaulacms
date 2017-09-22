<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use yii\widgets\ListView;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ImagesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Images';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="images-index col-md-12">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('<span class="glyphicon glyphicon-plus"></span> Add Images', ['addrender'], ['class' => 'btn btn-warning']) ?>
    </p>
	
    
	
	
	
			<?php 

$dataProvider = new ActiveDataProvider([
    'query' => app\models\Images::find(),
	'sort'=> ['defaultOrder' => ['id_image'=>SORT_DESC]],
    'pagination' => [
        'pageSize' => 8,
    ],
]);

			echo ListView::widget([
     'dataProvider' => $dataProvider,
	 //'filterModel' => $searchModel,
     'itemOptions' => ['class' => 'item'],
     'itemView' => 'images_view_render',
	   'pager' => [
        'firstPageLabel' => 'first',
        'lastPageLabel' => 'last',
        'prevPageLabel' => 'previous',
        'nextPageLabel' => 'next',
        'maxButtonCount' => 5,
    ],
	 
	]);
			
			
			?>
	

	
	
</div>
