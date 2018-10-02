<?php

use yii\helpers\Html;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii2assets\fullscreenmodal\FullscreenModal;
use yii\widgets\Pjax;

$asset = frontend\assets\AppAsset::register($this);
$baseUrl = $asset->baseUrl;

?>
<head>
    <style type="text/css">
        .indent{ 
                    /*padding-left: 1.0em;*/
                    padding-top: 0.25em;
                 }
    </style>
</head>
<div class="breadcrumbs">
    <div class="container">
        <h4 class="pull-left"><?= $mText;?></h4>
        <ul class="pull-right breadcrumb">
            <li><?= Html::a('Home', ['/site/index']); ?></li>
            <li><?= $mText ; ?></li>           
            <li><?= Html::a($sText, ['/pct/index2']); ?></li>
            <li><?=$names;?></li>
        </ul>
    </div>
</div>
<div class="margin-bottom-10"></div>       
<div class="row margin-left-5 margin-right-5">
    <div class="col-md-4">
                <div class="item active">
                    <img src="<?= $baseUrl ?>/assets/img/bas3.jpg" alt="">
                </div>                                                   
    </div>
    <div class="col-md-8">
        <div class="tag-box tag-box-v3 form-page">
            <div class="headline"><h3><?= $names; ?></h3></div>
            <div class="margin-bottom-40"></div>                
            <ul class="list-group sidebar-nav-v1 lists-v1" id="sidebar-nav" style="list-style-type: none;">                        
                      <li>
                                    <?= !Yii::$app->user->isGuest?
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          1. รายงานอัตราการเสียชีวิตของผู้ป่วยศัลยกรรมทั่วไป(ผู้รับผิดชอบ-ER,OR,ICU,Ward) ',
                                                          ['/pct-sur/kpi61-index1']) : 
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          1. รายงานอัตราการเสียชีวิตของผู้ป่วยศัลยกรรมทั่วไป(ผู้รับผิดชอบ-ER,OR,ICU,Ward) ',
                                                          ['site/modal'],
                                                          [
                                                                 'class' => 'xmodal',
                                                                 'title' => 'เปิดดูข้อมูล',
                                                                 'data-target' => '#vmodal',
                                                                 'data-pjax' => '0',
                                                          ]
                                                      );                  
                                     ?>
                      </li>               
                       <li>
                                    <?= !Yii::$app->user->isGuest?
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          2. รายงานอัตราการตายจากการผ่าตัดภายใน 48 ชม.(ผู้รับผิดชอบ-OR,ICU,Ward)',
                                                          ['/pct-sur/kpi61-index2']) : 
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          2. รายงานอัตราการตายจากการผ่าตัดภายใน 48 ชม.(ผู้รับผิดชอบ-OR,ICU,Ward)',
                                                          ['site/modal'],
                                                          [
                                                                 'class' => 'xmodal',
                                                                 'title' => 'เปิดดูข้อมูล',
                                                                 'data-target' => '#vmodal',
                                                                 'data-pjax' => '0',
                                                          ]
                                                      );                  
                                     ?>
                      </li>     
                       <li>
                                    <?= !Yii::$app->user->isGuest?
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          3. รายงานอัตราการผ่าตัดซ้ำภายใน 24 ชม.(ผู้รับผิดชอบ-OR,ICU,Ward)',
                                                          ['/pct-sur/kpi61-index3']) : 
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          3. รายงานอัตราการผ่าตัดซ้ำภายใน 24 ชม.(ผู้รับผิดชอบ-OR,ICU,Ward)',
                                                          ['site/modal'],
                                                          [
                                                                 'class' => 'xmodal',
                                                                 'title' => 'เปิดดูข้อมูล',
                                                                 'data-target' => '#vmodal',
                                                                 'data-pjax' => '0',
                                                          ]
                                                      );                  
                                     ?>
                      </li>     

                       <li>
                                    <?= !Yii::$app->user->isGuest?
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          4. รายงานอัตราการติดเชื้อแผลผ่าตัด(Appendectomy)(ผู้รับผิดชอบ-OPD sx,Ward)',
                                                          ['/pct-sur/kpi61-index4']) : 
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          4. รายงานอัตราการติดเชื้อแผลผ่าตัด(Appendectomy)(ผู้รับผิดชอบ-OPD sx,Ward)',
                                                          ['site/modal'],
                                                          [
                                                                 'class' => 'xmodal',
                                                                 'title' => 'เปิดดูข้อมูล',
                                                                 'data-target' => '#vmodal',
                                                                 'data-pjax' => '0',
                                                          ]
                                                      );                  
                                     ?>
                      </li>                       
                       <li>
                                    <?= !Yii::$app->user->isGuest?
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          5. รายงานอัตราการติดเชื้อแผลผ่าตัด(Hernia)(ผู้รับผิดชอบ-OPD sx,Ward)',
                                                          ['/pct-sur/kpi61-index5']) : 
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          5. รายงานอัตราการติดเชื้อแผลผ่าตัด(Hernia)(ผู้รับผิดชอบ-OPD sx,Ward)',
                                                          ['site/modal'],
                                                          [
                                                                 'class' => 'xmodal',
                                                                 'title' => 'เปิดดูข้อมูล',
                                                                 'data-target' => '#vmodal',
                                                                 'data-pjax' => '0',
                                                          ]
                                                      );                  
                                     ?>
                      </li>                         
                       <li>
                                    <?= !Yii::$app->user->isGuest?
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          6. รายงานอัตราการ Re-admit ภายใน 28 วัน(ผู้รับผิดชอบ-Ward)',
                                                          ['/pct-sur/kpi61-index6']) : 
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          6. รายงานอัตราการ Re-admit ภายใน 28 วัน(ผู้รับผิดชอบ-Ward)',
                                                          ['site/modal'],
                                                          [
                                                                 'class' => 'xmodal',
                                                                 'title' => 'เปิดดูข้อมูล',
                                                                 'data-target' => '#vmodal',
                                                                 'data-pjax' => '0',
                                                          ]
                                                      );                  
                                     ?>
                      </li>                         
                       <li>
                                    <?= !Yii::$app->user->isGuest?
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          7. รายงานอัตราการ Re-admit ภายใน 28 วัน  ของผู้ป่วย UGIB(ผู้รับผิดชอบ-Ward)',
                                                          ['/pct-sur/kpi61-index7']) : 
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          7. รายงานอัตราการ Re-admit ภายใน 28 วัน  ของผู้ป่วย UGIB(ผู้รับผิดชอบ-Ward)',
                                                          ['site/modal'],
                                                          [
                                                                 'class' => 'xmodal',
                                                                 'title' => 'เปิดดูข้อมูล',
                                                                 'data-target' => '#vmodal',
                                                                 'data-pjax' => '0',
                                                          ]
                                                      );                  
                                     ?>
                      </li>                          
                       <li>
                                    <?= !Yii::$app->user->isGuest?
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          8. รายงานอัตราการ Re-admit ภายใน 28 วัน ของผู้ป่วย NF (ผู้รับผิดชอบ-Ward)',
                                                          ['/pct-sur/kpi61-index8']) : 
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          8. รายงานอัตราการ Re-admit ภายใน 28 วัน ของผู้ป่วย NF (ผู้รับผิดชอบ-Ward)',
                                                          ['site/modal'],
                                                          [
                                                                 'class' => 'xmodal',
                                                                 'title' => 'เปิดดูข้อมูล',
                                                                 'data-target' => '#vmodal',
                                                                 'data-pjax' => '0',
                                                          ]
                                                      );                  
                                     ?>
                      </li>     
                       <li>
                                    <?= !Yii::$app->user->isGuest?
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          9. รายงานอัตราตายในผู้ป่วย UGIB (ผู้รับผิดชอบ-Ward,ICU)',
                                                          ['/pct-sur/kpi61-index9']) : 
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          9. รายงานอัตราตายในผู้ป่วย UGIB (ผู้รับผิดชอบ-Ward,ICU)',
                                                          ['site/modal'],
                                                          [
                                                                 'class' => 'xmodal',
                                                                 'title' => 'เปิดดูข้อมูล',
                                                                 'data-target' => '#vmodal',
                                                                 'data-pjax' => '0',
                                                          ]
                                                      );                  
                                     ?>
                      </li>     
                       <li>
                                    <?= !Yii::$app->user->isGuest?
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          10. รายงานอัตราตายในผู้ป่วย NF (ผู้รับผิดชอบ-Ward,ICU)',
                                                          ['/pct-sur/kpi61-index10']) : 
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          10. รายงานอัตราตายในผู้ป่วย NF (ผู้รับผิดชอบ-Ward,ICU)',
                                                          ['site/modal'],
                                                          [
                                                                 'class' => 'xmodal',
                                                                 'title' => 'เปิดดูข้อมูล',
                                                                 'data-target' => '#vmodal',
                                                                 'data-pjax' => '0',
                                                          ]
                                                      );                  
                                     ?>
                      </li>   
                       <li>
                                    <?= !Yii::$app->user->isGuest?
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          11. รายงานอัตราการเกิด rupture appendicitis (ผู้รับผิดชอบ-OR)',
                                                          ['/pct-sur/kpi61-index11']) : 
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          11. รายงานอัตราการเกิด rupture appendicitis (ผู้รับผิดชอบ-OR)',
                                                          ['site/modal'],
                                                          [
                                                                 'class' => 'xmodal',
                                                                 'title' => 'เปิดดูข้อมูล',
                                                                 'data-target' => '#vmodal',
                                                                 'data-pjax' => '0',
                                                          ]
                                                      );                  
                                     ?>
                      </li>   
                       <li>
                                    <?= !Yii::$app->user->isGuest?
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          12. รายงานอัตราการนอนโรงพยาบาลของผู้ป่วย Non-rupture appendicitis ภายใน 3 วัน (ผู้รับผิดชอบ-Ward)',
                                                          ['/pct-sur/kpi61-index12']) : 
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          12. รายงานอัตราการนอนโรงพยาบาลของผู้ป่วย Non-rupture appendicitis ภายใน 3 วัน (ผู้รับผิดชอบ-Ward)',
                                                          ['site/modal'],
                                                          [
                                                                 'class' => 'xmodal',
                                                                 'title' => 'เปิดดูข้อมูล',
                                                                 'data-target' => '#vmodal',
                                                                 'data-pjax' => '0',
                                                          ]
                                                      );                  
                                     ?>
                      </li>   



                      
                      
            </ul>
        </div>
    </div>
