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
use backend\models\Documento;
/* @var $this yii\web\View */
/* @var $model backend\models\Movimientos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="movimientos-form">

    <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>

 	<div class="row">
 		<div class="col-sm-6">     
    		<?= $form->field($model, 'idCliProCia')->widget(Select2::classname(), [
			    'language' => 'es',
    			'disabled' => true,
			    'data' => ArrayHelper::map(Cliprocia::find()->all(),'id','nombre'),
			    'options' => ['placeholder' => 'Seleccione Cliente ..'],    			
			    'pluginOptions' => [
			        'allowClear' => true,
			    				    	
    						],
				]);
    		?> 		
    	</div>	
 		<div class="col-sm-2">     
    		<?= $form->field($model, 'numero')->textInput(['maxlength' => true,'readonly'=>true]) ?>
    	</div>
		<div class="col-sm-2">     	
   			 <?= $form->field($model, 'monto')->widget(MaskMoney::classname(), [
   			 		'disabled' => true,
    				'options' => ['class'=>'text-right'],
				]);
   			 ?>
		</div>
		<div class="col-sm-2">     	
   			 <?= $form->field($model, 'saldo')->widget(MaskMoney::classname(), [
   			 		'disabled' => true,
    				'options' => [
    						'class'=>'text-right'
    				],
   			 		'pluginOptions' => [
   			 		//		'prefix' => '$ ',
   			 		//		'suffix' => ' €',
   			 				'allowNegative' => true
   			 		]
				]);
   			 ?>
		</div>
	</div>	
        <!-- MOVIMIENTOS X DOCUMENTO -->
    <div class="panel panel-default">
        <div class="panel-heading"><h4><i ></i> Facturas del Documento</h4></div>
        <div class="panel-body">	
    <?php DynamicFormWidget::begin([
        'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
        'widgetBody' => '.container-items', // required: css class selector
        'widgetItem' => '.item', // required: css class
        'limit' => 15, // the maximum times, an element can be added (default 999)
        'min' => 0, // 0 or 1 (default 1)
        'insertButton' => '.add-item', // css class
        'deleteButton' => '.remove-item', // css class
        'model' => $modelsDocumovidet[0],
        'formId' => 'dynamic-form',
        'formFields' => [
        	'idDocAplica',
        	'monto',
        	'fecIns',
        	'userIns',	

        ],
    ]); ?>

            
	<table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Facturas</th>
                <th class="text-center" style="width: 90px;">
                    <button type="button" class="add-item btn btn-success btn-sm pull-right"><i class="glyphicon glyphicon-plus"></i> Agregar Factura</button>
                </th>
            </tr>
        </thead>
        <tbody class="container-items"> <!-- widgetBody -->           
            
            <?php foreach ($modelsDocumovidet as $i => $modelDocumovidet): ?>
            
            <tr class="item">
                <td class="vcenter">
						<div class="row">

                        <?php
                            // necessary for update action.
                            if (! $modelDocumovidet->isNewRecord) {
                                echo Html::activeHiddenInput($modelDocumovidet, "[{$i}]id");
                            }
                        ?>
                            <div class="col-sm-5">
                                <?= $form->field($modelDocumovidet, "[{$i}]idDocAplica")->dropDownList(
                                	/**  ORIGINAL
                                		ArrayHelper::map(Documento::find()
                                							->where(['idCliProCia' => $model->idCliProCia])
                                							->andWhere(['!=','id',$model->id])
                                							->orderBy('numero')
                                							->all(),
                                							'id','numero'),
                                		['prompt'=>'Seleccione Documento ..']);
									*/
                                		ArrayHelper::map(Documento::find()
                                		->joinWith(['idTipoDocumento0'])
                                		->where(['idCliProCia' => $model->idCliProCia])
                                		->andWhere(['!=','Documento.id',$model->id])
                                		->andWhere(['!=','saldo',0.00])
                                		->andWhere(['!=','idDebiCredi',$model->debiCrediDoc])
                                		->orderBy('numero')
                                		->all(),
                                		'id','campoLista'),
                                		['prompt'=>'Seleccione Factura ..',
                                		 	
                                		]);
                                
                                
                                ?>   
                            </div>
                       <!-- 
                            <div class="col-sm-2">
                                <?= $form->field($modelDocumovidet, "[{$i}]saldo")->widget(MaskMoney::classname(), [    				
    									'options' => ['class'=>'text-right','readonly'=>true],
									]);
    							?>
                            </div>
                       -->
                            <div class="col-sm-2">
                                <?= $form->field($modelDocumovidet, "[{$i}]monto")->widget(MaskMoney::classname(), [    				
    									'options' => ['class'=>'text-right'],
									]);
    							?>
                            </div>
                            <div class="col-sm-3">   
								<?= $form->field($modelDocumovidet, "[{$i}]fecIns")->widget(DateControl::classname(), [
						    		'type'=>DateControl::FORMAT_DATETIME,
						    			'readonly'=>true,
						    				'autoWidget' => false,
						
									]); ?>                                
                            </div>
                            <div class="col-sm-2">
                                <?= $form->field($modelDocumovidet, "[{$i}]userIns")->textInput(['maxlength' => true,'readonly'=>true]) ?>
                            </div>
                        </div><!-- .row -->
				</td>
                <td class="text-center vcenter" style="width: 90px; verti">
                    <button type="button" class="remove-item btn btn-danger btn-xs"><span class="glyphicon glyphicon-minus"></span></button>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <?php DynamicFormWidget::end(); ?>
	        </div>
    </div>   
    
	
	
	
	
	
	
    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Agregar' : 'Aplicar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
