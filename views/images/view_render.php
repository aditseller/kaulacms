<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Images */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Images', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="images-view">

     

    <div class="col-md-12">
	<div class="col-md-12"><h2><?= Html::encode($this->title) ?></h2></div>
	</br>
	
        <div class="col-md-1">
        <?= Html::a('Delete', ['deleterender', 'id' => $model->id_image], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
		
		<?= Html::a('Open Gallery',['index'],['class'=>'btn btn-info','target'=>'_blank']) ?>
		</div>
		</br>
		
		<div class="col-md-3">
		<div class="input-group" style="width:700px;">
      <input  id="foo" type="text"  value="<?= Yii::$app->params['siteUrl'] ?>public/uploads/images/<?= sha1($model->id_image) ?>.jpg" class="form-control">
      <span class="input-group-btn">
        <button class="btn btn-primary" type="button" data-clipboard-action="copy" data-clipboard-target="#foo">Copy URL</button>
      </span>
    </div><!-- /input-group -->
    </div>
	</br>
	
	
	
	<div class="col-md-11">
   <img style="width:700px;" src="<?= Yii::$app->params['siteUrl'] ?>public/uploads/images/<?= sha1($model->id_image) ?>.jpg">
	</div>
	
    </div>

	 <!-- 1. Define some markup -->

		

	
	

	
</div>




    <!-- 2. Include library -->
    <script src="<?= Yii::$app->params['siteUrl'] ?>public/js/clipboard.min.js"></script>

    <!-- 3. Instantiate clipboard -->
    <script>
    var clipboard = new Clipboard('.btn');

    clipboard.on('success', function(e) {
        console.log(e);
    });

    clipboard.on('error', function(e) {
        console.log(e);
    });
    </script>
