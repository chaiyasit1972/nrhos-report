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
        <h4 class="pull-left"><?= $sText;?></h4>
        <ul class="pull-right breadcrumb">
            <li><?=Html::a('Home',['/site/index']);?></li>
            <li><?=Html::a($mName,['/service-plan/index']);;?></li>
            <li><?=$names;?></li>
        </ul>
    </div>
</div>
<div class="margin-bottom-10"></div>       
<div class="row margin-left-5 margin-right-5">
    <div class="col-md-4">

        
        <div id="myCarousel" class="carousel slide carousel-v1">
            <div class="carousel-inner">
                <div class="item active">
                    <img src="<?= $baseUrl ?>/assets/img/bas9.jpg" alt="">
                </div>
                <div class="item">
                    <img src="<?= $baseUrl ?>/assets/img/bas3.jpg" alt="">
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
            <ul class="list-group sidebar-nav-v1 lists-v1" id="sidebar-nav" style="list-style-type: none;">         
      
                      <li class="list-group-item list-toggle">
                          <a class="btn-u btn-u-green" data-toggle="collapse" data-parent="#sidebar-nav" href="#collapse1">
                             <span class='h5 margin-left-10'>1. สาขาอายุรกรรม</span>                             
                         </a>   
                             <ul id="collapse1" class="collapse">
                                 <li>
                                    <?= !Yii::$app->user->isGuest?
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          1.1 อัตราตายผู้ป่วยติดเชื้อในกระแสเลือดแบบรุนแรงชนิด community-acquired',
                                                          ['/service-plan/service-plan611_1','year'=>'25'.$select1]) : 
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          1.1 อัตราตายผู้ป่วยติดเชื้อในกระแสเลือดแบบรุนแรงชนิด community-acquired',
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
                                                          1.2 อัตราการเสียชีวิตในผู้ป่วย (sepsis / septic shock / severe sepsis)',
                                                          ['/service-plan/service-plan611_2','year'=>'25'.$select1]) : 
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          1.2 อัตราการเสียชีวิตใน sepsis / septic shock / severe sepsis',
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
                                                          1.3 อัตราการส่งต่อผู้ป่วย sepsis รักษาโรงพยาบาลที่มีศักญภาพสูงกว่า (refer out)',
                                                          ['/service-plan/service-plan611_3','year'=>'25'.$select1]) : 
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          1.3 อัตราการส่งต่อผู้ป่วย sepsis รักษาโรงพยาบาลที่มีศักญภาพสูงกว่า (refer out)',
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
                                                          1.4 อัตราการส่งผู้ป่วย sepsis / septic shock / severe sepsis กลับ รพ.ลูกข่าย/รพช. (refer back)',
                                                          ['/service-plan/service-plan611_4','year'=>'25'.$select1]) : 
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          1.4 อัตราการส่งผู้ป่วย sepsis / septic shock / severe sepsis กลับ รพ.ลูกข่าย/รพช. (refer back)',
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
                                                          1.5 อัตราการรับผู้ป่วย sepsis / septic shock / severe sepsis จาก รพ.ลูกข่าย/รพช. (refer in)',
                                                          ['/service-plan/service-plan611_5','year'=>'25'.$select1]) : 
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          1.5 อัตราการรับผู้ป่วย sepsis / septic shock / severe sepsis จาก รพ.ลูกข่าย/รพช. (refer in)',
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
                                                          1.6 รายงานจำนวนผู้ป่วย sepsis / septic shock / severe sepsis ทั้งหมด/ตายทั้งหมด (ราย/เดือน) ',
                                                          ['/service-plan/service-plan611_6','year'=>'25'.$select1]) : 
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          1.6 รายงานจำนวนผู้ป่วย sepsis / septic shock / severe sepsis ทั้งหมด/ตายทั้งหมด (ราย/เดือน) ',
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
                                                          1.7 รายงานจำนวนผู้ป่วย sepsis/septic shock (ส่งต่อ/ตาย/จำนวน ทั้งหมด) ',
                                                          ['/service-plan/service-plan611_7','year'=>'25'.$select1]) : 
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          1.7 รายงานจำนวนผู้ป่วย sepsis/septic shock (ส่งต่อ/ตาย/จำนวน ทั้งหมด) ',
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
                                                          1.8 รายงานจำนวนผู้ป่วยติดเชื้อในกระแสเลือด( Community Acquired Sepsis)  (ส่งต่อ/ตาย/จำนวน ทั้งหมด) ',
                                                          ['/service-plan/service-plan611_8','year'=>'25'.$select1]) : 
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          1.8 รายงานจำนวนผู้ป่วยติดเชื้อในกระแสเลือด( Community Acquired Sepsis)  (ส่งต่อ/ตาย/จำนวน ทั้งหมด) ',
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
                                                          1.9 รายงานจำนวนผู้ป่วยติดเชื้อในกระแสเลือดแบบรุนแรงชนิด( Community Acquired )  ((ส่งต่อ/ตาย/จำนวน ทั้งหมด) ',
                                                          ['/service-plan/service-plan611_9','year'=>'25'.$select1]) : 
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          1.9 รายงานจำนวนผู้ป่วยติดเชื้อในกระแสเลือดแบบรุนแรงชนิด( Community Acquired )  (ส่งต่อ/ตาย/จำนวน ทั้งหมด)',
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
                          <a class="btn-u btn-u-green" data-toggle="collapse" data-parent="#sidebar-nav" href="#collapse2">
                             <span class='h5 margin-left-10'>2. สาขาสูติกรรม</span>                             
                         </a>   
                             <ul id="collapse2" class="collapse">
                                 <li>
                                    <?= !Yii::$app->user->isGuest?
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          2.1 อัตราการคลอดก่อนกำหนด (อายุครรภ์น้อยกว่า 37 สัปดาห์)',
                                                          ['/service-plan/service-plan612_1','year'=>'25'.$select1]) : 
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          2.1 อัตราการคลอดก่อนกำหนด (อายุครรภ์น้อยกว่า 37 สัปดาห์)',
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
                                                          2.2 อัตราตายมารดาจากการตกเลือดหลังคลอด(PPH)',
                                                          ['/service-plan/service-plan612_2','year'=>'25'.$select1]) : 
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          2.2 อัตราตายมารดาจากการตกเลือดหลังคลอด(PPH)',
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
                                                          2.3 อัตรามารดาตกเลือดหลังคลอด(PPH)',
                                                          ['/service-plan/service-plan612_3','year'=>'25'.$select1]) : 
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          2.3 อัตรามารดาตกเลือดหลังคลอด(PPH)',
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
                          <a class="btn-u btn-u-green" data-toggle="collapse" data-parent="#sidebar-nav" href="#collapse3">
                             <span class='h5 margin-left-10'>3. สาขากุมารเวชกรรม </span>                             
                         </a>   
                             <ul id="collapse3" class="collapse">
                                 <li>
                                    <?= !Yii::$app->user->isGuest?
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          3.1 อัตราป่วยตายโรคปอดบวมในเด็ก อายุ ๑ เดือน – ๕ ปีบริบูรณ์',
                                                          ['/service-plan/service-plan613_1','year'=>'25'.$select1]) : 
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          3.1 อัตราป่วยตายโรคปอดบวมในเด็ก อายุ ๑ เดือน – ๕ ปีบริบูรณ์',
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
                          <a class="btn-u btn-u-green" data-toggle="collapse" data-parent="#sidebar-nav" href="#collapse4">
                             <span class='h5 margin-left-10'>4. สาขาศัลยกรรมกระดูก </span>                             
                         </a>   
                             <ul id="collapse4" class="collapse">
                                 <li>
                                    <?= !Yii::$app->user->isGuest?
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          4.1 อัตราผู้ป่วยที่มีกระดูกหักซ้ำภายหลังกระดูกสะโพกหัก',
                                                          ['/service-plan/service-plan614_1','year'=>'25'.$select1]) : 
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          4.1 อัตราผู้ป่วยที่มีกระดูกหักซ้ำภายหลังกระดูกสะโพกหัก',
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
                                                          4.2 อัตราการผ่าตัดแบบ Early Surgery',
                                                          ['/service-plan/service-plan614_2','year'=>'25'.$select1]) : 
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          4.2 อัตราการผ่าตัดแบบ Early Surgery',
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
                          <a class="btn-u btn-u-green" data-toggle="collapse" data-parent="#sidebar-nav" href="#collapse5">
                             <span class='h5 margin-left-10'>5. สาขาศัลยกรรม </span>                             
                         </a>   
                             <ul id="collapse5" class="collapse">
                                 <li>
                                    <?= !Yii::$app->user->isGuest?
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          5.1 รายงานจำนวนผู้ป่วยศัลยกรรมตามการวินิจฉัยโรค(ตามรหัส ICD-10) ที่ได้รับการผ่าตัด(หัตถการ)',
                                                          ['/service-plan/service-plan615_1','year'=>'25'.$select1]) : 
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          5.1 รายงานจำนวนผู้ป่วยศัลยกรรมตามการวินิจฉัยโรค(ตามรหัส ICD-10) ที่ได้รับการผ่าตัด(หัตถการ)',
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
                      
                      
                      
                                 <li>
                                    <?= !Yii::$app->user->isGuest?
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          - อัตราการครองเตียง',
                                                          ['/service-plan/service-plan61a','year'=>'25'.$select1]) : 
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          - อัตราการครองเตียง',
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
                                                          - ค่า CMI',
                                                          ['/service-plan/service-plan61b','year'=>'25'.$select1]) : 
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          - ค่า CMI',
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
                                                          - อัตราการ Refer Out ผู้ป่วยใน ที่มีค่า RW < 0.5  ไปรพ.บุรีรัมย์ ',
                                                          ['/service-plan/service-plan61c','year'=>'25'.$select1]) : 
                                            Html::a('<i class="fa fa-arrow-right color-green"></i>
                                                          - อัตราการ Refer Out ผู้ป่วยใน ที่มีค่า RW < 0.5  ไปรพ.บุรีรัมย์ ',
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