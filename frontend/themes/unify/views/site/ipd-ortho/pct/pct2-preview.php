<?php
use kartik\tabs\TabsX;
use yii\helpers\Url;
use yii\helpers\Html;
use kartik\export\ExportMenu;
use kartik\grid\GridView;
use kartik\mpdf\Pdf;

?>
<div class="breadcrumbs">
    <div class="container">
        <h3 class="pull-left"><?= $mText; ?></h3>
        <ul class="pull-right breadcrumb">
            <li><?= Html::a('Home', ['/site/index']); ?></li>
            <li><?=
                Html::a($names, ['/ipd-ortho/index']);
                ;
                ?></li>
            <li class="active"><?= Html::a($namet); ?></li>
        </ul>
    </div>
</div>
<?php
        $gridColumns1 = [
            [
                'class' => '\kartik\grid\SerialColumn',
                'header' => 'ลำดับที่',
                'headerOptions' => ['style'=>'text-align:center'],
                'hAlign'=>'center',
                'width'=>'60px',
            ],
            [ 
                'headerOptions' => ['style'=>'text-align:center'],      
                'attribute'=>'pname',
                'label'=>'รายการการ',
                'vAlign'=>'middle',
                'hAlign'=>'left', 
                'pageSummary'=>'รวมทั้งหมด'        
            ],      
            [ 
                'headerOptions' => ['style'=>'text-align:center'],      
                'attribute'=>'man',
                'label'=>'จำนวนผู้ป่วย',
                'vAlign'=>'middle',
                'hAlign'=>'center',       
                'pageSummary'=>true
            ],   
            [ 
                'headerOptions' => ['style'=>'text-align:center'],      
                'attribute'=>'men',
                'label'=>'จำนวนวันนอน',
                'vAlign'=>'middle',
                'hAlign'=>'center',     
                'value' => function($data){
                      return is_null($data['men'])?'0':$data['men'];
                },
                'pageSummary'=>true
            ],              
        ];
        $fullExportMenu1 = ExportMenu::widget([
        'options' => ['id' =>'expt1'],    
        'dataProvider' => $dataProvider1,
        'columns' => $gridColumns1,
        'target' => ExportMenu::TARGET_BLANK,
        'exportConfig' => [
            ExportMenu::FORMAT_TEXT => false,
            ExportMenu::FORMAT_PDF => false,
            ExportMenu::FORMAT_HTML => false,
        ],    
        'fontAwesome' => true,
        'rowOptions' => ['class' => GridView::TYPE_DANGER],    
        'pjaxContainerId' => 'kv-pjax-container1',
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
        $grid1 = GridView::widget([
        'dataProvider' => $dataProvider1,
        'columns' => $gridColumns1, 
        'tableOptions' =>['class'=>'table table-striped table-bordered table-hoverr'],    
        'summary' =>"<small>แสดง</small> {begin} - {end} <small>จาก</small> {totalCount} record",    
        'pjax' => true, 
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container1']], 
        'panel' => [
                'type' => GridView::TYPE_PRIMARY,
                'heading' => '<h6 class="panel-title"><i class="glyphicon glyphicon-book"></i>&nbsp;'. $names .' - '. $namet. '   ตั้งแต่วันที่    ' .  
                          Yii::$app->mycomponent->ShortDateThai($date1) .'   ถึงวันที่     '. 
                          Yii::$app->mycomponent->ShortDateThai($date2).'</h3>',
        ],
        'showPageSummary'=>true,    
        'toolbar' => [ 
        $fullExportMenu1,
        ]
        ]);
?>            
<!-- content2 -->
<?php
$gridColumns2 = [
    [
        'class' => '\kartik\grid\SerialColumn',
        'header' => 'ลำดับที่',
        'headerOptions' => ['style'=>'text-align:center'],
        'hAlign'=>'center',
        'width'=>'60px',
    ],
    [ 
        'headerOptions' => ['style'=>'text-align:center'],      
        'attribute'=>'icd10',
        'label'=>'icd10',
        'vAlign'=>'middle',
        'hAlign'=>'left',    
    ],      
    [ 
        'headerOptions' => ['style'=>'text-align:center'],      
        'attribute'=>'pnames',
        'label'=>'การวินิจฉัย',
        'vAlign'=>'middle',
        'hAlign'=>'left', 
        'pageSummary'=>'รวมทั้งหมด'        
    ],      
    [ 
        'headerOptions' => ['style'=>'text-align:center'],      
        'attribute'=>'cc',
        'label'=>'จำนวนทั้งหมด',
        'vAlign'=>'middle',
        'hAlign'=>'center',       
        'pageSummary'=>true
    ],    
];
$fullExportMenu2 = ExportMenu::widget([
'options' =>['id' =>'expt2'],    
'dataProvider' => $dataProvider2,
'columns' => $gridColumns2,
'target' => ExportMenu::TARGET_BLANK,
'exportConfig' => [
    ExportMenu::FORMAT_TEXT => false,
    ExportMenu::FORMAT_PDF => false,
    ExportMenu::FORMAT_HTML => false,
],    
'fontAwesome' => true,
'rowOptions' => ['class' => GridView::TYPE_DANGER],    
'pjaxContainerId' => 'kv-pjax-container2',
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
$grid2= GridView::widget([
'dataProvider' => $dataProvider2,
'columns' => $gridColumns2, 
'tableOptions' =>['class'=>'table table-striped table-bordered table-hoverr'],    
'summary' =>"<small>แสดง</small> {begin} - {end} <small>จาก</small> {totalCount} record",    
'pjax' => true, 
'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container2']], 
'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<h6 class="panel-title"><i class="glyphicon glyphicon-book"></i>&nbsp;'. $names .' - '. $namet. '   ตั้งแต่วันที่    ' .  
                  Yii::$app->mycomponent->ShortDateThai($date1) .'   ถึงวันที่     '. 
                  Yii::$app->mycomponent->ShortDateThai($date2).'</h3>',
],
'showPageSummary'=>true,    
'toolbar' => [ 
$fullExportMenu2,
]
]);
?>   
<!-- content3 -->
  <?php
$gridColumns3 = [
    [
        'class' => '\kartik\grid\SerialColumn',
        'header' => 'ลำดับที่',
        'headerOptions' => ['style'=>'text-align:center'],
        'hAlign'=>'center',
        'width'=>'60px',
    ],
    [ 
        'headerOptions' => ['style'=>'text-align:center'],      
        'attribute'=>'pnames',
        'label'=>'รายการการ',
        'vAlign'=>'middle',
        'hAlign'=>'left', 
        'pageSummary'=>'รวมทั้งหมด'        
    ],      
    [ 
        'headerOptions' => ['style'=>'text-align:center'],      
        'attribute'=>'cc',
        'label'=>'จำนวนทั้งหมด',
        'vAlign'=>'middle',
        'hAlign'=>'center',       
        'pageSummary'=>true
    ],    
];
$fullExportMenu3 = ExportMenu::widget([
'options' =>['id' =>'expt3'],    
'dataProvider' => $dataProvider3,
'columns' => $gridColumns3,
'target' => ExportMenu::TARGET_BLANK,
'exportConfig' => [
    ExportMenu::FORMAT_TEXT => false,
    ExportMenu::FORMAT_PDF => false,
    ExportMenu::FORMAT_HTML => false,
],    
'fontAwesome' => true,
'rowOptions' => ['class' => GridView::TYPE_DANGER],    
'pjaxContainerId' => 'kv-pjax-container3',
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
$grid3= GridView::widget([
'dataProvider' => $dataProvider3,
'columns' => $gridColumns3, 
'tableOptions' =>['class'=>'table table-striped table-bordered table-hoverr'],    
'summary' =>"<small>แสดง</small> {begin} - {end} <small>จาก</small> {totalCount} record",    
'pjax' => true, 
'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container3']], 
'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<h6 class="panel-title"><i class="glyphicon glyphicon-book"></i>&nbsp;'. $names .' - '. $namet. '   ตั้งแต่วันที่    ' .  
                  Yii::$app->mycomponent->ShortDateThai($date1) .'   ถึงวันที่     '. 
                  Yii::$app->mycomponent->ShortDateThai($date2).'</h3>',
],
'showPageSummary'=>true,    
'toolbar' => [ 
$fullExportMenu3,
]
]);
?>            
<!-- content4 -->
  <?php