<?php
        $this->registerJs("
                       $('.mPop').click(function (){
                              $('#zmodal').modal('show').find('#zmodalContent').load($(this).attr('href'));
                              return false;
                              });                            
                       $('.xmodal').click(function (){
                              $('#vmodal').modal('show').find('#vmodalContent').load($(this).attr('href'));
                              return false;
                              });
                        "     
                      );
?> 
<?php
        Modal::begin([
                              'id' => 'zmodal',
                              'header' => '<h4 class="modal-title">แสดงรายการ</h4>',
                              'size'=>'modal-lg',
                              'footer' => '<a href="#" class="btn btn-primary" data-dismiss="modal">ปิด</a>',
                           ]);
        echo "<div id='zmodalContent'></div>";
        Modal::end();
?> 
 <?php
        Modal::begin([
                              'id' => 'vmodal',
                              'header' => '<h4 class="modal-title">ข้อความเตือน</h4>',
                              'size'=>'modal-lg',
                              'footer' =>  Html::a('SignUp', ['/site/signup'],['class'=>'btn btn-primary']) . 
                                               Html::a('Login', ['/site/login'],['class'=>'btn btn-primary'])                   
                           ]);
        echo "<div id='vmodalContent'></div>";
        Modal::end();
 ?>   
    <div class="margin-bottom-40"></div>    