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
        <h4 class="pull-left"><?= $mText;?></h4>
        <ul class="pull-right breadcrumb">
            <li><?=Html::a('Home',['/site/index']);?></li>
            <li><?=Html::a($mText,['/ipd-eent/index']);;?></li>
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
                                                          1. รายงาน 10 อันดับโรคผู้ป่วยใน ตา หู คอ จมูก (ทั้งหมด , แยกแผนก)',
                                                          ['/ipd-eent/eent1-index']) : 
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          1. รายงาน 10 อันดับโรคผู้ป่วยใน ตา หู คอ จมูก (ทั้งหมด , แยกแผนก)',
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
                                                          2. รายงานจำนวนผู้ป่วยใน ตา หู คอ จมูก(eent) ทั้งหมด , แยกแผนก',
                                                          ['/ipd-eent/eent2-index']) : 
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          2. รายงานจำนวนผู้ป่วยใน (eent) ทั้งหมด , แยกแผนก',
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
                                                          3. รายงาน Readmit 28 วัน ป่วยใน (eent) ทั้งหมด , แยกตามกลุ่มโรค',
                                                          ['/ipd-eent/eent3-index']) : 
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          3. รายงาน Readmit 28 วัน ป่วยใน (eent) ทั้งหมด',
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
                                                          4. รายงานการส่งต่อ(Refer Out) ป่วยใน ตา หู คอ จมูก(eent)',
                                                          ['/ipd-eent/eent4-index']) : 
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          4. รายงานการส่งต่อ(Refer Out) ป่วยใน ตา หู คอ จมูก(eent)',
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
                                                          5. รายงานผู้ป่วยเสียชีวิต(Dead) ป่วยใน ตา หู คอ จมูก(eent)',
                                                          ['/ipd-eent/eent5-index']) : 
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          5. รายงานผู้ป่วยเสียชีวิต(Dead) ป่วยใน ตา หู คอ จมูก(eent)',
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
                                                          6. รายงานสถานะการจำหน่ายผู้ป่วยใน ตา หู คอ จมูก(eent)',
                                                          ['/ipd-eent/eent6-index']) : 
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          6. รายงานสถานะการจำหน่ายผู้ป่วยใน ตา หู คอ จมูก(eent)',
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
                                                          7. รายงานผู้ป่วยในได้เข้ารับผ่าตัดแผนก หู คอ จมูก ตามชนิดของการผ่าตัด(operation type)',
                                                          ['/ipd-eent/eent7-index']) : 
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          7. รายงานผู้ป่วยในได้เข้ารับผ่าตัดแผนก หู คอ จมูก ตามชนิดของการผ่าตัด(operation type)',
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
                                                          8. รายงานผู้ป่วยใน หู คอ จมูก(eent) ย้ายรักษาที่ ICU',
                                                          ['/ipd-eent/eent8-index']) : 
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          8. รายงานผู้ป่วยใน หู คอ จมูก(eent) ย้ายรักษาที่ ICU',
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
                                                          9. รายงานผู้ป่วยนอก หู คอ จมูก รับบริการ/รับบริการหัตการที่ห้องอุบัติเหตุและฉุกเฉิน',
                                                          ['/ipd-eent/eent9-index']) : 
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          9. รายงานผู้ป่วยนอก หู คอ จมูก รับบริการ/รับบริการหัตการที่ห้องอุบัติเหตุและฉุกเฉิน',
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
                                                          10. รายงานผู้ป่วยนอก หู คอ จมูก ได้รับการตรวจการได้ยิน Routine Hearing Test(Audiogram)',
                                                          ['/ipd-eent/eent10-index']) : 
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          10. รายงานผู้ป่วยนอก หู คอ จมูก ได้รับการตรวจการได้ยิน Routine Hearing Test(Audiogram)',
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
                                                          11. รายงานผู้ป่วยนอก หู คอ จมูก ได้รับเครื่องช่วยฟังสำหรับคนหูพิการ(เด็ก-ผู้ใหญ่)',
                                                          ['/ipd-eent/eent11-index']) : 
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          11. รายงานผู้ป่วยนอก หู คอ จมูก ได้รับเครื่องช่วยฟังสำหรับคนหูพิการ(เด็ก-ผู้ใหญ่)',
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