$gridColumns4 = [
    [
        'class' => '\kartik\grid\SerialColumn',
        'header' => 'ลำดับที่',
        'headerOptions' => ['style'=>'text-align:center'],
        'hAlign'=>'center',
        'width'=>'60px',
    ],
    [ 
        'headerOptions' => ['style'=>'text-align:center'],      
        'attribute'=>'pnames',
        'label'=>'รายการการ',
        'vAlign'=>'middle',
        'hAlign'=>'left', 
        'pageSummary'=>'รวมทั้งหมด'        
    ],      
    [ 
        'headerOptions' => ['style'=>'text-align:center'],      
        'attribute'=>'cc',
        'label'=>'จำนวนทั้งหมด',
        'vAlign'=>'middle',
        'hAlign'=>'center',       
        'pageSummary'=>true
    ],    
];
$fullExportMenu4 = ExportMenu::widget([
'options'=>['id' =>'expt4'],
'dataProvider' => $dataProvider4,
'columns' => $gridColumns4,
'target' => ExportMenu::TARGET_BLANK,
'exportConfig' => [
    ExportMenu::FORMAT_TEXT => false,
    ExportMenu::FORMAT_PDF => false,
    ExportMenu::FORMAT_HTML => false,
],    
'fontAwesome' => true,
'rowOptions' => ['class' => GridView::TYPE_DANGER],    
'pjaxContainerId' => 'kv-pjax-container4',
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
$grid4 = GridView::widget([
'dataProvider' => $dataProvider4,
'columns' => $gridColumns4, 
'tableOptions' =>['class'=>'table table-striped table-bordered table-hoverr'],    
'summary' =>"<small>แสดง</small> {begin} - {end} <small>จาก</small> {totalCount} record",    
'pjax' => true, 
'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container4']], 
'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<h6 class="panel-title"><i class="glyphicon glyphicon-book"></i>&nbsp;'. $names .' - '. $namet. '   ตั้งแต่วันที่    ' .  
                  Yii::$app->mycomponent->ShortDateThai($date1) .'   ถึงวันที่     '. 
                  Yii::$app->mycomponent->ShortDateThai($date2).'</h3>',
],
'showPageSummary'=>true,    
'toolbar' => [ 
$fullExportMenu4,
]
]);
?>            
<!-- cotent5 -->
  <?php
