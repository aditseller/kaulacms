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

    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' =>'btn btn-success btn-lg']) ?>
    </div>

    <?php ActiveForm::end(); ?>


</div>
