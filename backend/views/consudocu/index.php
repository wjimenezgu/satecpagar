<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\export\ExportMenu;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MovimientosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Consulta Documentos';
$this->params['breadcrumbs'][] = $this->title;

$gridColumns =   [           
        	['attribute'=>'idCliProCia','value'=>'idCliProCia0.nombre'],

        	[
        			'attribute'=>'idTipoDocumento',
        			'value'=>'idTipoDocumento0.siglas'],
        	'numero',
        	[
        		'attribute'=>'fecha',
        		'format'=>'date',
        		'width'=>'10%',
        		
        	],        		
        //	'monto',
        	[
        		'attribute'=>'monto',
        		//	'type'=>'MaskMoney::classname()',
        		
        		'format'=>['decimal', 2],
        		'hAlign'=>'right',
        		'pageSummary'=>true,
    		],        		
     //  	'saldo',
        	[
        		'attribute'=>'saldo',
        		//	'type'=>'MaskMoney::classname()',
        		
        		'format'=>['decimal', 2],
        		'hAlign'=>'right',
        		'pageSummary'=>true,
        	],
        	
            [
            		'class' => 'kartik\grid\ActionColumn',
            	//	'template' => '{update} {delete}',
            		'template' => '{view}',
            		'headerOptions'=>['class'=>'kartik-sheet-style'],
            		
        	],
		
		
		
       
   ];

	$fullExportMenu =ExportMenu::widget([
		'dataProvider' => $dataProvider,
		'columns' => $gridColumns,
		'fontAwesome' => true,
		'dropdownOptions' => [
				'label' => 'Exportar Todo',
				'class' => 'btn btn-default'
		]
	]) ;


?>
<div class="consudocu-index">

  <!--  <h1><?= Html::encode($this->title) ?></h1>   --> 
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
    	'showPageSummary'=>true,
    	'containerOptions'=>['style'=>'overflow: auto'],    		
    	'responsive'=>true,
    	'hover'=>true,
    	'panel'=>[
    				'type'=>GridView::TYPE_PRIMARY,
    				'heading'=>$this->title
    		],
    	'toolbar' => [
    			$fullExportMenu,
    			//	[
    			//			'content'=>
    			//			Html::a('Agregar', ['create'], ['class' => 'btn btn-success']),
    			//	],
    				'{toggleData}',
    		],
        'columns' => $gridColumns,
    ]); ?>


</div>