$gridColumns5 = [
    [
        'class' => '\kartik\grid\SerialColumn',
        'header' => 'ลำดับที่',
        'headerOptions' => ['style'=>'text-align:center'],
        'hAlign'=>'center',
        'width'=>'60px',
    ],
    [ 
        'headerOptions' => ['style'=>'text-align:center'],      
        'attribute'=>'hn',
        'label'=>'HN',
        'vAlign'=>'middle',
        'hAlign'=>'left',    
    ],      
    [ 
        'headerOptions' => ['style'=>'text-align:center'],      
        'attribute'=>'an',
        'label'=>'AN',
        'vAlign'=>'middle',
        'hAlign'=>'center',  
    ],    
    [ 
        'headerOptions' => ['style'=>'text-align:center'],      
        'attribute'=>'pname',
        'label'=>'ชื่อผู้ป่วย',
        'vAlign'=>'middle',
        'hAlign'=>'left',    
    ],      
    [ 
        'headerOptions' => ['style'=>'text-align:center'],      
        'attribute'=>'age_y',
        'label'=>'อายุ',
        'vAlign'=>'middle',
        'hAlign'=>'center',  
    ],  
    [ 
        'headerOptions' => ['style'=>'text-align:center'],      
        'attribute'=>'regdate',
        'label'=>'วัน admit',
        'vAlign'=>'middle',
        'hAlign'=>'left',    
    ],      
    [ 
        'headerOptions' => ['style'=>'text-align:center'],      
        'attribute'=>'regtime',
        'label'=>'เวลา admit',
        'vAlign'=>'middle',
        'hAlign'=>'left',    
    ],    
    [ 
        'headerOptions' => ['style'=>'text-align:center'],      
        'attribute'=>'dchdate',
        'label'=>'วันจำหน่าย',
        'vAlign'=>'middle',
        'hAlign'=>'center',  
    ],  
    [ 
        'headerOptions' => ['style'=>'text-align:center'],      
        'attribute'=>'pdx',
        'label'=>'pdx',
        'vAlign'=>'middle',
        'hAlign'=>'left',    
    ],      
    [ 
        'headerOptions' => ['style'=>'text-align:center'],      
        'attribute'=>'diag',
        'label'=>'Principal Diagnosis(การวินิจฉัยโรคหลัก)',
        'vAlign'=>'middle',
        'hAlign'=>'left',  
    ],
    [ 
        'headerOptions' => ['style'=>'text-align:center'],      
        'attribute'=>'exd_icd10',
        'label'=>'dxt5',
        'vAlign'=>'middle',
        'hAlign'=>'left',    
                'value' => function($data){
                      return is_null($data['exd_icd10'])?' ':$data['exd_icd10'];
                },        
    ],      
    [ 
        'headerOptions' => ['style'=>'text-align:center'],      
        'attribute'=>'ename',
        'label'=>'External Cause(สาเหตุภายนอก)',
        'vAlign'=>'middle',
        'hAlign'=>'left',  
                'value' => function($data){
                      return is_null($data['ename'])?' ':$data['ename'];
                },        
    ],    
    [ 
        'headerOptions' => ['style'=>'text-align:center'],      
        'attribute'=>'op0',
        'label'=>'ICD9-1',
        'vAlign'=>'middle',
        'hAlign'=>'left',  
    ],     
    [ 
        'headerOptions' => ['style'=>'text-align:center'],      
        'attribute'=>'op1',
        'label'=>'ICD9-2',
        'vAlign'=>'middle',
        'hAlign'=>'left',  
    ],  
        [ 
        'headerOptions' => ['style'=>'text-align:center'],      
        'attribute'=>'op2',
        'label'=>'ICD9-3',
        'vAlign'=>'middle',
        'hAlign'=>'left',  
    ], 
    [ 
        'headerOptions' => ['style'=>'text-align:center'],      
        'attribute'=>'op3',
        'label'=>'ICD9-4',
        'vAlign'=>'middle',
        'hAlign'=>'left',  
    ],     
    [ 
        'headerOptions' => ['style'=>'text-align:center'],      
        'attribute'=>'op4',
        'label'=>'ICD9-5',
        'vAlign'=>'middle',
        'hAlign'=>'left',  
    ],    
    [ 
        'headerOptions' => ['style'=>'text-align:center'],      
        'attribute'=>'op5',
        'label'=>'ICD9-6',
        'vAlign'=>'middle',
        'hAlign'=>'left',  
    ],   
    [ 
        'headerOptions' => ['style'=>'text-align:center'],      
        'attribute'=>'op6',
        'label'=>'ICD9-7',
        'vAlign'=>'middle',
        'hAlign'=>'left',  
    ],        
    [ 
        'headerOptions' => ['style'=>'text-align:center'],      
        'attribute'=>'request_date',
        'label'=>'วันที่สั่งผ่าตัด',
        'vAlign'=>'middle',
        'hAlign'=>'left',  
        'hAlign'=>'left',  
                'value' => function($data){
                      return is_null($data['request_date'])?' ':$data['request_date'];
                },          
    ],      
    [ 
        'headerOptions' => ['style'=>'text-align:center'],      
        'attribute'=>'request_time',
        'label'=>'เวลาสั่งผ่าตัด',
        'vAlign'=>'middle',
        'hAlign'=>'left',  
        'hAlign'=>'left',  
                'value' => function($data){
                      return is_null($data['request_time'])?' ':$data['request_time'];
                },          
    ],    
    [ 
        'headerOptions' => ['style'=>'text-align:center'],      
        'attribute'=>'operation_name',
        'label'=>'ชื่อผ่าตัด',
        'vAlign'=>'middle',
        'hAlign'=>'left',  
        'value'=>  function ($data){
                       return is_null($data['operation_name'])? ' ' : $data['operation_name'];
        }
    ],                        
    [ 
        'headerOptions' => ['style'=>'text-align:center'],      
        'attribute'=>'ward',
        'label'=>'ตึก',
        'vAlign'=>'middle',
        'hAlign'=>'left',  
    ],        
    [ 
        'headerOptions' => ['style'=>'text-align:center'],      
        'attribute'=>'statusx',
        'label'=>'สถานะจำหน่าย',
        'vAlign'=>'middle',
        'hAlign'=>'left',  
    ],   
    [ 
        'headerOptions' => ['style'=>'text-align:center'],      
        'attribute'=>'income',
        'label'=>'ค่าใช้จ่าย',
        'vAlign'=>'middle',
        'hAlign'=>'center',  
        'format' => ['decimal',2],
    ],             
];
$fullExportMenu5 = ExportMenu::widget([
'options' =>['id' =>'expt5'],    
'dataProvider' => $dataProvider5,
'columns' => $gridColumns5,
'target' => ExportMenu::TARGET_BLANK,
'exportConfig' => [
    ExportMenu::FORMAT_TEXT => false,
    ExportMenu::FORMAT_PDF => false,
    ExportMenu::FORMAT_HTML => false,
],    
'fontAwesome' => true,
'rowOptions' => ['class' => GridView::TYPE_DANGER],    
'pjaxContainerId' => 'kv-pjax-container5',
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
$grid5 = GridView::widget([
'dataProvider' => $dataProvider5,
'columns' => $gridColumns5, 
'tableOptions' =>['class'=>'table table-striped table-bordered table-hoverr'],    
'summary' =>"<small>แสดง</small> {begin} - {end} <small>จาก</small> {totalCount} record",    
'pjax' => true, 
'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container5']], 
'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<h6 class="panel-title"><i class="glyphicon glyphicon-book"></i>&nbsp;'. $names .' - '. $namet. '   ตั้งแต่วันที่    ' .  
                  Yii::$app->mycomponent->ShortDateThai($date1) .'   ถึงวันที่     '. 
                  Yii::$app->mycomponent->ShortDateThai($date2).'</h3>',
],
'showPageSummary'=>true,    
'toolbar' => [ 
$fullExportMenu5,
]
]);
?>            

