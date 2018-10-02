<?php

use yii\helpers\Html;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii2assets\fullscreenmodal\FullscreenModal;
use yii\widgets\Pjax;
use yii\widgets\LinkPager;

$asset = frontend\assets\AppAsset::register($this);
$baseUrl = $asset->baseUrl;
?>
<div class="slider-inner">
    <div id="da-slider" class="da-slider">
        <div class="da-slide">
            <h2><i>บริการข้อมูล</i> <br /> <i>ข้อมูลพื้นฐาน</i> <br /> <i>ข้อมูลบริการทั่วไป</i></h2>
            <div class="da-img"><img class="img-responsive" src="<?= $baseUrl ?>/assets/plugins/parallax-slider/img/2.png" alt=""></div>        
        </div>
        <div class="da-slide">
            <h2><i>RESPONSIVE VIDEO</i> <br /> <i>SUPPORT AND</i> <br /> <i>MANY MORE</i></h2>
            <p><i>Lorem ipsum dolor amet</i> <br /> <i>tempor incididunt ut</i></p>
            <div class="da-img">
                <iframe src="http://player.vimeo.com/video/47911018" width="530" height="300" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
            </div>
        </div>
        <div class="da-slide">
            <h2><i>งานบริการข้อมูล</i> <br /> <i>ข้อมูลผู้ป่วยนอก</i> <br /> <i>ข้อมูลผู้ป่วยใน</i></h2>
            <div class="da-img"><img src="<?= $baseUrl ?>/assets/plugins/parallax-slider/img/nurse.png" alt="image01" /></div>
        </div>        
        <div class="da-slide">
            <h2><i>บริการข้อมูล</i> <br /> <i>ตัวชีวัด</i> <br /> <i>Service Plan</i></h2>
            <div class="da-img"><img src="<?= $baseUrl ?>/assets/plugins/parallax-slider/img/kpi.png" alt="image01" /></div>
        </div>
        <div class="da-slide">
            <h2><i>บริการข้อมูล</i> <br /> <i>งานคลินิพิเศษ</i> <br /></h2>
            <div class="da-img"><img src="<?= $baseUrl ?>/assets/plugins/parallax-slider/img/ncd.png" alt="image01" /></div>
        </div>        
        <div class="da-arrows">
            <span class="da-arrows-prev"></span>
            <span class="da-arrows-next"></span>
        </div>
    </div>
</div><!--/slider-->


    <div class="purchase">
        <div class="container">
            <div class="row">
                <div class="col-md-12 animated fadeInLeft">
                    <div class="headline">
                        <h4>
                            <i class="btn-u btn-u-orange btn-u-fb">New  รายงานใหม่ </i>
                        </h4>
                    </div>

                    <div class="row margin-bottom-10">
                        <div class="col-md-12">
                            <div class="bg-light"><!-- You can delete "bg-light" class. It is just to make background color -->
               <?php 
                      $sql = "select * from nureport where `status` = '1' order by id desc limit 25";
                      $rawD = \Yii::$app->db->createCommand($sql)->queryAll();
                      foreach ($rawD as $value) {
                              echo "<h5>";
                              echo  !Yii::$app->user->isGuest?
                                            Html::a('<i class="fa fa-align-justify color-green"></i>'.
                                                          $value['station'] . ' -- ' . $value['rname'].
                                                          '<img src=" ' .$baseUrl . '/assets/img/new_red.gif ">' .$value['rdate']                                                       
                                                          ,[$value['rcontroller']])  :   
                                            Html::a('<i class="fa fa-align-justify color-green"></i>'.
                                                          $value['station'] . ' -- ' . $value['rname'].
                                                          '<img src=" ' .$baseUrl . '/assets/img/new_red.gif ">',  
                                                          ['site/modal'],
                                                          [
                                                                 'class' => 'xmodal',
                                                                 'title' => 'เปิดดูข้อมูล',
                                                                 'data-target' => '#vmodal',
                                                                 'data-pjax' => '0',
                                                          ]
                                                      ) ; 
                              echo "</h5>";
                      } 
               ?>                 
                           </div>
                        </div>
                    </div><!--/row-->
                    
                </div>        
            </div>
            <div class="row">
                <div class="col-md-12 animated fadeInRight">
                    <div class="headline"><h4><i class="btn-u btn-u-sea-shop btn-u-fb">Update  รายงาน</i></h4></div>
                    <div class="row margin-bottom-10">
                        <div class="col-md-12">
                            <div class="bg-light"><!-- You can delete "bg-light" class. It is just to make background color -->
                                <?php 
                                       $sql = "select * from nureport where `status` = '2' order by id desc limit 25";
                                       $rawD = \Yii::$app->db->createCommand($sql)->queryAll();
                                       foreach ($rawD as $value) {
                                               echo "<h5>";
                                               echo  !Yii::$app->user->isGuest?
                                                             Html::a('<i class="fa fa-align-justify color-green"></i>'.
                                                                           $value['station'] . ' -- ' . $value['rname']."&nbsp;&nbsp;".
                                                                           '<img src=" ' .$baseUrl . '/assets/img/update1.gif ">' ."&nbsp;&nbsp;".$value['rdate']. " &nbsp;". $value['ext']                                                       
                                                                           ,[$value['rcontroller']])  :   
                                                             Html::a('<i class="fa fa-align-justify color-green"></i>'.
                                                                            $value['station'] . ' -- ' . $value['rname'].
                                                                           '<img src=" ' .$baseUrl . '/assets/img/update1.gif ">',  
                                                                           ['site/modal'],
                                                                           [
                                                                                  'class' => 'xmodal',
                                                                                  'title' => 'เปิดดูข้อมูล',
                                                                                  'data-target' => '#vmodal',
                                                                                  'data-pjax' => '0',
                                                                           ]
                                                                       ) ; 
                                               echo "</h5>";
                                       } 
                                ?>                                   
                    
                                
                            </div>
                        </div>
                    </div>                    
                    
                    
                </div>                     
            </div>
            
        </div>
    </div>    







<div class="container content-sm">
<div class="row margin-bottom-30">
    <!-- Welcome Block -->
    <div class="col-md-12 md-margin-bottom-40">
        <div class="headline"><h2>Welcome To Nangrong Hospital Report</h2></div>
        <div class="row">
            <div class="col-sm-3">
                <img class="img-responsive margin-bottom-20" src="<?= $baseUrl ?>/assets/img/main/img18.jpg"  alt="">
            </div>
            <div class="col-sm-9">
                <p>ระบบรายงาน Nangrong-hosxp Report สนับสนุนบุคลากรในการใช้ข้อมูลในระบบ HIS (Hosxp) โดยรายงานสามารถ ส่งออกไฟล์ Excel & Stilmulsoft Report</p>
                <ul class="list-unstyled margin-bottom-20">
                    <li><i class="fa fa-check color-green"></i> รายงานข้อมูลทั่วไป/ข้อมูลพื้นฐาน</li>
                    <li><i class="fa fa-check color-green"></i> รายงานผู้ป่วยนอก/ใน</li>
                    <li><i class="fa fa-check color-green"></i> รายงานตัวชี้วัด/ service Plan</li>
                    <li><i class="fa fa-check color-green"></i> รายงานคลินิกพิเศษ(โรคไม่ติดต่อเรื้อรัง)</li>
                </ul>
            </div>
        </div>
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