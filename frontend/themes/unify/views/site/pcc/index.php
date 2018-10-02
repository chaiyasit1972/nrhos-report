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
        <h4 class="pull-left"><?=$sText;?></h4>
        <ul class="pull-right breadcrumb">
            <li><?=Html::a('Home',['/site/index']);?></li>
            <li><?=$sText;?></li>
            <li><?=Html::a($mText,['pcc/index']);;?></li>
        </ul>
    </div>
</div>
<div class="margin-bottom-10"></div>       
<div class="row margin-left-5 margin-right-5">
    <div class="col-md-4">
        <div id="myCarousel" class="carousel slide carousel-v1">
            <div class="carousel-inner">
                <div class="item active">
                    <img src="<?= $baseUrl ?>/assets/img/pcc1.png" alt="">
                </div>
                <div class="item">
                    <img src="<?= $baseUrl ?>/assets/img/pcc2.png" alt="">
                </div>
                <div class="item">
                    <img src="<?= $baseUrl ?>/assets/img/pcc3.png" alt="">
                </div>
                <div class="item">
                    <img src="<?= $baseUrl ?>/assets/img/pcc4.png" alt="">
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
            <div class="headline"><h3><?= $mText; ?></h3></div>
            <div class="margin-bottom-40"></div>                
            <ul class="list-group sidebar-nav-v1 lists-v1" id="sidebar-nav">
                      <li class="list-group-item list-toggle">
                          <a class="btn-u btn-u-green" data-toggle="collapse" data-parent="#sidebar-nav" href="#collapse1">
                             <span class='h5 margin-left-10'>คลิกเลือกรายงาน !!</span>                             
                         </a>   
                             <ul id="collapse1" class="collapse">
                                 <li>
                                    <?= !Yii::$app->user->isGuest?
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          1. รายงานจำนวนประชากร PCC (Type1,Type3) แยกตามสิทธิการรักษาพยาบาล',
                                                          ['/pcc/pcc1-index']) :
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          1. รายงานจำนวนประชากร PCC (Type1,Type3) แยกตามสิทธิการรักษาพยาบาล',
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
                                                          2. รายงานทะเบียนผู้ป่วยโรคเรื้อรัง(NCD) แยก PCC',
                                                          ['/pcc/pcc2-index']) :
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          2. รายงานทะเบียนผู้ป่วยโรคเรื้อรัง(NCD) แยก PCC',
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
                                                          3. รายงานสรุปการให้บริการผู้ป่วย PCC (จำนวนผู้ป่วย,มูลค่าใช้จ่าย,10 อันดับโรคสูงสุด)',
                                                          ['/pcc/pcc3-index']) :
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          3. รายงานสรุปการให้บริการผู้ป่วย PCC (จำนวนผู้ป่วย,มูลค่าใช้จ่าย,10 อันดับโรคสูงสุด)',
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
                                                          4. รายงานร้อยละของผู้ป่วยเบาหวานที่ควบคุมระดับน้ำตาลได้ดี (HbA1c < 7)',
                                                          ['/pcc/pcc4-index']) :
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          4. รายงานร้อยละของผู้ป่วยเบาหวานที่ควบคุมระดับน้ำตาลได้ดี (HbA1c < 7)',
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
                                                          5. รายงานร้อยละของผู้ป่วยเบาหวานที่ได้รับการตรวจไขมัน LDL และมีค่า LDL < 100 mg/dl',
                                                          ['/pcc/pcc5-index']) :
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          5. รายงานร้อยละของผู้ป่วยเบาหวานที่ได้รับการตรวจไขมัน LDL และมีค่า LDL < 100 mg/dl',
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
                                                          6. รายงานร้อยละของผู้ป่วยเบาหวานที่ได้รับการตรวจภาวะแทรกซ้อนทางตา ',
                                                          ['/pcc/pcc6-index']) :
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          6. รายงานร้อยละของผู้ป่วยเบาหวานที่ได้รับการตรวจภาวะแทรกซ้อนทางตา ',
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
                                                          7. รายงานร้อยละของผู้ป่วยเบาหวานที่ได้รับการตรวจภาวะแทรกซ้อนทางเท้า ',
                                                          ['/pcc/pcc7-index']) :
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          7. รายงานร้อยละของผู้ป่วยเบาหวานที่ได้รับการตรวจภาวะแทรกซ้อนทางเท้า ',
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
                                                          8. รายงานร้อยละของผู้ป่วยเบาหวานที่มีความดันโลหิตน้อยกว่า 140/90 mmHg',
                                                          ['/pcc/pcc8-index']) :
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          8. รายงานร้อยละของผู้ป่วยเบาหวานที่มีความดันโลหิตน้อยกว่า 140/90 mmHg',
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
                                                          9. รายงานร้อยละของประชากรอายุ 35 ปีขึ้นไป ได้รับการคัดกรองเบาหวาน',
                                                          ['/pcc/pcc9-index']) :
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          9. รายงานร้อยละของประชากรอายุ 35 ปีขึ้นไป ได้รับการคัดกรองเบาหวาน',
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
                                                          10. รายงานร้อยละของประชากรอายุ 35 ปีขึ้นไป ได้รับการคัดกรองความดันโลหิตสูง',
                                                          ['/pcc/pcc10-index']) :
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          10. รายงานร้อยละของประชากรอายุ 35 ปีขึ้นไป ได้รับการคัดกรองความดันโลหิตสูง',
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
                                                          11. รายงานร้อยละของผู้ป่วยความดันโลหิตสูงที่ควบคุมความดันโลหิตได้ดี',
                                                          ['/pcc/pcc11-index']) :
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          11. รายงานร้อยละของผู้ป่วยความดันโลหิตสูงที่ควบคุมความดันโลหิตได้ดี',
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
<div class="margin-bottom-70"></div>