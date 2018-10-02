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
        <h4 class="pull-left"><?=$names;?></h4>
        <ul class="pull-right breadcrumb">
            <li><?=Html::a('Home',['/site/index']);?></li>
            <li><?=Html::a($mText,['/fund-qof/index']);;?></li>
        </ul>
    </div>
</div>
<div class="margin-bottom-10"></div>       
<div class="row margin-left-5 margin-right-5">
    <div class="col-md-4">
        <div id="myCarousel" class="carousel slide carousel-v1">
            <div class="carousel-inner">
                <div class="item">
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
                <div class="item active">
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
                             <span class='h5 margin-left-10'>คลิกเลือกรายงาน !!</span>                             
                         </a>   
                             <ul id="collapse1" class="collapse">
                                 <li>
                                    <?= !Yii::$app->user->isGuest?
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          1. ร้อยละของประชากรไทยอายุ 35-74 ปี ได้รับการคัดกรองเบาหวาน 
                                                              โดยการตรวจวัดระดับน้ำตาลในเลือด  ',
                                                          ['/fund-qof/qof1-index']) : 
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          1. ร้อยละของประชากรไทยอายุ 35-74 ปี ได้รับการคัดกรองเบาหวาน 
                                                              โดยการตรวจวัดระดับน้ำตาลในเลือด  ',
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
                                                          2. ร้อยละของประชากรไทยอายุ 35-74 ปี ที่ได้รับการคัดกรองและวินิจฉัยเป็นเบาหวาน  ',
                                                          ['/fund-qof/qof2-index']) : 
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          2. ร้อยละของประชากรไทยอายุ 35-74 ปี ที่ได้รับการคัดกรองและวินิจฉัยเป็นเบาหวาน  ',
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
                                                          3. ร้อยละของประชากรไทยอายุ 35-74ปี ได้รับการคัดกรองความดันโลหิตสูง  ',
                                                          ['/fund-qof/qof3-index']) : 
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          3. ร้อยละของประชากรไทยอายุ 35-74ปี ได้รับการคัดกรองความดันโลหิตสูง  ',
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
                                                          4. ร้อยละของประชากรไทยอายุ 35-74 ปี ที่ได้รับการคัดกรองและวินิจฉัยเป็นความดันโลหิตสูง',
                                                          ['/fund-qof/qof4-index']) :  
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          4. ร้อยละของประชากรไทยอายุ 35-74 ปี ที่ได้รับการคัดกรองและวินิจฉัยเป็นความดันโลหิตสูง',
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
                                                          5. ร้อยละของหญิงมีครรภ์ได้รับการฝากครรภ์ครั้งแรกภายใน 12 สัปดาห์  ',
                                                          ['/fund-qof/qof5-index']) : 
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          5. ร้อยละของหญิงมีครรภ์ได้รับการฝากครรภ์ครั้งแรกภายใน 12 สัปดาห์  ',
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
                                                          6. ร้อยละการใช้ยาปฏิชีวนะอย่างรับผิดชอบในผู้ป่วยนอกโรคอุจจาระร่วงเฉียบพลัน
                                                              (Acute Diarrhea)  ',
                                                          ['/qof/qof6-index']) : 
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          6. ร้อยละการใช้ยาปฏิชีวนะอย่างรับผิดชอบในผู้ป่วยนอกโรคอุจจาระร่วงเฉียบพลัน
                                                              (Acute Diarrhea)  ',
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
                                                          7. ร้อยละการใช้ยาปฏิชีวนะอย่างรับผิดชอบในผู้ป่วยนอกโรคติดเชื้อระบบทางเดินหายใจ
                                                             (Respiratory Infection)   ',
                                                          ['/qof/qof7-index']) : 
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          7. ร้อยละการใช้ยาปฏิชีวนะอย่างรับผิดชอบในผู้ป่วยนอกโรคติดเชื้อระบบทางเดินหายใจ
                                                             (Respiratory Infection)   ',
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
                                                          8.  การลดลงของอัตราการนอนโรงพยาบาลด้วยภาวะที่ควรควบคุมด้วยบริการผู้ป่วยนอก
                                                               (epilepsy COPD Asthma DM HT)  ',
                                                          ['/qof/qof8-index']) : 
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          8.  การลดลงของอัตราการนอนโรงพยาบาลด้วยภาวะที่ควรควบคุมด้วยบริการผู้ป่วยนอก
                                                               (epilepsy COPD Asthma DM HT)  ',
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
                                                          9. ร้อยละสะสมความครอบคลุมการตรวจคัดกรองมะเร็งปากมดลูกในสตรี 30-60 ปี 
                                                             ภายใน 5  ปี   ',
                                                          ['/qof/qof9-index']) : 
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          9. ร้อยละสะสมความครอบคลุมการตรวจคัดกรองมะเร็งปากมดลูกในสตรี 30-60 ปี 
                                                             ภายใน 5  ปี   ',
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
                                                          10. อัตราผู้เป็นเบาหวานที่ควบคุมระดับน้ำตาลในเลือดได้ดี   ',
                                                          ['/qof/qof10-index']) : 
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          10. อัตราผู้เป็นเบาหวานที่ควบคุมระดับน้ำตาลในเลือดได้ดี   ',
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
                                                          11. อัตราผู้เป็นความดันโลหิตสูงที่ควบคุมความดันโลหิตได้ดี  ',
                                                          ['/qof/qof11-index']) : 
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          11. อัตราผู้เป็นความดันโลหิตสูงที่ควบคุมความดันโลหิตได้ดี  ',
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
                                                          12. ร้อยละของประชาชนกลุ่มเสี่ยงได้รับการคัดกรองมะเร็งท่อน้ำดี ',
                                                          ['/qof/qof12-index']) : 
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          12. ร้อยละของประชาชนกลุ่มเสี่ยงได้รับการคัดกรองมะเร็งท่อน้ำดี ',
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