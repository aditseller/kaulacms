<script src="http://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Images */

$this->title = 'Upload Images';
$this->params['breadcrumbs'][] = ['label' => 'Images', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="images-create">

    <h1><?= Html::encode($this->title) ?></h1>

   <?php $form = ActiveForm::begin(); ?>
	
	
	<div class="col-md-12">
   <div class="col-md-6">
   <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
	<?= $form->field($model, 'image')->fileInput(['id'=> 'file']) ?>
	<?= Html::submitButton('<span class="glyphicon glyphicon-upload"></span> Upload', ['class' =>'btn btn-lg btn-primary']) ?>
	</div>
	<div class="col-md-6">
	<div id="image_preview"><img id="previewing" src="" /></div>
	</div>
	</div>
    
    

 

    <?php ActiveForm::end(); ?>

</div>


<style type="text/css" rel="stylesheet"> /* Style untuk tampilan Form upload gambar */
  
    #image_preview {
      
   height: 393px;
   

      
      text-align: center;
      color: #C0C0C0;
      background-color: #FFFFFF;
      overflow: hidden;
    }
	
   
  </style>

  <script> /* script JQuery untuk load gambar pada bagian preview */
    $(function() {
      $("#file").change(function() {
        $("#message").empty(); // To remove the previous error message
        var file = this.files[0];
        var imagefile = file.type;
        var match= ["image/jpeg","image/png","image/jpg"];
        if (!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])))
        {
          $('#previewing').attr('src','noimg.png');
          $("#message").html("<p id='error'>Please Select A valid Image File</p>"+"<h4>Note</h4>"+"<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");
          return false;
        }else {
          var reader = new FileReader();
          reader.onload = imageIsLoaded;
          reader.readAsDataURL(this.files[0]);
        }
      });
    });
    function imageIsLoaded(e) {
      $("#file").css("color","green");
      $('#image_preview');
      $('#previewing').attr('src', e.target.result);
    }
</script>