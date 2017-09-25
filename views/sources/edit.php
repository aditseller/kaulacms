<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Sources */

$this->title = 'Edit Sources: ' . $model->id_source;
$this->params['breadcrumbs'][] = ['label' => 'Sources', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Edit';
?>
<div class="sources-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
