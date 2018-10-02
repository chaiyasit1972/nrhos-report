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
            <li><?= Html::a('Home', ['/site/index']); ?></li>
            <li><?= Html::a($sText, ['/pct/index6']); ?></li>
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
                            <?=
                            !Yii::$app->user->isGuest ?
                                    Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                                 1 &nbsp; <span> Tonsillectomy</span>', ['pct-eent/index1']) :
                                    Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                                 1 &nbsp;   Tonsillectomy', ['site/modal'], [
                                        'class' => 'xmodal',
                                        'title' => 'เปิดดูข้อมูล',
                                        'data-target' => '#vmodal',
                                        'data-pjax' => '0',
                                            ]
                            );
                            ?>  
                        </li>
                        <li>
                            <?=
                            !Yii::$app->user->isGuest ?
                                    Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                   2 &nbsp; <span> รายงาน 10 อันดับโรค(EENT) ผู้ป่วยนอก ICD10 H60-H95,Z011</span>', ['pct-eent/index2']) :
                                    Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                   2 &nbsp; <span> รายงาน 10 อันดับโรค(EENT) ผู้ป่วยนอก ICD10 H60-H95,Z011</span>', ['site/modal'], [
                                        'class' => 'xmodal',
                                        'title' => 'เปิดดูข้อมูล',
                                        'data-target' => '#vmodal',
                                        'data-pjax' => '0',
                                            ]
                            );
                            ?>  
                        </li> 
                        <li>
