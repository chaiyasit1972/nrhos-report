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
            <li><?=Html::a($sText,['#']);;?></li>        
        </ul>
    </div>
</div>
<div class="margin-bottom-10"></div>       
<div class="row margin-left-5 margin-right-5">
    <div class="col-md-4">

        
        <div id="myCarousel" class="carousel slide carousel-v1">
            <div class="carousel-inner">
                <div class="item active">
                    <img src="<?= $baseUrl ?>/assets/img/pharo1.jpg" alt="">
                </div>
                <div class="item">
                    <img src="<?= $baseUrl ?>/assets/img/pharo2.jpg" alt="">
                </div>
                <div class="item">
                    <img src="<?= $baseUrl ?>/assets/img/pharo3.jpg" alt="">
                </div>
                <div class="item">
                    <img src="<?= $baseUrl ?>/assets/img/pharo4.jpg" alt="">
                </div>
                <div class="item">
                    <img src="<?= $baseUrl ?>/assets/img/pharo5.jpg" alt="">
                </div>
                <div class="item">
                    <img src="<?= $baseUrl ?>/assets/img/pharo6.jpg" alt="">
                </div>
                <div class="item">
                    <img src="<?= $baseUrl ?>/assets/img/pharo7.jpg" alt="">
                </div>
                <div class="item">
                    <img src="<?= $baseUrl ?>/assets/img/pharo8.jpg" alt="">
                </div>
                <div class="item">
                    <img src="<?= $baseUrl ?>/assets/img/pharo9.jpg" alt="">
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
                             <span class='h5 margin-left-10'>คลิกเลือกรายงานข้อมูลพื้นฐานทั่วไป !!</span>                             
                         </a>   
                             <ul id="collapse1" class="collapse">
                                 <li>
                                    <?=  !Yii::$app->user->isGuest?
                                             Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          0.0 &nbsp;ปิรามิดประชากรในเขตรับผิดชอบ(บัญชี 1)',
                                                          ['gen/gen-basic0-index']): 
                                             Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          0.0 &nbsp;ปิรามิดประชากรในเขตรับผิดชอบ(บัญชี 1)',
                                                          ['site/modal'],
                                                          [
                                                                 'class' => 'xmodal',
                                                                 'title' => 'เปิดดูข้อมูล',
                                                                 'data-target' => '#vmodal',
                                                                 'data-pjax' => '0',                                                                                                
                                                          ]);
                                    ?>                                        
                               </li>                                    
                                 <li>
                                    <?=  !Yii::$app->user->isGuest?
                                             Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          1.0 &nbsp;รายงานจำนวนประชากรตามทะเบียนราษฎร์และตามสิทธิ์ UC',
                                                          ['gen/gen-basic1-index']): 
                                             Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          1.0 &nbsp;รายงานจำนวนประชากรตามทะเบียนราษฎร์และตามสิทธิ์ UC',
                                                          ['site/modal'],
                                                          [
                                                                 'class' => 'xmodal',
                                                                 'title' => 'เปิดดูข้อมูล',
                                                                 'data-target' => '#vmodal',
                                                                 'data-pjax' => '0',                                                                                                
                                                          ]);
                                    ?>                                        
                               </li>   

                                 <li>
                                            <?=  !Yii::$app->user->isGuest?
                                                                 Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                                1.1 &nbsp;ประชาการในเขตรับผิดชอบ(บัญชี 1) ทั้งหมด',
                                                                                ['basic-gen/basic-gen1']):
                                                                 Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                                1.1 &nbsp;ประชาการในเขตรับผิดชอบ(บัญชี 1) ทั้งหมด',
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
                                                                               1.2 &nbsp;รายชื่อประชากรในเขตรับผิดชอบ(บัญชี 1)',
                                                                                ['basic-gen/basic-gen2']) :
                                                                 Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                               1.2 &nbsp;รายชื่อประชากรในเขตรับผิดชอบ(บัญชี 1)',     
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
                                             <?= !Yii::$app->user->isGuest?
                                                                 Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                               1.3 &nbsp;รายงานเด็กเกิด 5 ปีย้อนหลัง',
                                                                                ['basic-gen/basic-gen3']) : 
                                                                 Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                               1.3 &nbsp;รายงานเด็กเกิด 5 ปีย้อนหลัง',     
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
                                            <?= !Yii::$app->user->isGuest?
                                                                 Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                               1.4 &nbsp;ทะเบียนการเกิด(คลอด)',
                                                                                ['basic-gen/basic-gen4']) :
                                                                 Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                                1.4 &nbsp;ทะเบียนการเกิด(คลอด)',     
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
                                                                                1.5 &nbsp;รายงานสาเหตุการตายสูงสุด(ทั้งหมด/รายโรค)
                                                                                       แยก ใน/นอก รพ. ',
                                                                                ['basic-gen/basic-gen6']) :
                                                                 Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                                1.5 &nbsp;รายงานสาเหตุการตายสูงสุด(ทั้งหมด/รายโรค)
                                                                                       แยก ใน/นอก รพ. ',     
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
                                           <?= !Yii::$app->user->isGuest?
                                                                  Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                                1.6 &nbsp;รายงานการส่งต่อผู้ป่วย(refer-out) ',
                                                                                ['basic-gen/basic-gen7']) :
                                                                 Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                                1.6 &nbsp;รายงานการส่งต่อผู้ป่วย(refer-out) ',     
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
                                             <?= !Yii::$app->user->isGuest?
                                                                 Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                                1.7 &nbsp;รายงานการรับส่งต่อผู้ป่วย(refer-in) ',
                                                                                ['basic-gen/basic-gen8']) :
                                                                 Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                                1.7 &nbsp;รายงานการรับส่งต่อผู้ป่วย(refer-in) ',     
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
                                                                                1.8 &nbsp;รายงานส่งต่อผู้ป่วย(refer out) แยกตามสถานบริการส่งต่อ',
                                                                                ['basic-gen/basic-gen23']) :
                                                                  Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                                1.8 &nbsp;รายงานส่งต่อผู้ป่วย(refer out) แยกตามสถานบริการส่งต่อ',
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
                                             <?= !Yii::$app->user->isGuest?
                                                                  Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                         1.9 &nbsp;รายงานการรับส่งต่อผู้ป่วย(refer in) แยกตามสถานบริการส่งต่อ',
                                                                         ['basic-gen/basic-gen24']) :
                                                                  Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                         1.9 &nbsp;รายงานการรับส่งต่อผู้ป่วย(refer in) แยกตามสถานบริการส่งต่อ',
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
                                             <?= !Yii::$app->user->isGuest?
                                                                  Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                         1.10 &nbsp;รายงานการรับส่งต่อผู้ป่วย(refer out) โรงพยาบาลเครื่อข่าย',
                                                                         ['basic-gen/basic-gen25']) :
                                                                  Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                         1.10 &nbsp;รายงานการรับส่งต่อผู้ป่วย(refer out) โรงพยาบาลเครื่อข่าย',
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
                                             <?= !Yii::$app->user->isGuest?
                                                                  Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                         1.11 &nbsp;รายงานการรับส่งต่อผู้ป่วย(refer in) โรงพยาบาลเครือข่าย',
                                                                         ['basic-gen/basic-gen26']) :
                                                                  Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                         1.11 &nbsp;รายงานการรับส่งต่อผู้ป่วย(refer in) โรงพยาบาลเครือข่าย',
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
                                             <?= !Yii::$app->user->isGuest?
                                                                  Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                         1.12 &nbsp;รายงานการรับส่งต่อผู้ป่วย(refer out) 
                                                                               โรงพยาบาลเครือข่าย ที่มี Adj RW <=0.5',
                                                                         ['basic-gen/basic-gen27']) :
                                                                  Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                         1.12 &nbsp;รายงานการรับส่งต่อผู้ป่วย(refer out) 
                                                                               โรงพยาบาลเครือข่าย ที่มี Adj RW <=0.5',
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
                                             <?= !Yii::$app->user->isGuest?
                                                                  Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                         1.13 &nbsp;รายงานการรับส่งต่อผู้ป่วย(refer in) 
                                                                               โรงพยาบาลเครือข่าย ที่มี Adj RW <=0.5',
                                                                         ['basic-gen/basic-gen28']) :
                                                                  Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                         1.13 &nbsp;รายงานการรับส่งต่อผู้ป่วย(refer in) 
                                                                               โรงพยาบาลเครือข่าย ที่มี Adj RW <=0.5',
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
                                             <?= !Yii::$app->user->isGuest?
                                                                  Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                         1.14 &nbsp;รายงานจำนวนผู้รับบริการ(ในเขตรับผิดชอบ[20 ชุมชน + 14 หมู่]) 
                                                                                แยกตามสิทธิ์การรักษา',
                                                                         ['basic-gen/basic-gen32']) :
                                                                  Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                         1.14 &nbsp;รายงานจำนวนผู้รับบริการ(ในเขตรับผิดชอบ[20 ชุมชน + 14 หมู่]) 
                                                                                แยกตามสิทธิ์การรักษา',
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
                                             <?= !Yii::$app->user->isGuest?
                                                                  Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                         1.15 &nbsp;รายงานจำนวนผู้รับบริการ(ทั้งหมด) แยกตามสิทธิ์การรักษา',
                                                                         ['basic-gen/basic-gen33']) :
                                                                  Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                         1.15 &nbsp;รายงานจำนวนผู้รับบริการ(ทั้งหมด) แยกตามสิทธิ์การรักษา',
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
                                             <?= !Yii::$app->user->isGuest?
                                                                  Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                         1.16 &nbsp;รายงานจำนวนผู้รับบริการ / 5 อันดับโรคแรก แยกตาม PCC',
                                                                         ['gen/gen-basic2-index']) :
                                                                  Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                         1.16 &nbsp;รายงานจำนวนผู้รับบริการ / 5 อันดับโรคแรก แยกตาม PCC',
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
                                             <?= !Yii::$app->user->isGuest?
                                                                  Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                         1.17 &nbsp;รายงานอันดับ(รายการผ่าตัด)ผู้ป่วยในฝ่าตัด',
                                                                         ['gen/gen-basic3-index']) :
                                                                  Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                         1.17 &nbsp;รายงานอันดับ(รายการผ่าตัด)ผู้ป่วยในฝ่าตัด',
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
                                             <?= !Yii::$app->user->isGuest?
                                                                  Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                         1.18 &nbsp;รายงาน 10 อันดับโรคแรกผู้ป่วยในฝ่าตัด',
                                                                         ['gen/gen-basic4-index']) :
                                                                  Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                         1.18 &nbsp;รายงาน 10 อันดับโรคแรกผู้ป่วยในฝ่าตัด',
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
                                             <?= !Yii::$app->user->isGuest?
                                                                  Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                         1.19 &nbsp;รายงานทะเบียนผู้ป่วยโรคเรื้อรังแยกตาม PCCและผล Lab ครั้งสุดท้าย',
                                                                         ['gen/gen-basic5-index']) :
                                                                  Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                         1.19 &nbsp;รายงานทะเบียนผู้ป่วยโรคเรื้อรังแยกตาม PCCและผล Lab ครั้งสุดท้าย',
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
                                             <?= !Yii::$app->user->isGuest?
                                                                  Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                         1.20 &nbsp;รายงานผู้ป่วยโรคเรื้อรังรับบริการแยกตาม PCC',
                                                                         ['gen/gen-basic6-index']) :
                                                                  Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                         1.20 &nbsp;รายงานผู้ป่วยโรคเรื้อรังรับบริการแยกตาม PCC',
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
                                             <?= !Yii::$app->user->isGuest?
                                                                  Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                         1.21 &nbsp;รายงานจำนวนมูลค่ายาของผู้รับบริการแยกตาม PCC',
                                                                         ['gen/gen-basic7-index']) :
                                                                  Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                         1.21 &nbsp;รายงานจำนวนมูลค่ายาของผู้รับบริการแยกตาม PCC',
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
                                             <?= !Yii::$app->user->isGuest?
                                                                  Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                         1.22 &nbsp;รายงานสรุปโรคเรื้อรัง - DM(ผล Lab )  PCC หนองตาหมู่',
                                                                         ['gen/gen-basic8-index']) :
                                                                  Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                         1.22 &nbsp;รายงานสรุปโรคเรื้อรัง - DM(ผล Lab )  PCC หนองตาหมู่',
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
                                             <?= !Yii::$app->user->isGuest?
                                                                  Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                         1.23 &nbsp;รายงานประชากร PCC (Type1,Type3) แยกตามสิทธิการรักษาพยาบาล  ',
                                                                         ['gen/gen-basic9-index']) :
                                                                  Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                         1.23 &nbsp;รายงานประชากร PCC (Type1,Type3) แยกตามสิทธิการรักษาพยาบาล  ',
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
                                             <?= !Yii::$app->user->isGuest?
                                                                  Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                         1.24 &nbsp;รายงานการให้บริการวัคซีน แยกตามกลุ่มบริการ',
                                                                         ['gen/gen-basic10-index']) :
                                                                  Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                         1.24 &nbsp;รายงานการให้บริการวัคซีน แยกตามกลุ่มบริการ',
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
                      <li class="list-group-item list-toggle">
                          <a class="btn-u btn-u-green" data-toggle="collapse" data-parent="#sidebar-nav" href="#collapse2">
                             <span class='h5 margin-left-10'>คลิกเลือกรายงานข้อมูลพื้นฐานผู้ป่วยนอก</span>                             
                         </a>   
                             <ul id="collapse2" class="collapse">
                                 <li>
                                    <?= !Yii::$app->user->isGuest?
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          2.0 รายงานจำนวนผู้ป่วยนอก',
                                                          ['/gen/gen-out1-index']) : 
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          2.0 รายงานจำนวนผู้ป่วยนอก',
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
                                                          2.1 รายงานจำนวนใบสั่งยาผู้ป่วยนอก(OPD)',
                                                          ['/gen/gen-out2-index']) : 
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          2.1 รายงานจำนวนใบสั่งยาผู้ป่วยนอก',
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
                                                          2.2 รายงาน 50 อันดับโรคผู้ป่วยนอก (OPD)',
                                                          ['/gen/gen-out3-index']) : 
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          2.2 รายงาน 50 อันดับโรคผู้ป่วยนอก (OPD)',
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
                                                                               2.3 &nbsp;รายงานจำนวนผู้ป่วยนอก(ยกเว้นงานส่งเสริม)',
                                                                                ['basic-gen/basic-gen5']) :
                                                                 Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                                2.3 &nbsp;รายงานจำนวนผู้ป่วยนอก(ยกเว้นงานส่งเสริม)',     
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
                                                                                2.4 &nbsp;รายงานโรคที่พบบ่อยสุดผู้ป่วยนอก',
                                                                                ['basic-gen/basic-gen10']) :
                                                                 Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                                2.4 &nbsp;รายงานโรคที่พบบ่อยสุดผู้ป่วยนอก',     
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
                                                                                2.5 &nbsp;รายงานจำนวนผู้รับบริการผู้ป่วยนอก(ในเครือข่าย 7 อำเภอ)',
                                                                                ['basic-gen/basic-gen29']) :
                                                                 Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                                2.5 &nbsp;รายงานจำนวนผู้รับบริการผู้ป่วยนอก(เครือข่าย)',
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
                                                                                2.6 &nbsp;รายงานจำนวนผู้รับบริการผู้ป่วยนอก
                                                                                      (ในเขตรับผิดชอบ[20 ชุมชน + 14 หมู่] )',
                                                                                ['basic-gen/basic-gen30']) :
                                                                 Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                                2.6 &nbsp;รายงานจำนวนผู้รับบริการผู้ป่วยนอก
                                                                                      (ในเขตรับผิดชอบ[20 ชุมชน + 14 หมู่] )',
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
                                                                                2.7 &nbsp;รายงานจำนวนผู้รับบริการผู้ป่วยนอก
                                                                                      (ในเขตอำเภอ[ ไม่รวม 20 ชุมชน + 14 หมู่] )',
                                                                                ['basic-gen/basic-gen31']) :
                                                                 Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                                2.7 &nbsp;รายงานจำนวนผู้รับบริการผู้ป่วยนอก
                                                                                      (ในเขตอำเภอ[ ไม่รวม 20 ชุมชน + 14 หมู่] )',
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
                                                                                2.8 &nbsp;รายงานจำนวนผู้รับบริการผู้ป่วยนอก ตรวจโรคทั่วไป(GP) และ ผู้ป่วย DM,HT 
                                                                                      (ในเขตรับผิดชอบ[20 ชุมชน + 14 หมู่] )',
                                                                                ['basic-gen/basic-gen34']) :
                                                                 Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                                2.8 &nbsp;รายงานจำนวนผู้รับบริการผู้ป่วยนอก ตรวจโรคทั่วไป(GP) และ ผู้ป่วย DM,HT 
                                                                                      (ในเขตรับผิดชอบ[20 ชุมชน + 14 หมู่] )',
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
                                                                                2.9 &nbsp;รายงานจำนวนผู้รับบริการผู้ป่วยนอกแยกตามแผนก',
                                                                                ['/gen/gen-out4-index']) : 
                                                                 Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                                2.9 &nbsp;รายงานจำนวนผู้รับบริการผู้ป่วยนอกแยกตามแผนก',
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
                                                                                2.10 &nbsp;รายงานการให้บริการผู้ป่วยนอกในเขตรับผิดชอบ( 14 หมู่ )',
                                                                                ['/gen/gen-out5-index']) : 
                                                                 Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                                2.10 &nbsp;รายงานการให้บริการผู้ป่วยนอกในเขตรับผิดชอบ( 14 หมู่)',
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
                                                                                2.11 &nbsp;รายงานค่าใช้จ่ายการรับบริการผู้ป่วยนอก ',
                                                                                ['/gen/gen-out6-index']) : 
                                                                 Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                                2.11 &nbsp;รายงานค่าใช้จ่ายการรับบริการผู้ป่วยนอก ',
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
                                                                                2.12 &nbsp;รายงานผู้รับบริการคลินิกพิเศษ แยกตามคลินิก(จุดบริการ) ',
                                                                                ['/gen/gen-out7-index']) : 
                                                                 Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                                2.12 &nbsp;รายงานผู้รับบริการคลินิกพิเศษ แยกตามคลินิก(จุดบริการ) ',
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
                      <li class="list-group-item list-toggle">
                          <a class="btn-u btn-u-green" data-toggle="collapse" data-parent="#sidebar-nav" href="#collapse3">
                             <span class='h5 margin-left-10'>คลิกเลือกรายงานข้อมูลพื้นฐานผู้ป่วยใน</span>                             
                         </a>   
                             <ul id="collapse3" class="collapse">
                                    <li>
                                            <?= !Yii::$app->user->isGuest?
                                                                  Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                                3.1 &nbsp;รายงาน 10 อันดับโรคแรกผู้ป่วยใน(แยก first/last diag) ',
                                                                                ['basic-gen/basic-gen11']) : 
                                                                  Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                                3.1 &nbsp;รายงาน 10 อันดับโรคแรกผู้ป่วยใน(แยก first/last diag) ',
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
                                            <?= !Yii::$app->user->isGuest?
                                                                         Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                                3.2 &nbsp;รายงานอัตราการครองเตียง ',
                                                                                ['basic-gen/basic-gen12']) :
                                                                  Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                                3.2 &nbsp;รายงานอัตราการครองเตียง ', 
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
                                                                                3.3 &nbsp;รายงานจำนวนวันนอนเฉลี่ยต่อคนต่อวัน ',
                                                                            ['basic-gen/basic-gen13']) :
                                                                  Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                                3.3 &nbsp;รายงานจำนวนวันนอนเฉลี่ยต่อคนต่อวัน ',
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
                                                                                3.4 &nbsp;รายงานค่าใช้จ่ายสูงสุดรายโรค(ผู้ป่วยใน)',
                                                                                ['basic-gen/basic-gen14']) :
                                                                  Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                                3.4 &nbsp;รายงานค่าใช้จ่ายสูงสุดรายโรค(ผู้ป่วยใน)',
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
                                            <?=   !Yii::$app->user->isGuest?
                                                                  Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                                3.5 &nbsp;รายงานค่าใช้จ่ายสูงสุดรายหัตถการ(ผู้ป่วยใน)',
                                                                                ['basic-gen/basic-gen15']) : 
                                                                  Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                                3.5 &nbsp;รายงานค่าใช้จ่ายสูงสุดรายหัตถการ(ผู้ป่วยใน)',
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
                                            <?= !Yii::$app->user->isGuest?
                                                                  Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                                3.6 &nbsp;รายงานวันนอนสูงสุดรายโรค',
                                                                                ['basic-gen/basic-gen16']) :
                                                                  Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                                3.6 &nbsp;รายงานวันนอนสูงสุดรายโรค',
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
                                            <?=   !Yii::$app->user->isGuest?
                                                                  Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                                3.7 &nbsp;รายงานสรุปรายงานผู้ป่วยใน(แยกตามตึกผู้ป่วย)',
                                                                                ['basic-gen/basic-gen17']) : 
                                                                  Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                                3.7 &nbsp;รายงานสรุปรายงานผู้ป่วยใน(แยกตามตึกผู้ป่วย)',
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
                                            <?= !Yii::$app->user->isGuest?
                                                                  Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                                3.8 &nbsp;รายงานโรคที่พบบ่อยสุด(ผู้ป่วยใน)ทั้งหมด,แยกสาขา/แผนก',
                                                                                ['basic-gen/basic-gen18']) : 
                                                                  Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                                3.8 &nbsp;รายงานโรคที่พบบ่อยสุด(ผู้ป่วยใน)ทั้งหมด,แยกสาขา/แผนก',
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
                                             <?=   !Yii::$app->user->isGuest?
                                                                  Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                                3.9 &nbsp;รายงาน Re admit 28 วัน ',
                                                                                ['basic-gen/basic-gen19']) : 
                                                                  Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                                3.9 &nbsp;รายงาน Re admit 28 วัน ',
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
                                             <?=   !Yii::$app->user->isGuest?
                                                                  Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                                3.10 &nbsp;รายงานดัชนีส่วนผสมผู้ป่วยใน(CMI) ',
                                                                                ['basic-gen/basic-gen20']) : 
                                                                  Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                                3.10 &nbsp;รายงานดัชนีส่วนผสมผู้ป่วยใน(CMI) ',
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
                                                                                3.11 &nbsp;รายงานดัชนีส่วนผสมผู้ป่วยใน(CMI)แยกแผนก',
                                                                                ['basic-gen/basic-gen21']) :
                                                                  Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                                3.11 &nbsp;รายงานดัชนีส่วนผสมผู้ป่วยใน(CMI)แยกแผนก',
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
                                             <?= !Yii::$app->user->isGuest?
                                                                  Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                                3.12 &nbsp;รายงาน 20 กลุ่มโรค(MDC)ตาม DRG ',
                                                                                ['basic-gen/basic-gen22']) : 
                                                                  Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                                3.12 &nbsp;รายงาน 20 กลุ่มโรค(MDC)ตาม DRG ',
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
                                    <?= !Yii::$app->user->isGuest?
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          3.13 รายงานจำนวนผู้ป่วยใน( : วันนอน )',
                                                          ['/gen/gen-in1-index']) : 
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          3.13 รายงานจำนวนผู้ป่วยใน( : วันนอน )',
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
                                                          3.14 รายงาน 50 อันดับโรคผู้ป่วยใน (Last Diag)',
                                                          ['/gen/gen-in2-index']) : 
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          3.14 รายงาน 50 อันดับโรคผู้ป่วยใน (Last Diag)',
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
                                                          3.15 รายงานยอดผู้ป่วยใน (IPD) Admit',
                                                          ['/gen/gen-in3-index']) : 
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          3.15 รายงานยอดผู้ป่วยใน (IPD) Admit',
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
                                                          3.16 รายงาน 50 อันดับโรคแรกที่รับไว้รักษา ผู้ป่วยใน(First Diag)',
                                                          ['/gen/gen-in4-index']) : 
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          3.16 รายงาน 50 อันดับโรคแรกที่รับไว้รักษา ผู้ป่วยใน(First Diag)',
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
                                                          3.17 รายงาน 50 อันดับโรคแรกผู้ป่วยในผ่าตัด(Operations)',
                                                          ['/gen/gen-in5-index']) : 
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          3.17 รายงาน 50 อันดับโรคแรกผู้ป่วยในผ่าตัด(Operations)',
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
                                                          3.18 รายงานจำนวนผู้ป่วยในที่จำหน่ายแต่ละหน่วยงาน',
                                                          ['/gen/gen-in6-index']) : 
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          3.18 รายงานจำนวนผู้ป่วยในที่จำหน่ายแต่ละหน่วยงาน',
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
                                                          3.19 รายงานจำนวนผู้ป่วยในที่จำหน่ายแต่ละแผนก',
                                                          ['/gen/gen-in7-index']) : 
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          3.19 รายงานจำนวนผู้ป่วยในที่จำหน่ายแต่ละแผนก',
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
                                                          3.20 รายงานค่าใช้จ่ายการรับบริการผู้ป่วยใน ',
                                                          ['/gen/gen-in8-index']) : 
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          3.20 รายงานค่าใช้จ่ายการรับบริการผู้ป่วยใน ',
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