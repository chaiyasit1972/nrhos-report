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
            <li><?=Html::a($sText,['#']);?></li>            
            <li><?=Html::a($mText,['/copd/index']);;?></li>
        </ul>
    </div>
</div>
<div class="margin-bottom-10"></div>       
<div class="row margin-left-5 margin-right-5">
    <div class="col-md-4">
       <div id="myCarousel" class="carousel slide carousel-v1">
            <div class="carousel-inner">
                <div class="item active">
                    <img src="<?= $baseUrl ?>/assets/img/copd1.jpg" alt="">
                </div>         
                <div class="item">
                    <img src="<?= $baseUrl ?>/assets/img/copd2.png" alt="">
                </div> 
                <div class="item">
                    <img src="<?= $baseUrl ?>/assets/img/copd3.jpg" alt="">
                </div>      
                <div class="item">
                    <img src="<?= $baseUrl ?>/assets/img/copd4.jpeg" alt="">
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
                                                          1. รายงานทะเบียนผู้ป่วยคลินิก COPD',
                                                          ['/copd/copd-index']) : 
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          1. รายงานทะเบียนผู้ป่วยคลินิก COPD',
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
                                                          2. รายงานแบบประเมิณตนเอง ด้านผู้ป่วยโรค COPD (J440,J441,J449)',
                                                          ['/copd/copd1-index']) : 
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          2. รายงานแบบประเมิณตนเอง ด้านผู้ป่วยโรค COPD (J440,J441,J449)',
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
                                                          3. รายงานการสูบบุหรี่ในผู้ป่วย COPD (ICD-10 : J44 - J449)',
                                                          ['/copd/copd2-index']) : 
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          3. รายงานการสูบบุหรี่ในผู้ป่วย COPD(ICD-10 : J44-J449)',
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
                                                          4. รายงานสรุปผลการเลิกสูบบุหรี่ในผู้ป่วย COPD (ICD-10 : J44 - J449) สูบแล้วเลิก',
                                                          ['/copd/copd3-index']) : 
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          4. รายงานสรุปผลการเลิกสูบบุหรี่ในผู้ป่วย COPD (ICD-10 : J44 - J449) สูบแล้วเลิก',
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
                                                          5. รายงานการรับบริการผู้ป่วย COPD (ICD-10 : J440,J441,J449) อายุ 65 ปีขึ้นไป',
                                                          ['/copd/copd4-index']) : 
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          5. รายงานการรับบริการผู้ป่วย COPD (ICD-10 : J440,J441,J449) อายุ 65 ปีขึ้นไป',
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
                                                          6. รายงานจำนวนผู้ป่วย COPD (ICD-10 : J440 - J449) รับบริการ OPD',
                                                          ['/copd/copd5-index']) : 
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          6. รายงานจำนวนผู้ป่วย COPD (ICD-10 : J440 - J449) รับบริการ OPD',
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
                                                          7. รายงานจำนวนผู้ป่วย COPD (ICD-10 : J440 - J449) รับบริการ ER',
                                                          ['/copd/copd6-index']) : 
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          7. รายงานจำนวนผู้ป่วย COPD (ICD-10 : J440 - J449) รับบริการ ER',
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
<div class="margin-bottom-40"></div>