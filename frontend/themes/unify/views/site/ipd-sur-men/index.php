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
            <li><?=Html::a($mText,['/ipd-sur-men/index']);;?></li>
        </ul>
    </div>
</div>
<div class="margin-bottom-10"></div>       
<div class="row margin-left-5 margin-right-5">
    <div class="col-md-4">
       <div id="myCarousel" class="carousel slide carousel-v1">
            <div class="carousel-inner">
                <div class="item active">
                    <img src="<?= $baseUrl ?>/assets/img/ortho-gen1.jpeg" alt="">
                </div>
                <div class="item">
                    <img src="<?= $baseUrl ?>/assets/img/ortho-gen2.jpeg" alt="">
                </div>      
                <div class="item">
                    <img src="<?= $baseUrl ?>/assets/img/ortho-gen3.jpg" alt="">
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

                <!-- Buttons UI -->
                <li class="list-group-item list-toggle">
                    <a class="btn-u btn-u-orange" data-toggle="collapse" data-parent="#sidebar-nav" href="#collapse1">1. คลิกเลือกรายงานทั่วไป !!</a>
                    <ul id="collapse1" class="collapse">          
                        <li>
                             <?= !Yii::$app->user->isGuest?
                                                          Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                         1.1 รายงานผู้ป่วยเด็กอายุต่ำกว่า 14 ปี Admit ที่ตึกศัลยกรรม(อาคาร 4 ชั้น 3)',
                                                                         ['ipd-sur-men/ipd1-index'])  :
                                                          Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                         1.1 รายงานผู้ป่วยเด็กอายุต่ำกว่า 14 ปี Admit ที่ตึกศัลยกรรม(อาคาร 4 ชั้น 3)',
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
                                                                         1.2 รายงานส่งต่อผู้ป่วย(refer-out)',
                                                                         ['ipd-sur-men/ipd2-index'])  :
                                                          Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                         1.2 รายงานส่งต่อผู้ป่วย(refer-out)',
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
                                                                         1.3 รายงานส่งต่อผู้ป่วย(refer-out) ทีมีค่า Adjrw < 0.5',
                                                                         ['ipd-sur-men/ipd3-index'])  :
                                                          Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                         1.3 รายงานส่งต่อผู้ป่วย(refer-out) ทีมีค่า Adjrw < 0.5',
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
                                                                         1.4 รายงานการรับ การส่งต่อผู้ป่วย(refer-in)',
                                                                         ['ipd-sur-men/ipd4-index'])  :
                                                          Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                         1.4 รายงานการรับ การส่งต่อผู้ป่วย(refer-in)',
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
                                                                         1.5 รายงานสาเหตุการตาย(ตามรหัสโรค ICD-10)',
                                                                         ['ipd-sur-men/ipd5-index'])  :
                                                          Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                         1.5 รายงานสาเหตุการตาย(ตามรหัสโรค ICD-10)',
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
                                                                         1.6 รายงาน 5 อันดับโรคผู้ป่วยศัลยกรรมชาย',
                                                                         ['ipd-sur-men/ipd6-index'])  :
                                                          Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                         1.6 รายงาน 5 อันดับโรค',
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
                                                                         1.7 รายงานผู้รับบริการผ่าตัด',
                                                                         ['ipd-sur-men/ipd7-index'])  :
                                                          Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                         1.7 รายงานผู้รับบริการผ่าตัด',
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

                <li class="list-group-item list-toggle">
                    <a class="btn-u btn-u-orange" data-toggle="collapse" data-parent="#sidebar-nav" href="#collapse2">2. คลิกเลือกรายงานตัวชี้วัด / service-plan !!</a>
                    <ul id="collapse2" class="collapse">          
                        <li>
                             <?= !Yii::$app->user->isGuest?
                                                          Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                         2.1 รายงานอัตราไส้ติ่งแตกในผู้ป่วยไส้ติ่งอักเสบ',
                                                                         ['ipd-sur-men/kpi1-index'])  :
                                                          Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                         2.1 รายงานอัตราไส้ติ่งแตกในผู้ป่วยไส้ติ่งอักเสบ',
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
                                                                         2.2 รายงานร้อยละของผู้ที่เสียชีวิตภายใน รพ. ของภาวะขาดเลือดที่ขาหรือแขน',
                                                                         ['ipd-sur-men/kpi2-index'])  :
                                                          Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                         2.2 รายงานร้อยละของผู้ที่เสียชีวิตภายใน รพ. ของภาวะขาดเลือดที่ขาหรือแขน',
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
                                                                         2.3 รายงานอัตราการเสียชีวิตของผู้ป่วย UGIB(ICD-10 : K922)',
                                                                         ['ipd-sur-men/kpi3-index'])  :
                                                          Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                         2.3 รายงานอัตราการเสียชีวิตของผู้ป่วย UGIB(ICD-10 : K922)',
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
                                                                         2.4 รายงานอัตราการเสียชีวิตของผู้ป่วย NF(ICD-10 : M726)',
                                                                         ['ipd-sur-men/kpi4-index'])  :
                                                          Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                         2.4 รายงานอัตราการเสียชีวิตของผู้ป่วย NF(ICD-10 : M726)',
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
        <!-- End Standard Form Controls -->
    </div>
    <!-- End Content -->
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