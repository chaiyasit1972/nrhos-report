<?php
use kartik\export\ExportMenu;
use kartik\grid\GridView;
use kartik\mpdf\Pdf;
use kartik\helpers\Html;

?>
<div class="breadcrumbs">
    <div class="container">
        <h3 class="pull-left"><?=$sText;?></h3>
        <ul class="pull-right breadcrumb">
            <li><?=Html::a('Home',['/site/index']);?></li>
            <li><?=$sText;?></li>
            <li><?=Html::a($mText,['/practice/index']);;?></li>
            <li class="active"><?=$names;?></li>
        </ul>
    </div>
</div>
<div class="service-info margin-left-10 margin-right-10">
<?php
$gridColumns = [
    [
        'class' => '\kartik\grid\SerialColumn',
        'header' => 'ลำดับที่',
        'headerOptions' => ['style'=>'text-align:center'],
        'hAlign'=>'center',
        'width'=>'60px',
        'hidden'=>false
    ],        
    [   
        'headerOptions' => ['style'=>'text-align:center'],        
        'attribute'=>'name',
        'label'=>'รายละเอียดกิจกรรม',
        'vAlign'=>'middle',
        'hAlign'=>'left',   
        'format'=>'raw',        
    ],       
    [ 
        'headerOptions' => ['style'=>'text-align:center'],      
        'attribute'=>'numm',
        'label'=>'ชาย',
        'vAlign'=>'middle',
        'hAlign'=>'center',   
    ],        
    [ 
        'headerOptions' => ['style'=>'text-align:center'],       
        'attribute'=>'numf',
        'label'=>'หญิง',
        'vAlign'=>'middle',
        'hAlign'=>'center',    
    ],      

];
$fullExportMenu = ExportMenu::widget([
'dataProvider' => $dataProvider,
'columns' => $gridColumns,
'target' => ExportMenu::TARGET_BLANK,
'exportConfig' => [
    ExportMenu::FORMAT_TEXT => false,
    ExportMenu::FORMAT_PDF => false,
    ExportMenu::FORMAT_HTML => false,
],    
'fontAwesome' => true,
'rowOptions' => ['class' => GridView::TYPE_DANGER],    
'pjaxContainerId' => 'kv-pjax-container',
'columnSelectorOptions'=>[
        'label' => 'Cols',
        'class' => 'btn btn-success btn-sm ',    
],        
'dropdownOptions' => [
'label' => 'Export All',
'class' => 'btn btn-danger btn-sm',
'itemsBefore' => [
'<li class="dropdown-header">Export All Data</li>',
],
],
]);
echo GridView::widget([
'dataProvider' => $dataProvider,
'columns' => $gridColumns,   
'tableOptions' =>['class'=>'table table-striped table-bordered table-hoverr'],   
//'summary' => "{begin} - {end} {count} {totalCount} {page} {pageCount}",  
'summary' =>"<small>แสดง</small> {begin} - {end} <small>จาก</small> {totalCount} record",    
'pjax' => true, 
'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']], 
'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>&nbsp;' . $names . ' ตั้งแต่วันที่    ' .  
                  Yii::$app->mycomponent->ShortDateThai($date1) .'   ถึงวันที่     '.  Yii::$app->mycomponent->ShortDateThai($date2).'</h3>',
],
   'beforeHeader'=>[
        [
            'columns'=>[
                ['content'=>'', 'options'=>['colspan'=>2, 'class'=>'text-center warning']], 
                ['content'=>'ผลงาน(ราย)', 'options'=>['colspan'=>2, 'class'=>'text-center warning']], 
            ],
            'options'=>['class'=>'skip-export'] // remove this row from export
        ]
    ],      
/*'exportConfig' => [
       GridView::PDF => ['label' => 'Save as Pdf'],
],    
'export' => [             
       'label' => 'PDF',
       'fontAwesome' => true,
       'options' => [
            'class' => 'btn btn-info btn-sm',
       ],
],  */
'toolbar' => [ 
//'{export}',
$fullExportMenu,
]
]);
?>
</div>