<?=
!Yii::$app->user->isGuest ?
        Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                   3 &nbsp; <span> รายงาน 10 อันดับโรค(EENT) ผู้ป่วยใน ICD10 H60-H95</span>', ['pct-eent/index3']) :
        Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                   3 &nbsp; <span> รายงาน 10 อันดับโรค(EENT) ผู้ป่วยใน ICD10 H60-H95</span>', ['site/modal'], [
            'class' => 'xmodal',
            'title' => 'เปิดดูข้อมูล',
            'data-target' => '#vmodal',
            'data-pjax' => '0',
                ]
);
?>  
                        </li>     
                        <li>
                            <?=
                            !Yii::$app->user->isGuest ?
                                    Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                   4 &nbsp; <span> รายงานจำนวนผู้ป่วยด้วยโรค Epistaxis (R040) ผู้ป่วยใน</span>', ['pct-eent/index4']) :
                                    Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                   4 &nbsp; <span> รายงานจำนวนผู้ป่วยด้วยโรค Epistaxis (R040) ผู้ป่วยใน</span>', ['site/modal'], [
                                        'class' => 'xmodal',
                                        'title' => 'เปิดดูข้อมูล',
                                        'data-target' => '#vmodal',
                                        'data-pjax' => '0',
                                            ]
                            );
                            ?>  
                        </li>             
                        <li>
                            <?=
                            !Yii::$app->user->isGuest ?
                                    Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                   5 &nbsp; <span> รายงานจำนวนผู้ป่วยด้วยโรค Tonsillectomy (Icd9 280-289) ผู้ป่วยใน</span>', ['pct-eent/index5']) :
                                    Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                   5 &nbsp; <span> รายงานจำนวนผู้ป่วยด้วยโรค Tonsillectomy (Icd9 280-289) ผู้ป่วยใน</span>', ['site/modal'], [
                                        'class' => 'xmodal',
                                        'title' => 'เปิดดูข้อมูล',
                                        'data-target' => '#vmodal',
                                        'data-pjax' => '0',
                                            ]
                            );
                            ?>  
                        </li>  
                        <li>
                            <?=
                            !Yii::$app->user->isGuest ?
                                    Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                   6 &nbsp; <span> รายงานจำนวนผู้ป่วย(EENT) refer ผู้ป่วยนอก ICD10 H60-H95</span>', ['pct-eent/index6']) :
                                    Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                   6 &nbsp; <span> รายงานจำนวนผู้ป่วย(EENT) refer ผู้ป่วยนอก ICD10 H60-H95</span>', ['site/modal'], [
                                        'class' => 'xmodal',
                                        'title' => 'เปิดดูข้อมูล',
                                        'data-target' => '#vmodal',
                                        'data-pjax' => '0',
                                            ]
                            );
                            ?>  
                        </li>  
                        <li>
                            <?=
                            !Yii::$app->user->isGuest ?
                                    Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                   7 &nbsp; <span> รายงานจำนวนผู้ป่วย(EENT) refer ผู้ป่วยใน ICD10 H60-H95</span>', ['pct-eent/index7']) :
                                    Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                   7 &nbsp; <span> รายงานจำนวนผู้ป่วย(EENT) refer ผู้ป่วยใน ICD10 H60-H95</span>', ['site/modal'], [
                                        'class' => 'xmodal',
                                        'title' => 'เปิดดูข้อมูล',
                                        'data-target' => '#vmodal',
                                        'data-pjax' => '0',
                                            ]
                            );
                            ?>  
                        </li> 
                        <li>
                            <?=
                            !Yii::$app->user->isGuest ?
                                    Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                   8 &nbsp; <span> รายงานรายชื่อผู้ป่วย(EENT) Readmit 28 วัน ICD10 H60-H95</span>', ['pct-eent/index8']) :
                                    Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                   8 &nbsp; <span> รายงานรายชื่อผู้ป่วย(EENT) Readmit 28 วัน ICD10 H60-H95</span>', ['site/modal'], [
                                        'class' => 'xmodal',
                                        'title' => 'เปิดดูข้อมูล',
                                        'data-target' => '#vmodal',
                                        'data-pjax' => '0',
                                            ]
                            );
                            ?>  
                        </li> 
                        <li>
                            <?=
                            !Yii::$app->user->isGuest ?
                                    Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                   9 &nbsp; <span> รายงานจำนวนผู้ป่วย(EENT) Thyroidectomy ICD9 060-069</span>', ['pct-eent/index9']) :
                                    Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                   9 &nbsp; <span> รายงานจำนวนผู้ป่วย(EENT) Thyroidectomy ICD9 060-069</span>', ['site/modal'], [
                                        'class' => 'xmodal',
                                        'title' => 'เปิดดูข้อมูล',
                                        'data-target' => '#vmodal',
                                        'data-pjax' => '0',
                                            ]
                            );
                            ?>  
                        </li> 
                        <li>
                            <?=
                            !Yii::$app->user->isGuest ?
                                    Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                   10 &nbsp; <span> รายงานจำนวนผู้ป่วยกลุ่มโรค Airway Obstruction (ICD10 K122)</span>', ['pct-eent/index10']) :
                                    Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                   10 &nbsp; <span> รายงานจำนวนผู้ป่วยกลุ่มโรค Airway Obstruction (ICD10 K122)</span>', ['site/modal'], [
                                        'class' => 'xmodal',
                                        'title' => 'เปิดดูข้อมูล',
                                        'data-target' => '#vmodal',
                                        'data-pjax' => '0',
                                            ]
                            );
                            ?>  
                        </li> 
                        <li>
                            <?=
                            !Yii::$app->user->isGuest ?
                                    Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                   11 &nbsp; <span> รายงานจำนวนผู้ป่วยกลุ่มโรค Airway Obstruction (ICD10 L024,L020)</span>', ['pct-eent/index11']) :
                                    Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                   11 &nbsp; <span> รายงานจำนวนผู้ป่วยกลุ่มโรค Airway Obstruction (ICD10 L024,L020)</span>', ['site/modal'], [
                                        'class' => 'xmodal',
                                        'title' => 'เปิดดูข้อมูล',
                                        'data-target' => '#vmodal',
                                        'data-pjax' => '0',
                                            ]
                            );
                            ?>  
                        </li> 
                        <li>
                            <?=
                            !Yii::$app->user->isGuest ?
                                    Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                   12 &nbsp; <span> รายงานจำนวนผู้ป่วยกลุ่มโรค Airway Obstruction (ICD10 K140)</span>', ['pct-eent/index12']) :
                                    Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                   12 &nbsp; <span> รายงานจำนวนผู้ป่วยกลุ่มโรค Airway Obstruction (ICD10 K140)</span>', ['site/modal'], [
                                        'class' => 'xmodal',
                                        'title' => 'เปิดดูข้อมูล',
                                        'data-target' => '#vmodal',
                                        'data-pjax' => '0',
                                            ]
                            );
                            ?>  
                        </li> 
                        <li>
                            <?=
                            !Yii::$app->user->isGuest ?
                                    Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                   13 &nbsp; <span> รายงานจำนวนผู้ป่วยกลุ่มโรค Airway Obstruction (ICD10 J988)</span>', ['pct-eent/index13']) :
                                    Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                   13 &nbsp; <span> รายงานจำนวนผู้ป่วยกลุ่มโรค Airway Obstruction (ICD10 J988)</span>', ['site/modal'], [
                                        'class' => 'xmodal',
                                        'title' => 'เปิดดูข้อมูล',
                                        'data-target' => '#vmodal',
                                        'data-pjax' => '0',
                                            ]
                            );
                            ?>  
                        </li> 
                        <li>
                            <?= !Yii::$app->user->isGuest ?
                                    Html::a('<i class="fa fa-arrow-right color-green"></i>
                                            14. &nbsp;  รายงาน 20 อันดับโรค ผู้ป่วยรับส่งต่อ (Refer In)',
                                            ['pct-eent/index14']) :
                                    Html::a('<i class="fa fa-arrow-right color-green"></i>
                                            14. &nbsp;  รายงาน 20 อันดับโรค ผู้ป่วยรับส่งต่อ (Refer In)',
                                            ['site/modal'], [
                                        'class' => 'xmodal',
                                        'title' => 'เปิดดูข้อมูล',
                                        'data-target' => '#vmodal',
                                        'data-pjax' => '0',
                                            ]
                            );
                            ?> 
                        </li>    
                        <li>
                            <?= !Yii::$app->user->isGuest ?
                                    Html::a('<i class="fa fa-arrow-right color-green"></i>
                                            15. &nbsp;  รายงาน 20 อันดับโรค ผู้ป่วยส่งต่อ (Refer Out)',
                                            ['pct-eent/index15']) :
                                    Html::a('<i class="fa fa-arrow-right color-green"></i>
                                            15. &nbsp;  รายงาน 20 อันดับโรค ผู้ป่วยส่งต่อ (Refer Out)',
                                            ['site/modal'], [
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