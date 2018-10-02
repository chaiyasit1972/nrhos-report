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
        <h4 class="pull-left"><?=$mText;?></h4>
        <ul class="pull-right breadcrumb">
            <li><?=Html::a('Home',['/site/index']);?></li>
            <li><?=Html::a($sText,['/quality/index']);;?></li>
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
                                    <?=  !Yii::$app->user->isGuest?
                                             Html::a('<i class="fa fa-arrow-right color-green"></i>
                                               1. &nbsp;รายงานจำนวนผู้รับบริการผู้ป่วยนอก(ในเขตรับผิดชอบ[20 ชุมชน + 14 หมู่] )',
                                                   ['quality/index1']) :
                                             Html::a('<i class="fa fa-arrow-right color-green"></i>
                                               1. &nbsp;รายงานจำนวนผู้รับบริการผู้ป่วยนอก(ในเขตรับผิดชอบ[20 ชุมชน + 14 หมู่] )',
                                                   ['site/modal'],[
                                                                         'class' => 'xmodal',
                                                                         'title' => 'เปิดดูข้อมูล',
                                                                         'data-target' => '#vmodal',
                                                                         'data-pjax' => '0',
                                                                       ]
                                                      );                                                           
                                    ?>
                             </li> 
                             <li>
                                    <?=  !Yii::$app->user->isGuest?
                                             Html::a('<i class="fa fa-arrow-right color-green"></i>
                                               2. &nbsp;รายงานจำนวนผู้รับบริการผู้ป่วยนอก(ในเขตอำเภอ[ ไม่รวม 20 ชุมชน + 14 หมู่] )',
                                                   ['quality/index2']) :
                                             Html::a('<i class="fa fa-arrow-right color-green"></i>
                                               2. &nbsp;รายงานจำนวนผู้รับบริการผู้ป่วยนอก(ในเขตอำเภอ[ ไม่รวม 20 ชุมชน + 14 หมู่] )',
                                                   ['site/modal'],[
                                                                         'class' => 'xmodal',
                                                                         'title' => 'เปิดดูข้อมูล',
                                                                         'data-target' => '#vmodal',
                                                                         'data-pjax' => '0',
                                                                       ]
                                                      );                                                           
                                    ?>
                             </li>                              
                             <li>
                                    <?=  !Yii::$app->user->isGuest?
                                             Html::a('<i class="fa fa-arrow-right color-green"></i>
                                               3. &nbsp;รายงาน 5 อันดับโรค ผู้ป่วยนอก(ในเขตรับผิดชอบ[20 ชุมชน + 14 หมู่]) แยกตามชุมชน/หมู่บ้าน',
                                                   ['quality/index3']) :
                                             Html::a('<i class="fa fa-arrow-right color-green"></i>
                                               3. &nbsp;รายงาน 5 อันดับโรค ผู้ป่วยนอก(ในเขตรับผิดชอบ[20 ชุมชน + 14 หมู่]) แยกตามชุมชน/หมู่บ้าน',
                                                   ['site/modal'],[
                                                                         'class' => 'xmodal',
                                                                         'title' => 'เปิดดูข้อมูล',
                                                                         'data-target' => '#vmodal',
                                                                         'data-pjax' => '0',
                                                                       ]
                                                      );                                                           
                                    ?>
                             </li>                                 
                             <li>
                                    <?=  !Yii::$app->user->isGuest?
                                             Html::a('<i class="fa fa-arrow-right color-green"></i>
                                               4. &nbsp;รายงาน 5 อันดับโรค ผู้ป่วยนอก(ในเขตอำเภอ[ไม่รวม 20 ชุมชน + 14 หมู่]) แยกตามสถานบริการ/ตำบล',
                                                   ['quality/index4']) :
                                             Html::a('<i class="fa fa-arrow-right color-green"></i>
                                               4. &nbsp;รายงาน 5 อันดับโรค ผู้ป่วยนอก(ในเขตอำเภอ[ไม่รวม 20 ชุมชน + 14 หมู่]) แยกตามสถานบริการ/ตำบล',
                                                   ['site/modal'],[
                                                                         'class' => 'xmodal',
                                                                         'title' => 'เปิดดูข้อมูล',
                                                                         'data-target' => '#vmodal',
                                                                         'data-pjax' => '0',
                                                                       ]
                                                      );                                                           
                                    ?>
                             </li>    
                             <li>
                                    <?=  !Yii::$app->user->isGuest?
                                             Html::a('<i class="fa fa-arrow-right color-green"></i>
                                               5. &nbsp;รายงานจำนวนผู้รับบริการผู้ป่วยใน(ในเขตรับผิดชอบ[20 ชุมชน + 14 หมู่] )',
                                                   ['quality/index5']) :
                                             Html::a('<i class="fa fa-arrow-right color-green"></i>
                                               5. &nbsp;รายงานจำนวนผู้รับบริการผู้ป่วยใน(ในเขตรับผิดชอบ[20 ชุมชน + 14 หมู่] )',
                                                   ['site/modal'],[
                                                                         'class' => 'xmodal',
                                                                         'title' => 'เปิดดูข้อมูล',
                                                                         'data-target' => '#vmodal',
                                                                         'data-pjax' => '0',
                                                                       ]
                                                      );                                                           
                                    ?>
                             </li>     
                             <li>
                                    <?=  !Yii::$app->user->isGuest?
                                             Html::a('<i class="fa fa-arrow-right color-green"></i>
                                               6. &nbsp;รายงานจำนวนผู้รับบริการผู้ป่วยใน(ในเขตอำเภอ[ ไม่รวม 20 ชุมชน + 14 หมู่] )',
                                                   ['quality/index6']) :
                                             Html::a('<i class="fa fa-arrow-right color-green"></i>
                                               6. &nbsp;รายงานจำนวนผู้รับบริการผู้ป่วยใน(ในเขตอำเภอ[ ไม่รวม 20 ชุมชน + 14 หมู่] )',
                                                   ['site/modal'],[
                                                                         'class' => 'xmodal',
                                                                         'title' => 'เปิดดูข้อมูล',
                                                                         'data-target' => '#vmodal',
                                                                         'data-pjax' => '0',
                                                                       ]
                                                      );                                                           
                                    ?>
                             </li> 
                             <li>
                                    <?=  !Yii::$app->user->isGuest?
                                             Html::a('<i class="fa fa-arrow-right color-green"></i>
                                               7. &nbsp;รายงาน 5 อันดับโรค ผู้ป่วยใน(ในเขตรับผิดชอบ[20 ชุมชน + 14 หมู่]) แยกตามชุมชน/หมู่บ้าน',
                                                   ['quality/index7']) :
                                             Html::a('<i class="fa fa-arrow-right color-green"></i>
                                               7. &nbsp;รายงาน 5 อันดับโรค ผู้ป่วยใน(ในเขตรับผิดชอบ[20 ชุมชน + 14 หมู่]) แยกตามชุมชน/หมู่บ้าน',
                                                   ['site/modal'],[
                                                                         'class' => 'xmodal',
                                                                         'title' => 'เปิดดูข้อมูล',
                                                                         'data-target' => '#vmodal',
                                                                         'data-pjax' => '0',
                                                                       ]
                                                      );                                                           
                                    ?>
                             </li>     
                             <li>
                                    <?=  !Yii::$app->user->isGuest?
                                             Html::a('<i class="fa fa-arrow-right color-green"></i>
                                               8. &nbsp;รายงาน 5 อันดับโรค ผู้ป่วยใน(ในเขตอำเภอ[ไม่รวม 20 ชุมชน + 14 หมู่]) แยกตามสถานบริการ/ตำบล',
                                                   ['quality/index8']) :
                                             Html::a('<i class="fa fa-arrow-right color-green"></i>
                                               8. &nbsp;รายงาน 5 อันดับโรค ผู้ป่วยใน(ในเขตอำเภอ[ไม่รวม 20 ชุมชน + 14 หมู่]) แยกตามสถานบริการ/ตำบล',
                                                   ['site/modal'],[
                                                                         'class' => 'xmodal',
                                                                         'title' => 'เปิดดูข้อมูล',
                                                                         'data-target' => '#vmodal',
                                                                         'data-pjax' => '0',
                                                                       ]
                                                      );                                                           
                                    ?>
                             </li>  
                             <li>
                                    <?=  !Yii::$app->user->isGuest?
                                             Html::a('<i class="fa fa-arrow-right color-green"></i>
                                               9. &nbsp;รายงานจำนวนผู้ป่วยนอกทั้งหมด(ทุกแผนกยกเว้นงานส่งเสริมสุขภาพ)  ',
                                                   ['quality/index9']) :
                                             Html::a('<i class="fa fa-arrow-right color-green"></i>
                                               9. &nbsp;รายงานจำนวนผู้ป่วยนอกทั้งหมด(ทุกแผนกยกเว้นงานส่งเสริมสุขภาพ)  ',
                                                   ['site/modal'],[
                                                                         'class' => 'xmodal',
                                                                         'title' => 'เปิดดูข้อมูล',
                                                                         'data-target' => '#vmodal',
                                                                         'data-pjax' => '0',
                                                                       ]
                                                      );                                                           
                                    ?>
                             </li>   
                             <li>
                                    <?=  !Yii::$app->user->isGuest?
                                             Html::a('<i class="fa fa-arrow-right color-green"></i>
                                               10. &nbsp;รายงานจำนวนผู้ป่วยนอก(ทุกแผนกยกเว้นงานส่งเสริมสุขภาพ) เฉพาะผู้ป่วยที่อาศัยอยู่อำเภอนางรอง(ไม่รวม 20 ชุมชน + 14 หมู่)',
                                                   ['quality/index10']) :
                                             Html::a('<i class="fa fa-arrow-right color-green"></i>
                                               10. &nbsp;รายงานจำนวนผู้ป่วยนอก(ทุกแผนกยกเว้นงานส่งเสริมสุขภาพ) เฉพาะผู้ป่วยที่อาศัยอยู่อำเภอนางรอง(ไม่รวม 20 ชุมชน + 14 หมู่)',
                                                   ['site/modal'],[
                                                                         'class' => 'xmodal',
                                                                         'title' => 'เปิดดูข้อมูล',
                                                                         'data-target' => '#vmodal',
                                                                         'data-pjax' => '0',
                                                                       ]
                                                      );                                                           
                                    ?>
                             </li>   
                             <li>
                                    <?=  !Yii::$app->user->isGuest?
                                             Html::a('<i class="fa fa-arrow-right color-green"></i>
                                               11. &nbsp;รายงานจำนวนผู้ป่วยนอก(ทุกแผนกยกเว้นงานส่งเสริมสุขภาพ) เฉพาะผู้ป่วยที่อาศัยอยู่ตำบลนางรอง(20 ชุมชน + 14 หมู่)',
                                                   ['quality/index11']) :
                                             Html::a('<i class="fa fa-arrow-right color-green"></i>
                                               11. &nbsp;รายงานจำนวนผู้ป่วยนอก(ทุกแผนกยกเว้นงานส่งเสริมสุขภาพ) เฉพาะผู้ป่วยที่อาศัยอยู่ตำบลนางรอง(20 ชุมชน + 14 หมู่)',
                                                   ['site/modal'],[
                                                                         'class' => 'xmodal',
                                                                         'title' => 'เปิดดูข้อมูล',
                                                                         'data-target' => '#vmodal',
                                                                         'data-pjax' => '0',
                                                                       ]
                                                      );                                                           
                                    ?>
                             </li>   
                             <li>
                                    <?=  !Yii::$app->user->isGuest?
                                             Html::a('<i class="fa fa-arrow-right color-green"></i>
                                               12. &nbsp;รายงานจำนวนผู้มารับบริการอุบัติเหตุฉุกเฉิน(ER) ทั้งหมด แยก รับ refer และ มาเอง',
                                                   ['quality/index12']) :
                                             Html::a('<i class="fa fa-arrow-right color-green"></i>
                                               12. &nbsp;รายงานจำนวนผู้มารับบริการอุบัติเหตุฉุกเฉิน(ER) ทั้งหมด แยก รับ refer และ มาเอง',
                                                   ['site/modal'],[
                                                                         'class' => 'xmodal',
                                                                         'title' => 'เปิดดูข้อมูล',
                                                                         'data-target' => '#vmodal',
                                                                         'data-pjax' => '0',
                                                                       ]
                                                      );                                                           
                                    ?>
                             </li>   
                             <li>
                                    <?=  !Yii::$app->user->isGuest?
                                             Html::a('<i class="fa fa-arrow-right color-green"></i>
                                               13. &nbsp;รายงานจำนวนผู้ป่วยในทั้งหมด แยกตามแผนก',
                                                   ['quality/index13']) :
                                             Html::a('<i class="fa fa-arrow-right color-green"></i>
                                               13. &nbsp;รายงานจำนวนผู้ป่วยในทั้งหมด แยกตามแผนก',
                                                   ['site/modal'],[
                                                                         'class' => 'xmodal',
                                                                         'title' => 'เปิดดูข้อมูล',
                                                                         'data-target' => '#vmodal',
                                                                         'data-pjax' => '0',
                                                                       ]
                                                      );                                                           
                                    ?>
                             </li> 
                             <li>
                                    <?=  !Yii::$app->user->isGuest?
                                             Html::a('<i class="fa fa-arrow-right color-green"></i>
                                               14. &nbsp;รายงานอัตราการครองเตียง',
                                                   ['quality/index14']) :
                                             Html::a('<i class="fa fa-arrow-right color-green"></i>
                                               14. &nbsp;รายงานอัตราการครองเตียง',
                                                   ['site/modal'],[
                                                                         'class' => 'xmodal',
                                                                         'title' => 'เปิดดูข้อมูล',
                                                                         'data-target' => '#vmodal',
                                                                         'data-pjax' => '0',
                                                                       ]
                                                      );                                                           
                                    ?>
                             </li> 
                             <li>
                                    <?=  !Yii::$app->user->isGuest?
                                             Html::a('<i class="fa fa-arrow-right color-green"></i>
                                               15. &nbsp;รายงานรับการส่งต่อ(refer in) ที่มีค่า RW <= 0.5 โรงพยาบาลเครือข่าย',
                                                   ['quality/index15']) :
                                             Html::a('<i class="fa fa-arrow-right color-green"></i>
                                               15. &nbsp;รายงานรับการส่งต่อ(refer in) ที่มีค่า RW <= 0.5 โรงพยาบาลเครือข่าย',
                                                   ['site/modal'],[
                                                                         'class' => 'xmodal',
                                                                         'title' => 'เปิดดูข้อมูล',
                                                                         'data-target' => '#vmodal',
                                                                         'data-pjax' => '0',
                                                                       ]
                                                      );                                                           
                                    ?>
                             </li> 
                             <li>
                                    <?=  !Yii::$app->user->isGuest?
                                             Html::a('<i class="fa fa-arrow-right color-green"></i>
                                               16. &nbsp;รายงานการส่งต่อ(refer out) ที่มีค่า RW <= 0.5 โรงพยาบาลแม่ข่าย',
                                                   ['quality/index16']) :
                                             Html::a('<i class="fa fa-arrow-right color-green"></i>
                                               16. &nbsp;รายงานการส่งต่อ(refer out) ที่มีค่า RW <= 0.5 โรงพยาบาลแม่ข่าย',
                                                   ['site/modal'],[
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
    'size' => 'modal-lg',
    'footer' => '<a href="#" class="btn btn-primary" data-dismiss="modal">ปิด</a>',
]);
echo "<div id='zmodalContent'></div>";
Modal::end();
?> 
<?php
Modal::begin([
    'id' => 'vmodal',
    'header' => '<h4 class="modal-title">ข้อความเตือน</h4>',
    'size' => 'modal-lg',
    'footer' => Html::a('SignUp', ['/site/signup'], ['class' => 'btn btn-primary']) .
    Html::a('Login', ['/site/login'], ['class' => 'btn btn-primary'])
]);

echo "<div id='vmodalContent'></div>";

Modal::end();
?>  
<div class="margin-bottom-40"></div>