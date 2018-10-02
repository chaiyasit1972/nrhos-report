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
        <h4 class="pull-left"><?= $sText;?></h4>
        <ul class="pull-right breadcrumb">
            <li><?=Html::a('Home',['/site/index']);?></li>
            <li><?=Html::a($mText,['/er/index']);;?></li>
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
                                                          1. รายงานอัตราการเสียชีวิตผู้เจ็บป่วยวิกฤตฉุกเฉินภายใน 24 ชั่วโมง (< 12 %) ',
                                                          ['/er/kpi61-index1']) : 
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          1. รายงานอัตราการเสียชีวิตผู้เจ็บป่วยวิกฤตฉุกเฉินภายใน 24 ชั่วโมง (< 12 %) ',
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
                                                          2. รายงานร้อยละของผู้เจ็บป่วยวิกฤตฉุกเฉินมาโดย EMS',
                                                          ['/er/kpi61-index2']) : 
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          2. รายงานร้อยละของผู้เจ็บป่วยวิกฤตฉุกเฉินมาโดย EMS',
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
                                                          3. รายงานอัตราการเสียชีวิตของผู้ป่วย Severe Trauma Brain Injury(Glasgow Coma Score 3 - 8)',
                                                          ['/er/kpi61-index3']) : 
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          3. รายงานอัตราการเสียชีวิตของผู้ป่วย Severe Trauma Brain Injury(Glasgow Coma Score 3 - 8)',
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
                                                          4. รายงานอัตราการเสียชีวิตของผู้ป่วย Moderate Trauma Brain Injury(Glasgow Coma Score 9 - 12)',
                                                          ['/er/kpi61-index4']) : 
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          4. รายงานอัตราการเสียชีวิตของผู้ป่วย Moderate Trauma Brain Injury(Glasgow Coma Score 9 - 12)',
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
                                                          5. รายงานอัตราการเสียชีวิตของผู้ป่วย Mild Trauma Brain Injury(Glasgow Coma Score 13 - 15)',
                                                          ['/er/kpi61-index5']) : 
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          5. รายงานอัตราการเสียชีวิตของผู้ป่วย Mild Trauma Brain Injury(Glasgow Coma Score 13 - 15)',
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
                                                          6. รายงานผู้ป่วย Trauma / Non Trauma',
                                                          ['/er/kpi61-index6']) : 
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          6. รายงานผู้ป่วย Trauma / Non Trauma',
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
                                                          7. อัตราการรอดชีวิตของผู้ป่วย OHCA',
                                                          ['/er/kpi61-index7']) : 
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          7. อัตราการรอดชีวิตของผู้ป่วย OHCA',
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
                                                          8. ร้อยละผู้ป่วยของ รพ. ระดับ A,S ที่มีชีวิตรอดจนถึงรับไว้ใน รพ. (Survival to Hospital Admission)',
                                                          ['/er/kpi61-index8']) : 
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          8. ร้อยละผู้ป่วยของ รพ. ระดับ A,S ที่มีชีวิตรอดจนถึงรับไว้ใน รพ. (Survival to Hospital Admission)',
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
                                                          9. ร้อยละผู้ป่วยของ รพ. ระดับ F2,M1,M2 ที่มีชีวิตรอดจนถึงการนำส่ง (Survival to Refer)',
                                                          ['/er/kpi61-index9']) : 
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          9. ร้อยละผู้ป่วยของ รพ. ระดับ F2,M1,M2 ที่มีชีวิตรอดจนถึงการนำส่ง (Survival to Refer)',
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
                                                          10. ร้อยละการส่งต่อผู้ป่วย(นอกเขตสุขภาพ) ลดลง',
                                                          ['/er/kpi61-index10']) : 
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          10. ร้อยละการส่งต่อผู้ป่วย(นอกเขตสุขภาพ) ลดลง',
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