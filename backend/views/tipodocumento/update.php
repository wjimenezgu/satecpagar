<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Tipodocumento */

$this->title = 'Actualizara Tipo Documento: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tipo Documentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tipodocumento-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
