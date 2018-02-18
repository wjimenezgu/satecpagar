<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Dia */

$this->title = 'Create Dia';
$this->params['breadcrumbs'][] = ['label' => 'Dias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dia-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
