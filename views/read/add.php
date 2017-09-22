<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\tinymce\TinyMce;
use yii\helpers\ArrayHelper;
use yii\web\JsExpression;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model app\models\Read */

$this->title = 'Add Article';
$this->params['breadcrumbs'][] = ['label' => 'Reads', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="read-create">

    <h1><?= Html::encode($this->title) ?></h1>

  <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'teaser')->textarea(['rows' => 3]) ?>


	
	<?= $form->field($model, 'content')->widget(TinyMce::className(), [
    'options' => ['rows' => 15],
    'language' => 'en',
    'clientOptions' => [
        'plugins' => [
            "advlist autolink lists link charmap print preview anchor",
            "searchreplace visualblocks code fullscreen",
            "insertdatetime media table contextmenu paste"
        ],
        'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
    ]
]);?>


	<?= $form->field($model, 'channel')->dropDownList(ArrayHelper::map(\app\models\Channel::find()->asArray()->all(), 'id_channel', 'channel'), ['prompt' => '-- Select Channel --']) ?>

    <?= //work with ActiveForm
$form->field($model, 'tag')->widget(\xj\tagit\Tagit::className(), [
    'clientOptions' => [
        'tagSource' => Url::to(['tag/get-autocomplete']),
        'autocomplete' => [
            'delay' => 200,
            'minLength' => 1,
        ],
        'singleField' => true,
        'beforeTagAdded' => new JsExpression(<<<EOF
function(event, ui){
    if (!ui.duringInitialization) {
        console.log(event);
        console.log(ui);
    }
}
EOF
),
    ],
]); ?>

    	<?= $form->field($model, 'source')->dropDownList(ArrayHelper::map(\app\models\Sources::find()->asArray()->all(), 'id_source', 'source'), ['prompt' => '-- Select Source --']) ?>

		
	<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">Upload Image</button>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog" style="width:950px;">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Upload Image</h4>
      </div>
      <div class="modal-body">
       <iframe width="100%" height="650px" src="<?= Yii::$app->urlManager->createUrl(['images/addrender']); ?>"></iframe>
      </div>
     
    </div>

  </div>
</div>	
		
   <?= $form->field($model, 'image')->textInput(['maxlength' => true]) ?>
	
	
    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' =>'btn btn-success btn-lg']) ?>
    </div>

    <?php ActiveForm::end(); ?>


</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script type="text/javascript" src="<?= Yii::$app->params['siteUrl'] ?>public/js/iframeResizer.min.js"></script>
		<script type="text/javascript">

			/*
			 * If you do not understand what the code below does, then please just use the
			 * following call in your own code.
			 *
			 *   iFrameResize({log:true});
			 *
			 * Once you have it working, set the log option to false.
			 */

			iFrameResize({
				log                     : true,                  // Enable console logging
				inPageLinks             : true,
				resizedCallback         : function(messageData){ // Callback fn when resize is received
					$('p#callback').html(
						'<b>Frame ID:</b> '    + messageData.iframe.id +
						' <b>Height:</b> '     + messageData.height +
						' <b>Width:</b> '      + messageData.width +
						' <b>Event type:</b> ' + messageData.type
					);
				},
				messageCallback         : function(messageData){ // Callback fn when message is received
					$('p#callback').html(
						'<b>Frame ID:</b> '    + messageData.iframe.id +
						' <b>Message:</b> '    + messageData.message
					);
					alert(messageData.message);
					document.getElementsByTagName('iframe')[0].iFrameResizer.sendMessage('Hello back from parent page');
				},
				closedCallback         : function(id){ // Callback fn when iFrame is closed
					$('p#callback').html(
						'<b>IFrame (</b>'    + id +
						'<b>) removed from page.</b>'
					);
				}
			});

		</script>



