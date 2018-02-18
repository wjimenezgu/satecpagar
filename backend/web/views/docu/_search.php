<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\DocuSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="docu-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'idTipoDocumento') ?>

    <?= $form->field($model, 'numero') ?>

    <?= $form->field($model, 'fecha') ?>

    <?= $form->field($model, 'monto') ?>

    <?php // echo $form->field($model, 'idEstadoDocumento') ?>

    <?php // echo $form->field($model, 'observacion') ?>

    <?php // echo $form->field($model, 'fecIns') ?>

    <?php // echo $form->field($model, 'userIns') ?>

    <?php // echo $form->field($model, 'saldo') ?>

    <?php // echo $form->field($model, 'idCliProCia') ?>

    <?php // echo $form->field($model, 'idMoneda') ?>

    <?php // echo $form->field($model, 'fecVence') ?>

    <?php // echo $form->field($model, 'fecMod') ?>

    <?php // echo $form->field($model, 'userMod') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
