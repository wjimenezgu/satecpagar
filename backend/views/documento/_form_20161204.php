<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\datecontrol\DateControl;
use kartik\widgets\Select2;
use kartik\money\MaskMoney;
use wbraganca\dynamicform\DynamicFormWidget;
use backend\models\Tipodocumento;
use backend\models\Estadodocumento;
use backend\models\Moneda;
use backend\models\Cliprocia;

/* @var $this yii\web\View */
/* @var $model backend\models\Documento */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="documento-form">

    <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>
 	<div class="row">
 		<div class="col-sm-6">     
    	<!-- <?= $form->field($model, 'idCliProCia')->dropDownList(ArrayHelper::map(Cliprocia::find()->all(),'id','nombre'),['prompt'=>'Seleccione Cliente']); ?>   -->	
    		<?= $form->field($model, 'idCliProCia')->widget(Select2::classname(), 
    				[
    					'language' => 'es',
    					'data' => ArrayHelper::map(Cliprocia::find()->all(),'id','cliProCiaEntidad'),
    					'options' => ['placeholder' => 'Seleccione Cliente ..'],
    					'pluginOptions' => ['allowClear' => true],
					]);
    		?>
    	</div>	
 		<div class="col-sm-3">     
    		<?= $form->field($model, 'idTipoDocumento')->dropDownList(ArrayHelper::map(Tipodocumento::find()->all(),'id','descripcion'),
    				['prompt'=>'Seleccione Tipo ...']); ?>
    	</div>
		<div class="col-sm-3">     
    		<?= $form->field($model, 'numero')->textInput(['maxlength' => true]) ?>
    	</div>
 	</div>	
	<div class="row">
		<div class="col-sm-3">         		
    			<?= $form->field($model, 'fecha')->widget(DateControl::classname(), [
    			'type'=>DateControl::FORMAT_DATE,
    		//	'value'=>date('d/m/yyyy'),
    			'options' => [
    				'pluginOptions' => [
    						'autoclose' => true
    				],
    			]
				]); ?>
 		</div>	
		<div class="col-sm-3">     	
   	<!-- 	 <?= $form->field($model, 'monto')->textInput(['maxlength' => true]) ?>  -->	
   			 <?= $form->field($model, 'monto')->widget(MaskMoney::classname(), [
    				'options' => ['class'=>'text-right'],
				]);
   			 ?>
		</div>
<!-- 		
		<div class="col-sm-3">         		    		
    		<?= $form->field($model, 'idEstadoDocumento')->dropDownList(ArrayHelper::map(Estadodocumento::find()->all(),'id','descripcion'),['prompt'=>'Seleccione Estado ...']); ?>
   		</div>
		<div class="col-sm-3">   
    		<?= $form->field($model, 'idMoneda')->dropDownList(ArrayHelper::map(Moneda::find()->all(),'id','descripcion'),['prompt'=>'Seleccione Moneda ...']); ?>
		</div>
 -->
 		<div class="col-sm-6">  			
  			<?= $form->field($model, 'observacion')->textInput(['maxlength' => true]) ?>
		</div>
	</div>	

	
 
    
	
	
	
	
	
	
	
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Agregar' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    
    <?php ActiveForm::end(); ?>

</div>
