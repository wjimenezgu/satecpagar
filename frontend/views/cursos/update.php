<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Cursos */

$this->title = 'Update Cursos: ' . ' ' . $model->idCurso;
$this->params['breadcrumbs'][] = ['label' => 'Cursos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idCurso, 'url' => ['view', 'id' => $model->idCurso]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cursos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
