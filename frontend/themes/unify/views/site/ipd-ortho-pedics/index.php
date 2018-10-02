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
            <li><?=Html::a($mText,['/ipd-ortho-pedics/index']);;?></li>
        </ul>
    </div>
</div>
<div class="margin-bottom-10"></div>       
<div class="row margin-left-5 margin-right-5">
    <div class="col-md-4">
        <div id="myCarousel" class="carousel slide carousel-v1">
            <div class="carousel-inner">
                <div class="item active">
                    <img src="<?= $baseUrl ?>/assets/img/anes1.jpg" alt="">
                </div>               
                <div class="item">
                    <img src="<?= $baseUrl ?>/assets/img/anes2.jpg" alt="">
                </div> 
                <div class="item">
                    <img src="<?= $baseUrl ?>/assets/img/anes3.jpg" alt="">
                </div>   
                <div class="item">
                    <img src="<?= $baseUrl ?>/assets/img/anes4.jpg" alt="">
                </div>   
                <div class="item">
                    <img src="<?= $baseUrl ?>/assets/img/anes5.jpg" alt="">
                </div>                   
                <div class="item">
                    <img src="<?= $baseUrl ?>/assets/img/anes6.jpg" alt="">
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
                                                          1. รายงานยอดผู้ป่วยรับบริการด้วยอาการปวดเข่า(OA Knee) ทั้งหมด',
                                                          ['/ipd-ortho-pedics/index1']) : 
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          1. รายงานยอดผู้ป่วยรับบริการด้วยอาการปวดเข่า(OA Knee) ทั้งหมด',
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
                                                          2. รายงานยอดผู้ป่วยด้วยอาการปวดเข่า(OA Knee) ได้รับการผ่าตัด ทั้งหมด',
                                                          ['/ipd-ortho-pedics/index2']) : 
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          2. รายงานยอดผู้ป่วยด้วยอาการปวดเข่า(OA Knee) ได้รับการผ่าตัด ทั้งหมด',
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
                                                          3. รายงานยอดผู้ป่วยได้รับการผ่าตัดทำ Total Knee Replacement (เฉพาะ อาคาร 4 ชั้น 5)',
                                                          ['/ipd-ortho-pedics/index3']) : 
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          3. รายงานยอดผู้ป่วยได้รับการผ่าตัดทำ Total Knee Replacement (เฉพาะ อาคาร 4 ชั้น 5)',
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
                                                          4. รายงานผู้ป่วย re-admit 28 วัน ด้วยโรคเดิมหลังผ่าตัด Total Knee Replacement (ทั้งหมด)',
                                                          ['/ipd-ortho-pedics/index4']) : 
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          4. รายงานผู้ป่วย re-admit 28 วัน ด้วยโรคเดิมหลังผ่าตัด Total Knee Replacement (ทั้งหมด)',
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
                                                          5. รายงานสรุปผลปริมาณงานผู้ป่วยใน(อาคาร 4 ชั้น 5)',
                                                          ['/ipd-ortho-pedics/index5']) : 
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          5. รายงานสรุปผลปริมาณงานผู้ป่วยใน(อาคาร 4 ชั้น 5)',
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
                                                          6. รายงาน 5 อันดับโรคผู้ป่วยใน(อาคาร 4 ชั้น 5)',
                                                          ['/ipd-ortho-pedics/index6']) : 
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          6. รายงาน 5 อันดับโรคผู้ป่วยใน(อาคาร 4 ชั้น 5)',
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
                                                          7. รายงาน 5 อันดับโรคการตายของผู้ป่วยใน(อาคาร 4 ชั้น 5)',
                                                          ['/ipd-ortho-pedics/index7']) : 
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          7. รายงาน 5 อันดับโรคการตายของผู้ป่วยใน(อาคาร 4 ชั้น 5)',
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
                                                          8. รายงาน 5 อันดับโรคการส่งต่อ(refer-out)ของผู้ป่วยใน(อาคาร 4 ชั้น 5)',
                                                          ['/ipd-ortho-pedics/index8']) : 
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          8. รายงาน 5 อันดับโรคการส่งต่อ(refer-out)ของผู้ป่วยใน(อาคาร 4 ชั้น 5)',
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
                                                          9. รายงานการกลับมารักษา(re-admit) 28 วันของผู้ป่วยใน(อาคาร 4 ชั้น 5)',
                                                          ['/ipd-ortho-pedics/index9']) : 
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          9. รายงานการกลับมารักษา(re-admit) 28 วันของผู้ป่วยใน(อาคาร 4 ชั้น 5)',
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
                                                          10. รายงาน 5 อันดับโรคการกลับมารักษา(re-admit) 28 วันของผู้ป่วยใน(อาคาร 4 ชั้น 5)',
                                                          ['/ipd-ortho-pedics/index10']) : 
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          10. รายงาน 5 อันดับโรคการกลับมารักษา(re-admit) 28 วันของผู้ป่วยใน(อาคาร 4 ชั้น 5)',
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
