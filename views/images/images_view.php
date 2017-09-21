<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
?>


 <div class="col-md-3">
 <?= Html::a(Html::img(Yii::$app->params['siteUrl'].'public/uploads/images/'.sha1($model->id_image).'.jpg',['class'=>'thumbnail','style'=>'width:275px; height:154px;']),
 ['view','id'=>$model->id_image]) ?> </div>
 
 

    