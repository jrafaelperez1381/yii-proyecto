<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Libro $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="libro-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Titulo')->textInput(['maxlength' => true]) ?>
    
    <?= Html::img($model->Imagen, ['width'=>'150px']); ?>

    <?= $form->field($model, 'archivo')->fileInput() ?>

    <div class="form-group">
    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
