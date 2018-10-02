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
        <h3 class="pull-left"><?=$sText;?></h3>
        <ul class="pull-right breadcrumb">
            <li><?=Html::a('Home',['/site/index']);?></li>
            <li><?=$sText;?></li>
            <li><?=Html::a($mText,['/ncd-clinic/index']);?></li>            
            <li class="active"><?=$names;?></li>
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
                                                          1. รายงานอัตราผู้ป่วยเบาหวานรายใหม่จากกลุ่มเสี่ยงเบาหวาน ',
                                                          ['/ncd-clinic/kpi1-index','year'=>'25'.$select1]) : 
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          1. รายงานอัตราผู้ป่วยเบาหวานรายใหม่จากกลุ่มเสี่ยงเบาหวาน ',
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
                                                          2. รายงานอัตราผู้ป่วยความดันโลหิตสูงรายใหม่จากกลุ่มเสี่ยงและสงสัยป่วยความดันโลหิตสูง ',
                                                          ['/ncd-clinic/kpi2-index','year'=>'25'.$select1]) : 
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          2. รายงานอัตราผู้ป่วยความดันโลหิตสูงรายใหม่จากกลุ่มเสี่ยงและสงสัยป่วยความดันโลหิตสูง ',
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
                                                          3. รายงานร้อยละของผู้ป่วยเบาหวานที่ควบคุมได้',
                                                          ['/ncd-clinic/kpi3-index','year'=>'25'.$select1]) : 
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          3. รายงานร้อยละของผู้ป่วยเบาหวานที่ควบคุมได้',
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
                                                          4. รายงานร้อยละของผู้ป่วยความดันโลหิตสูงที่ควบคุมได้',
                                                          ['/ncd-clinic/kpi4-index','year'=>'25'.$select1]) : 
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          4. รายงานร้อยละของผู้ป่วยความดันโลหิตสูงที่ควบคุมได้',
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
                                                          5. รายงานร้อยละของผู้ป่วยเบาหวานที่ขึ้นทะเบียนได้รับการประเมินโอกาสเสี่ยงต่อโรคหัวใจและหลอดเลือด(CVD Risk)',
                                                          ['/ncd-clinic/kpi5-index','year'=>'25'.$select1]) : 
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          5. รายงานร้อยละของผู้ป่วยเบาหวานที่ขึ้นทะเบียนได้รับการประเมินโอกาสเสี่ยงต่อโรคหัวใจและหลอดเลือด(CVD Risk)',
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
                                                          6. รายงานร้อยละของผู้ป่วยความดันโลหิตสูงที่ขึ้นทะเบียนได้รับการประเมินโอกาสเสี่ยงต่อโรคหัวใจและหลอดเลือด(CVD Risk)',
                                                          ['/ncd-clinic/kpi6-index','year'=>'25'.$select1]) : 
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          6. รายงานร้อยละของผู้ป่วยความดันโลหิตสูงที่ขึ้นทะเบียนได้รับการประเมินโอกาสเสี่ยงต่อโรคหัวใจและหลอดเลือด(CVD Risk)',
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
                                                          7. รายงานอัตราตายของผู้ป่วยโรคหลอดเลือดสมอง(ICD-10 : I60-I69)',
                                                          ['/ncd-clinic/kpi7-index','year'=>'25'.$select1]) : 
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          7. รายงานอัตราตายของผู้ป่วยโรคหลอดเลือดสมอง(ICD-10 : I60-I69)',
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
                                                          8. รายงานอัตราตายของผู้ป่วยโรคหลอดเลือดหัวใจ(ICD-10 : I20-I25)',
                                                          ['/ncd-clinic/kpi8-index','year'=>'25'.$select1]) : 
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          8. รายงานอัตราตายของผู้ป่วยโรคหลอดเลือดหัวใจ(ICD-10 : I20-I25)',
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