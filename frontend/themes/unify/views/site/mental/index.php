<?php

use yii\helpers\Html;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii2assets\fullscreenmodal\FullscreenModal;
use yii\widgets\Pjax;

$asset = frontend\assets\AppAsset::register($this);
$baseUrl = $asset->baseUrl;

?>

<div class="breadcrumbs">
    <div class="container">
        <h4 class="pull-left"><?=$sText; ?></h4>
        <ul class="pull-right breadcrumb">
            <li><?=Html::a('Home',['/site/index']);?></li>
            <li><?=$sText ; ?></li>            
            <li><?=Html::a($mText,['/mental/index']);;?></li>
        </ul>
    </div>
</div>
<div class="margin-bottom-10"></div>       
<div class="row margin-left-5 margin-right-5">
    <div class="col-md-4">
        <div id="myCarousel" class="carousel slide carousel-v1">
            <div class="carousel-inner">
                <div class="item active">
                    <img src="<?= $baseUrl ?>/assets/img/mental1.jpg" alt="">
                </div>               
                <div class="item">
                    <img src="<?= $baseUrl ?>/assets/img/mental2.jpg" alt="">
                </div>         
            </div>
            <div class="carousel-arrow">
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                    <i class="fa fa-angle-left"></i>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                    <i class="fa fa-angle-right"></i>
                </a>
            </div>
        </div>     
    </div>
    <div class="col-md-8">
        <div class="tag-box tag-box-v3 form-page">
            <div class="headline"><h3><?= $names; ?></h3></div>
            <div class="margin-bottom-40"></div>                
            <ul class="list-group sidebar-nav-v1 lists-v1" id="sidebar-nav">
                      <li class="list-group-item list-toggle">
                          <a class="btn-u btn-u-orange" data-toggle="collapse" data-parent="#sidebar-nav" href="#collapse1">
                             <span class='h5 margin-left-10'>คลิกเลือกรายงาน !!</span>                             
                         </a>   
                             <ul id="collapse1" class="collapse">
                                 <li>
                                    <?= !Yii::$app->user->isGuest?
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          1. รายงานการฆ่าตัวตาย',
                                                          ['/mental/mental1-index']) : 
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          1. รายงานการฆ่าตัวตาย',
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
                                                          2. รายงานซึมเศร้าส่ง รพ.ศรีมหาโพธิ์ 1',
                                                          ['/mental/mental2-index']) : 
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          2. รายงานซึมเศร้าส่ง รพ.ศรีมหาโพธิ์',
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
                                                          3. รายงานผู้ป่วยโรคซึมเศร้า(ICD-10 F32.x, F33.x, F34.1, F38.x และ F39.x)เข้าถึงบริการ',
                                                          ['/mental/mental3-index']) : 
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          3. รายงานผู้ป่วยโรคซึมเศร้า(ICD-10 F32.x, F33.x, F34.1, F38.x และ F39.x)เข้าถึงบริการ',
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
                                                          4. รายงานผู้ป่วยโรคจิตเภท(ICD-10 F200 - F209)เข้าถึงบริการ',
                                                          ['/mental/mental4-index']) : 
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          4. รายงานผู้ป่วยโรคจิตเภท(ICD-10 F200-F209)เข้าถึงบริการ',
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
                                                          5. รายงานผู้ป่วยโรคสมาธิสั้น(ICD-10 F900 - F909)เข้าถึงบริการ',
                                                          ['/mental/mental5-index']) : 
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          5. รายงานผู้ป่วยโรคสมาธิสั้น(ICD-10 F900 - F909)เข้าถึงบริการ',
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
                                                          6. รายงานผู้ป่วยโรคออทิสติก(ICD-10 F840 - F849)เข้าถึงบริการ',
                                                          ['/mental/mental6-index']) : 
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          6. รายงานผู้ป่วยโรคออทิสติก(ICD-10 F840 - F849)เข้าถึงบริการ',
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
                                                          7. รายงานจำนวนผู้ป่วยนอกจิตเวชที่มารับบริการจำแนกรายกลุ่มโรคและสิทธิ์',
                                                          ['/mental/mental7-index']) : 
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          7. รายงานจำนวนผู้ป่วยนอกจิตเวชที่มารับบริการจำแนกรายกลุ่มโรคและสิทธิ์',
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
                                                          8. รายงานจำนวนผู้ป่วยในจิตเวชที่มารับบริการจำแนกรายกลุ่มโรคและสิทธิ์',
                                                          ['/mental/mental8-index']) : 
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          8. รายงานจำนวนผู้ป่วยในจิตเวชที่มารับบริการจำแนกรายกลุ่มโรคและสิทธิ์',
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
                                                          9. รายงานจำนวนผู้รับการบำบัดสารเสพติด',
                                                          ['/mental/mental9-index']) : 
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          9. รายงานจำนวนผู้รับการบำบัดสารเสพติด',
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
                                                          10. รายงานซึมเศร้าส่ง รพ.ศรีมหาโพธิ์ 2',
                                                          ['/mental/mental10-index']) : 
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          10. รายงานซึมเศร้าส่ง รพ.ศรีมหาโพธิ์ 2',
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
                                                          11. รายงานจำนวนผู้ป่วยโรคซึมเศร้า(ICD-10 F32.x, F33.x, F34.1, F38.x และ F39.x) แยกตามที่อยู่',
                                                          ['/mental/mental11-index']) : 
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          11. รายงานจำนวนผู้ป่วยโรคซึมเศร้า(ICD-10 F32.x, F33.x, F34.1, F38.x และ F39.x) แยกตามที่อยู่',
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
                                                          12. รายงานจำนวนผู้ป่วยโรคจิตเภท(ICD-10 F200 - F209) แยกตามที่อยู่',
                                                          ['/mental/mental12-index']) : 
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          12. รายงานจำนวนผู้ป่วยโรคจิตเภท(ICD-10 F200 - F209) แยกตามที่อยู่',
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
                                                          13. รายงานจำนวนผู้ป่วยโรคสมาธิสั้น(ICD-10 F900 - F909) แยกตามที่อยู่',
                                                          ['/mental/mental13-index']) : 
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          13. รายงานจำนวนผู้ป่วยโรคสมาธิสั้น(ICD-10 F900 - F909) แยกตามที่อยู่',
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
                                                          14. รายงานจำนวนผู้ป่วยโรคออทิสติก(ICD-10 F840 - F849) แยกตามที่อยู่',
                                                          ['/mental/mental14-index']) : 
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          14. รายงานจำนวนผู้ป่วยโรคออทิสติก(ICD-10 F840 - F849) แยกตามที่อยู่',
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
                                                          15. รายงานการบำบัดคลินิกอดบุหรี่และการบำบัดคลินิกเลิกสุรา',
                                                          ['/mental/mental15-index']) : 
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          15. รายงานการบำบัดคลินิกอดบุหรี่และการบำบัดคลินิกเลิกสุรา',
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
                                                          16. รายงานการบำบัดคลินิกอดบุหรี่(ICD-10 : F171,F172) ที่สามารถเลิกบุหรี่ได้ตามระยะเวลา',
                                                          ['/mental/mental16-index']) : 
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          16. รายงานการบำบัดคลินิกอดบุหรี่(ICD-10 : F171,F172) ที่สามารถเลิกบุหรี่ได้ตามระยะเวลา',
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
                      </li>                                                                       
            </ul>
        </div>
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
<div class="margin-bottom-50"></div>
