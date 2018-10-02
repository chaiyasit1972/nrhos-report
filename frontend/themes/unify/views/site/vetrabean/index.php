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
            <li><?=$sText ;?></li>            
            <li><?=Html::a($mText,['/vetrabean/index']);;?></li>
        </ul>
    </div>
</div>
<div class="margin-bottom-10"></div>       
<div class="row margin-left-5 margin-right-5">
    <div class="col-md-4">
        <div id="myCarousel" class="carousel slide carousel-v1">
            <div class="carousel-inner">
                <div class="item active">
                    <img src="<?= $baseUrl ?>/assets/img/vet3.jpg" alt="">
                </div>
                <div class="item">
                    <img src="<?= $baseUrl ?>/assets/img/vet2.jpg" alt="">
                </div>
                <div class="item">
                    <img src="<?= $baseUrl ?>/assets/img/vet1.jpg" alt="">
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
                          <a class="btn-u btn-u-green" data-toggle="collapse" data-parent="#sidebar-nav" href="#collapse1">
                             <span class='h5 margin-left-10'>คลิกเลือกรายงาน !!</span>                             
                         </a>   
                             <ul id="collapse1" class="collapse">
                                 <li>
                                    <?= !Yii::$app->user->isGuest?
                                                   Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                 1. รายงาน 20 อันดับโรค ผู้ป่วยนอก/ใน (แยก ใน/นอก เขตอำเภอ)',
                                                                  ['/vetrabean1/index']
                                                           ) :
                                                   Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                 1. รายงาน 20 อันดับโรค ผู้ป่วยนอก/ใน (แยก ใน/นอก เขตอำเภอ)',
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
                                    <?=!Yii::$app->user->isGuest?
                                                   Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                 2. รายงาน 20 อันดับโรค ผู้ป่วยนอก/ใน (แยก เทศบาล/อบต.)',
                                                                  ['/vetrabean2/index']) :
                                                   Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                 2. รายงาน 20 อันดับโรค ผู้ป่วยนอก/ใน (แยก เทศบาล/อบต.)',
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
                                    <?=!Yii::$app->user->isGuest?
                                                   Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                 3. รายงานผู้ป่วยที่มารับบริการไม่ได้ลงบัญชี 1',
                                                                  ['/vetrabean/vetrabean3-index']) :
                                                   Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                 3. รายงานผู้ป่วยที่มารับบริการไม่ได้ลงบัญชี 1',
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
                                    <?=!Yii::$app->user->isGuest?
                                                   Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                 4. รายงานสถิติเปรียบเทียบผลการดำเนินการด้านการรักษาพยาบาล ผู้ป่วยนอก',
                                                                  ['/vetrabean/vetrabean4-index']) :
                                                   Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                 4. รายงานสถิติเปรียบเทียบผลการดำเนินการด้านการรักษาพยาบาล ผู้ป่วยนอก',
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
                                    <?=!Yii::$app->user->isGuest?
                                                   Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                 5. รายงานสถิติเปรียบเทียบผลการดำเนินการด้านการรักษาพยาบาล ผู้ป่วยใน',
                                                                  ['/vetrabean/vetrabean5-index']) :
                                                   Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                 5. รายงานสถิติเปรียบเทียบผลการดำเนินการด้านการรักษาพยาบาล ผู้ป่วยใน',
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
                                    <?=!Yii::$app->user->isGuest?
                                                   Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                 6. รายงานสถิติเปรียบเทียบผลการดำเนินการด้านการรักษาพยาบาล ผู้ป่วยอุบัติเหตุและฉุกเฉิน',
                                                                  ['/vetrabean/vetrabean6-index']) :
                                                   Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                 6. รายงานสถิติเปรียบเทียบผลการดำเนินการด้านการรักษาพยาบาล ผู้ป่วยอุบัติเหตุและฉุกเฉิน',
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
                                    <?=!Yii::$app->user->isGuest?
                                                   Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                 7. รายงานสถิติเปรียบเทียบผลการดำเนินการด้านการรักษาพยาบาล ผู้ป่วยคลอด',
                                                                  ['/vetrabean/vetrabean7-index']) :
                                                   Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                 7. รายงานสถิติเปรียบเทียบผลการดำเนินการด้านการรักษาพยาบาล ผู้ป่วยคลอด',
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
                                    <?=!Yii::$app->user->isGuest?
                                                   Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                 8. รายงานสถิติเปรียบเทียบผลการดำเนินการด้านการรักษาพยาบาล อนามัยแม่และเด็ก',
                                                                  ['/vetrabean/vetrabean8-index']) :
                                                   Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                 8. รายงานสถิติเปรียบเทียบผลการดำเนินการด้านการรักษาพยาบาล อนามัยแม่และเด็ก',
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
                                    <?=!Yii::$app->user->isGuest?
                                                   Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                 9. รายงานแสดงจำนวนผู้ป่วยนอกจำแนกตามแผนกการรักษา',
                                                                  ['/vetrabean/vetrabean9-index']) :
                                                   Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                 9. รายงานแสดงจำนวนผู้ป่วยนอกจำแนกตามแผนกการรักษา',
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
                                    <?=!Yii::$app->user->isGuest?
                                                   Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                 10. รายงานแสดงจำนวนผู้ป่วยในจำแนกตามแผนกการรักษา',
                                                                  ['/vetrabean/vetrabean10-index']) :
                                                   Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                 10. รายงานแสดงจำนวนผู้ป่วยในจำแนกตามแผนกการรักษา',
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
                                    <?=!Yii::$app->user->isGuest?
                                                   Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                 11. รายงานสถิติผู้ป่วยนอก - ผู้ป่วยใน จำแนกตามสิทธิการรักษาพยาบาล',
                                                                  ['/vetrabean/vetrabean11-index']) :
                                                   Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                 11. รายงานสถิติผู้ป่วยนอก - ผู้ป่วยใน จำแนกตามสิทธิการรักษาพยาบาล',
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
                                    <?=!Yii::$app->user->isGuest?
                                                   Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                 12. รายงาน 10 อันดับ กลุ่มโรคหลัก(PDX) ผู้ป่วยนอก',
                                                                  ['/vetrabean/vetrabean12-index']) :
                                                   Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                 12. รายงาน 10 อันดับ กลุ่มโรคหลัก(PDX) ผู้ป่วยนอก',
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
                                    <?=!Yii::$app->user->isGuest?
                                                   Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                 13. รายงาน 10 อันดับ กลุ่มโรคหลัก(PDX) ผู้ป่วยใน',
                                                                  ['/vetrabean/vetrabean13-index']) :
                                                   Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                 13. รายงาน 10 อันดับ กลุ่มโรคหลัก(PDX) ผู้ป่วยใน',
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
                                    <?=!Yii::$app->user->isGuest?
                                                   Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                 14. รายงาน 10 อันดับกลุ่มโรค ผู้ป่วยเสียชีวิต',
                                                                  ['/vetrabean/vetrabean14-index']) :
                                                   Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                 14. รายงาน 10 อันดับกลุ่มโรค ผู้ป่วยเสียชีวิต',
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
                                    <?=!Yii::$app->user->isGuest?
                                                   Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                 15. รายงาน 10 อันดับกลุ่มโรคหลัก(PDX)ผู้ป่วยใน แยกตามแผนกการรักษา',
                                                                  ['/vetrabean/vetrabean15-index']) :
                                                   Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                 15. รายงาน 10 อันดับกลุ่มโรคหลัก(PDX)ผู้ป่วยใน แยกตามแผนกการรักษา',
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
                                    <?=!Yii::$app->user->isGuest?
                                                   Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                 16. รายงานสัดส่วนการกระจายของผู้ป่วยตามระดับ Adj.RW',
                                                                  ['/vetrabean/vetrabean16-index']) :
                                                   Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                 16. รายงานสัดส่วนการกระจายของผู้ป่วยตามระดับ Adj.RW',
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
                                    <?=!Yii::$app->user->isGuest?
                                                   Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                 17. รายงานดัชนี Case Mix Index (CMI)',
                                                                  ['/vetrabean/vetrabean17-index']) :
                                                   Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                 17. รายงานดัชนี Case Mix Index (CMI)',
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
                                $('#zmodal').modal('show')
                                .find('#zmodalContent')
                                .load($(this).attr('href'));
                             return false;
                            });
                            
                            $('.xmodal').click(function (){
                                $('#vmodal').modal('show')
                                .find('#vmodalContent')
                                .load($(this).attr('href'));
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