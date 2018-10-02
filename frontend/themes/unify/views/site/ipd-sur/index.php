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
        <h4 class="pull-left">งานผู้ป่วยใน</h4>
        <ul class="pull-right breadcrumb">
            <li><?=Html::a('Home',['/site/index']);?></li>
            <li><?=Html::a($mText,['/ipd-sur/index']);;?></li>
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
                <!-- Typography -->
                <li class="list-group-item list-toggle">
                    <a data-toggle="collapse" data-parent="#sidebar-nav" href="#collapse1">1. งานศัลยกรรมทั่วไปทั่วไป-หญิง (ผู้ป่วยนอก) </a>
                    <ul id="collapse1" class="collapse">
                        <li>
                             <?= !Yii::$app->user->isGuest?
                                                          Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                         1.1 รายงานยอดผู้ป่วยนอกแผนกศัลยกรรมทั่วไป',
                                                                         ['ipd-sur-opd/opd1-index'])  :
                                                          Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                         1.1 รายงานยอดผู้ป่วยนอกแผนกศัลยกรรมทั่วไป ',
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
                                                                         1.2 รายงานยอดผู้เสียชีวิตผู้ป่วยนอกแผนกศัลยกรรมทั่วไป',
                                                                         ['ipd-sur-opd/opd2-index'])  :
                                                          Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                          1.2 รายงานยอดผู้เสียชีวิตผู้ป่วยนอกแผนกศัลยกรรมทั่วไป',
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
                                                                         1.3 รายงานการส่งต่อ(Refer-out)ผู้ป่วยนอกแผนกศัลยกรรมทั่วไป',
                                                                         ['ipd-sur-opd/opd3-index'])  :
                                                          Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                         1.3 รายงานการส่งต่อ(Refer-out)ผู้ป่วยนอกแผนกศัลยกรรมทั่วไป',
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
                                                                         1.4 รายงานการรับส่งต่อ(Refer-in)ผู้ป่วยนอกแผนกศัลยกรรมทั่วไป',
                                                                         ['ipd-sur-opd/opd4-index'])  :
                                                          Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                         1.4 รายงานการรับส่งต่อ(Refer-in)ผู้ป่วยนอกแผนกศัลยกรรมทั่วไป',
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
                <!-- End Typography -->

                <!-- Buttons UI -->
                <li class="list-group-item list-toggle">
                    <a data-toggle="collapse" data-parent="#sidebar-nav" href="#collapse2">2. งานศัลยกรรมทั่วไป-หญิง (ผู้ป่วยใน)</a>
                    <ul id="collapse2" class="collapse">
                        <li>
                             <?= !Yii::$app->user->isGuest?
                                                           Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                         2.1 รายงานยอดผู้ป่วยในแผนกศัลยกรรมทั่วไป',
                                                                         ['ipd-sur-ipd/ipd1-index']) :
                                                          Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                         2.1 รายงานยอดผู้ป่วยในแผนกศัลยกรรมทั่วไป',
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
                                                                         2.2 รายงานยอดผู้เสียชีวิตผู้ป่วยในแผนกศัลยกรรมทั่วไป',
                                                                         ['ipd-sur-ipd/ipd2-index'])  :
                                                          Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                          2.2 รายงานยอดผู้เสียชีวิตผู้ป่วยในแผนกศัลยกรรมทั่วไป',
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
                                                                         2.3 รายงานการส่งต่อ(Refer-out)ผู้ป่วยในแผนกศัลยกรรมทั่วไป',
                                                                         ['ipd-sur-ipd/ipd3-index'])  :
                                                          Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                         2.3 รายงานการส่งต่อ(Refer-out)ผู้ป่วยในแผนกศัลยกรรมทั่วไป',
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
                                                                         2.4 รายงานการรับส่งต่อ(Refer-in)ผู้ป่วยในแผนกศัลยกรรมทั่วไป',
                                                                         ['ipd-sur-ipd/ipd4-index'])  :
                                                          Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                         2.4 รายงานการรับส่งต่อ(Refer-in)ผู้ป่วยในแผนกศัลยกรรมทั่วไป',
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
                                                                         2.5 รายงานผู้ป่วยเด็กอายุต่ำกว่า 14 ปี Admit ที่ตึกศัลยกรรม(อาคาร 4 ชั้น 2)',
                                                                         ['ipd-sur-ipd/ipd5-index'])  :
                                                          Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                         2.5 รายงานผู้ป่วยเด็กอายุต่ำกว่า 14 ปี Admit ที่ตึกศัลยกรรม(อาคาร 4 ชั้น 2)',
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
                                                                         2.6 รายงาน 10 อันดับ โรคผู้ป่วยศัลยกรรมหญิง(อาคาร 4 ชั้น 2)',
                                                                         ['ipd-sur-ipd/ipd6-index'])  :
                                                          Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                         2.6 รายงาน 10 อันดับ โรคผู้ป่วยศัลยกรรมหญิง(อาคาร 4 ชั้น 2)',
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
                                                                         2.7 รายงาน Re-Admit 28 วัน ผู้ป่วยศัลยกรรมหญิง(อาคาร 4 ชั้น 2)',
                                                                         ['ipd-sur-ipd/ipd7-index'])  :
                                                          Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                         2.7 รายงาน Re-Admit 28 วัน ผู้ป่วยศัลยกรรมหญิง(อาคาร 4 ชั้น 2)',
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
                <!-- End Buttons UI -->
                <li class="list-group-item list-toggle">
                    <a class="accordion-toggle" href="#collapse4" data-toggle="collapse">3. งานศัลยกรรมทั่วไปทั่วไป-หญิง (PCT-โรคที่สนใจ)</a>
                    <ul id="collapse4" class="collapse">
                        <li>
                            <?= !Yii::$app->user->isGuest ?
                                                          Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                         3.1 &nbsp;   NF',
                                                                         ['ipd-sur-pct/pct1-index']) :
                                                          Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                         3.1 &nbsp;   NF',
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
                            <?= !Yii::$app->user->isGuest ?
                                                          Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                         3.2 &nbsp;   Appendicitis (ICD10=K352,Last Dx)(K353,K358 First Dx นับซ้ำ)',
                                                                         ['ipd-sur-pct/pct2-index']) :
                                                          Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                         3.2 &nbsp;   Appendicitis',
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
                            <?= !Yii::$app->user->isGuest ?
                                                          Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                         3.3 &nbsp;   EGD/Colonoscope/Hernioraphy/Wipple Operation',
                                                                         ['ipd-sur-pct/pct3-index']) :
                                                          Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                         3.3 &nbsp;   EGD/Colonoscope/Hernioraphy/Wipple Operation',
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
                            <?= !Yii::$app->user->isGuest ?
                                                          Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                         3.4 &nbsp;   UGI Bleeding',
                                                                         ['ipd-sur-pct/pct4-index']) :
                                                          Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                         3.4 &nbsp;   UGI Bleeding',
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
                            <?= !Yii::$app->user->isGuest ?
                                                          Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                         3.5 &nbsp;   จำนวนผู้ป่วยในทุกกลุ่มอายุที่เสียชีวิตจากการวินิจฉัยหลัก PDx 5 ภาวะ',
                                                                         ['ipd-sur-pct/pct5-index']) :
                                                          Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                         3.5 &nbsp;   จำนวนผู้ป่วยในทุกกลุ่มอายุที่เสียชีวิตจากการวินิจฉัยหลัก PDx 5 ภาวะ',
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
                            <?= !Yii::$app->user->isGuest ?
                                                          Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                         3.6 &nbsp;    จำนวนผู้ป่วยที่มีภาวะขาดเลือดที่แขน หรือขา (ICD10=I74.0-I74.9 และ I70.2)',
                                                                         ['ipd-sur-pct/pct6-index']) :
                                                          Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                         3.6 &nbsp;   จำนวนผู้ป่วยที่มีภาวะขาดเลือดที่แขน หรือขา (ICD10=I74.0-I74.9 และ I70.2)',
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
                            <?= !Yii::$app->user->isGuest ?
                                                          Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                         3.7 &nbsp;    จำนวนผู้ป่วยที่มีภาวะขาดเลือดที่ขา และถูกตัดขาตั้งแต่เหนือข้อเท้าขึ้นมา ในการนอนรพ.ครั้งนั้น  (ICD10=I740,I743,I745) และ (ICD9= 8413-8418)',
                                                                         ['ipd-sur-pct/pct7-index']) :
                                                          Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                                         3.7 &nbsp;   จำนวนผู้ป่วยที่มีภาวะขาดเลือดที่ขา และถูกตัดขาตั้งแต่เหนือข้อเท้าขึ้นมา ในการนอนรพ.ครั้งนั้น  (ICD10=I740,I743,I745) และ (ICD9= 8413-8418)',
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
                <!-- End Timeline -->
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