<div class="tab-v3 nav nav-tabs  service margin-left-5 margin-right-5">    
<?= TabsX::widget([
               'position' => TabsX::POS_ABOVE,
               'align' => TabsX::ALIGN_LEFT,
               'encodeLabels' => false,
               'class' =>'nav-tabs-custom',
               'items' => [
                      [
                             'label' => '<small>จำนวนผู้ป่วย/วันนอน ทั้งหมด</small>',
                             'content' =>'<div class="well-sm grid-view"><div class="row">' . $grid1 . '</div></div>',
                             'active' => true
                      ],
                      [
                             'label' => '<small>ภาวะแทรกซ้อน/โรคร่วม</small>',
                             'content' =>'<div class="well-sm grid-view"><div class="row">' . $grid2 . '</div></div>',
                              'options' => ['id' => 'myID1'],
                      ],
                      [
                             'label' => '<small>เสียชีวิต</small>',
                             'content' =>'<div class="well-sm grid-view"><div class="row">' . $grid3 . '</div></div>',
                             'options' => ['id' => 'myID2'],
                      ], 
                      [
                             'label' => '<small>Re admit</small>',
                             'content' =>'<div class="well-sm grid-view"><div class="row">' . $grid4 . '</div></div>',
                             'options' => ['id' => 'myID3'],
                      ],        
                      [
                             'label' => '<small>รายชื่อผู้ป่วยทั้งหมด</small>',
                             'content' =>'<div class="well-sm grid-view"><div class="row">' . $grid5 . '</div></div>',
                             'options' => ['id' => 'myID4'],
                      ],     
               ],
        ]);    
?>