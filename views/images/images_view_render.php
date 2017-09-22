<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
?>


 <div class="col-md-1">
 <?= Html::a(Html::img(Yii::$app->params['siteUrl'].'public/uploads/images/'.sha1($model->id_image).'.jpg',['class'=>'thumbnail','style'=>'width:120px; height:84px;']),
 ['viewrender','id'=>$model->id_image]) ?> </div>
 
 

    