<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Libro $model */

$this->title = 'Update Libro: ' . $model->Id_libro;
$this->params['breadcrumbs'][] = ['label' => 'Libros', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Id_libro, 'url' => ['view', 'Id_libro' => $model->Id_libro]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="libro-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
