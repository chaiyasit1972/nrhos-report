<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use yii\helpers\Url;

$asset = frontend\assets\AppAsset::register($this);
$baseUrl = $asset->baseUrl;


?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
      <!-- 
        <style>
        body{
            -webkit-filter: grayscale(1);
	        filter: grayscale(1);
	    }
    </style>
    -->
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="<?= Yii::getAlias('@web'); ?>/frontend/web/img/lam.png">
        <link rel='stylesheet' type='text/css' href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600&amp;subset=cyrillic,latin'>
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title = "Nangrong-hosxp Report") ?></title>
        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>
        <div class="wrapper">
            <div class="header header-sticky">    
                <div class="container">
                    <a class="logo" href="index.php">
                      <!--<img src="<?= $baseUrl ?>/assets/img/logo1-default.png" alt="Logo">-->
                       <img src="<?= $baseUrl ?>/assets/img/3.png" alt="Logo">          
                    </a>
                    <div class="topbar">
                        <ul class="loginbar pull-right">
                            <li class="topbar-devider"></li>
                            <?php
                            if (Yii::$app->user->isGuest) {
                                ?>                                       
                                <li><?= Html::a('SignUp', ['/site/signup']); ?></li>
                                <li class="topbar-devider"></li>                                
                                <li><?= Html::a('LOGIN', ['/site/login']) ?></li>
                                <?php
                            } else {
                                ?>
                                <li><?= Html::a('LOGOUT (' . Yii::$app->user->identity->username . ')', ['site/logout'], ['data-method' => 'post']) ?></li>  
                                <li class="topbar-devider"></li>                                   
                                <?php
                            }
                            ?>                                 
                        </ul>
                    </div>
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="fa fa-bars"></span>                       
                    </button>
                </div>
                <div class="collapse navbar-collapse mega-menu navbar-responsive-collapse" role="navigation">
                    <div class="container">
                        <ul class="nav navbar-nav navbar-fixed-top">
                            <li class="active">
                                <?= Html::a('หน้าหลัก', ['site/index']); ?>      
                            </li>
                            <li class="dropdown">
                                <!--<?php //echo  Html::a('บริการข้อมูล', ['service/index']); ?>-->     
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                                    งานบริการข้อมูล
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="">&nbsp;</li>
                                    <li class="dropdown-submenu">   
                                            <?=Html::a('<i class="fa fa-angle-right icon-color-green"></i>
                                                                 ข้อมูลระดับโรงพยาบาล', ['#']);
                                            ?>       
                                        <ul class="dropdown-menu">
                                            <li>
                                                    <?= Html::a('<i class="fa fa-angle-right icon-color-green"></i>
                                                                     ข้อมูลพื้นฐาน & ข้อมูลทั่วไป', ['gen/index']);
                                                    ?> 
                                            </li>
                                            <li>
                                                    <?= Html::a('<i class="fa fa-angle-right icon-color-green"></i>
                                                                     ตัวชี้วัด รพ.', ['#']);
                                                    ?> 
                                            </li>
                                            <li>
                                                    <?= Html::a('<i class="fa fa-angle-right icon-color-green"></i>
                                                                     ตัวชี้วัด service plan', ['#']);
                                                    ?> 
                                            </li>
                                            <li>
                                                    <?= Html::a('<i class="fa fa-angle-right icon-color-green"></i>
                                                                     ตัวชี้วัด QOF', ['#']);
                                                    ?> 
                                            </li>                                            
                                        </ul>                                        
                                    </li>     
                                    
                                    <li class="dropdown-submenu">
                                            <?= Html::a('<i class="fa fa-angle-right icon-color-green"></i>
                                                                     ข้อมูลระดับทีม');
                                            ?>  
                                        <ul class="dropdown-menu">
                                            <li>
                                                    <?= Html::a('<i class="fa fa-angle-right icon-color-green"></i>
                                                                     PCT - สูติกรรม', ['pct/index1']);
                                                    ?> 
                                            </li> 
                                            <li>
                                                    <?= Html::a('<i class="fa fa-angle-right icon-color-green"></i>
                                                                     PCT - นรีเวชกรรม', ['pct/index8']);
                                                    ?> 
                                            </li>                                             
                                            <li>
                                                    <?= Html::a('<i class="fa fa-angle-right icon-color-green"></i>
                                                                     PCT - ศัลยกรรมทั่วไป', ['pct/index2']);
                                                    ?> 
                                            </li>  
                                            <li>
                                                    <?= Html::a('<i class="fa fa-angle-right icon-color-green"></i>
                                                                     PCT - ศัลยกรรมกระดูกและข้อ(ออร์โธปิดิกส์)', ['pct/index3']);
                                                    ?> 
                                            </li>   
                                            <li>
                                                    <?= Html::a('<i class="fa fa-angle-right icon-color-green"></i>
                                                                     PCT - อายุรกรรม', ['pct/index4']);
                                                    ?> 
                                            </li>   
                                            <li>
                                                    <?= Html::a('<i class="fa fa-angle-right icon-color-green"></i>
                                                                     PCT - กุมารเวชกรรม', ['pct/index5']);
                                                    ?> 
                                            </li>  
                                            <li>
                                                    <?= Html::a('<i class="fa fa-angle-right icon-color-green"></i>
                                                                     PCT - หู คอ จมูก', ['pct/index6']);
                                                    ?> 
                                            </li>   
                                            <li>
                                                    <?= Html::a('<i class="fa fa-angle-right icon-color-green"></i>
                                                                     PCT - จักษุ', ['pct/index7']);
                                                    ?> 
                                            </li>      
                                            <li>
                                                    <?= Html::a('<i class="fa fa-angle-right icon-color-green"></i>
                                                                     ทีมงานคุณภาพ', ['quality/index']);
                                                    ?> 
                                            </li>                                                
                                            <li>
                                                    <?= Html::a('<i class="fa fa-angle-right icon-color-green"></i>
                                                                     ทีมโครงสร้างกายภาพและสิ่งแวดล้อม ', ['#']);
                                                    ?> 
                                            </li>                                               
                                            <li>
                                                    <?= Html::a('<i class="fa fa-angle-right icon-color-green"></i>
                                                                     ทีมบริหารทรัพยากรบุคคล ', ['#']);
                                                    ?> 
                                            </li>                                               
                                            <li>
                                                    <?= Html::a('<i class="fa fa-angle-right icon-color-green"></i>
                                                                     ทีมสิทธิผู้ป่วยและจริยธรรมองค์กร', ['#']);
                                                    ?> 
                                            </li>                                               
                                            <li>
                                                    <?= Html::a('<i class="fa fa-angle-right icon-color-green"></i>
                                                                     ทีมเฝ้าระวังและควบคุมการติดเชื้อ', ['#']);
                                                    ?> 
                                            </li>   
                                            <li>
                                                    <?= Html::a('<i class="fa fa-angle-right icon-color-green"></i>
                                                                     ทีมสารสนเทศและเวชระเบียน ', ['#']);
                                                    ?> 
                                            </li> 
                                            <li>
                                                    <?= Html::a('<i class="fa fa-angle-right icon-color-green"></i>
                                                                     ทีมบริหารความเสี่ยง ', ['#']);
                                                    ?> 
                                            </li> 
                                            <li>
                                                    <?= Html::a('<i class="fa fa-angle-right icon-color-green"></i>
                                                                     องค์กรแพทย์', ['#']);
                                                    ?> 
                                            </li>                                               

                                            
                                        </ul>
                                    </li>                                   
                                    <li>   
                                            <?=Html::a('<i class="fa fa-angle-right icon-color-green"></i>
                                                                 ข้อมูลบริการสุขภาพปฐมภูมิ(PCC)', ['pcc/index']);
                                            ?>                                        
                                    </li>    
                                    
                                    
                                    
                                    <li>   
                                            <?=Html::a('<i class="fa fa-angle-right icon-color-green"></i>
                                                                 ตัวชี้วัด KPI จังหวัด', ['service/index2']);
                                            ?>                                        
                                    </li>                                        
                                    <li>   
                                            <?=Html::a('<i class="fa fa-angle-right icon-color-green"></i>
                                                                 ตัวชี้วีด Service Plan', ['service/index3']);
                                            ?>                                        
                                    </li>      
                                    <li>   
                                            <?=Html::a('<i class="fa fa-angle-right icon-color-green"></i>
                                                                 ตัวชี้วัด QOF เขต', ['service/index5']);
                                            ?>                                        
                                    </li>        
                                    <li>&nbsp;</li>
                                </ul>        
                            </li>                                                     
                            <li class="dropdown ">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                                    งานผู้ป่วยนอก
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <?=
                                        Html::a('<i class="fa fa-angle-right icon-color-green"></i>
                                                             งานห้องบัตร(เวชระเบียน)', ['vetrabean/index']);
                                        ?>                                        
                                    </li>                                    
                                    <li>
                                        <?=
                                        Html::a('<i class="fa fa-angle-right icon-color-green"></i>
                                                             งานผู้ป่วยนอก(9 แผนกหลัก)', ['opd/index']);
                                        ?>                                        
                                    </li> 
                                    <li>
                                        <?=
                                        Html::a('<i class="fa fa-angle-right icon-color-green"></i>
                                                             งานอุบัติเหตุและห้องฉุกเฉิน', ['er/index']);
                                        ?>                                        
                                    </li> 
                                    <li>
                                        <?=
                                        Html::a('<i class="fa fa-angle-right icon-color-green"></i>
                                                             งานเวชปฏิบัติและครอบครัว', ['practice/index']);
                                        ?>                                        
                                    </li>
                                    <li>
                                        <?=
                                        Html::a('<i class="fa fa-angle-right icon-color-green"></i>
                                                             งานสุขาภิบาลและป้องกันโรค', ['suka/index']);
                                        ?>                                        
                                    </li>     
                                    <li>
                                        <?=
                                        Html::a('<i class="fa fa-angle-right icon-color-green"></i>
                                                             งานทันตกรรม', ['dental/index']);
                                        ?>                                        
                                    </li>                                    
                                    <li>
                                        <?=
                                        Html::a('<i class="fa fa-angle-right icon-color-green"></i>
                                                             งานห้องตรวจตา(จักษุ)', ['optic/index']);
                                        ?>                                        
                                    </li>
                                    <li>
                                        <?=
                                        Html::a('<i class="fa fa-angle-right icon-color-green"></i>
                                                             งานเภสัชกรรม ห้องจ่ายยาผู้ป่วยนอก', ['phar-out/index']);
                                        ?>                                        
                                    </li>
                                    <li>
                                        <?=
                                        Html::a('<i class="fa fa-angle-right icon-color-green"></i>
                                                             งานเภสัชกรรม ห้องจ่ายยาผู้ป่วยใน', ['phar-in/index']);
                                        ?>                                        
                                    </li>
                                    <li>
                                        <?=
                                        Html::a('<i class="fa fa-angle-right icon-color-green"></i>
                                                             งานเภสัชกรรม งานผลิตยา', ['phar-drug/index']);
                                        ?>                                        
                                    </li>                                    
                                    <li>
                                        <?=
                                        Html::a('<i class="fa fa-angle-right icon-color-green"></i>
                                                             งาน Long Term Care(LTC)', ['ltc/index']);
                                        ?>                                        
                                    </li>                                    
                                    <li>
                                        <?=
                                        Html::a('<i class="fa fa-angle-right icon-color-green"></i>
                                                             งานอนามัยแม่และเด็ก', ['mom-child/index']);
                                        ?>                                        
                                    </li>                                         
                                    <li>
                                        <?=
                                        Html::a('<i class="fa fa-angle-right icon-color-green"></i>
                                                             งานแพทย์แผนไทย', ['health/index']);
                                        ?>                                        
                                    </li>         
                                    <li>
                                        <?=
                                        Html::a('<i class="fa fa-angle-right icon-color-green"></i>
                                                             งานอาชีวะอนามัย', ['occupa/index']);
                                        ?>                                        
                                    </li>    
                                    <li>
                                        <?=
                                        Html::a('<i class="fa fa-angle-right icon-color-green"></i>
                                                             งานสุขภาพจิต', ['mental/index']);
                                        ?>                                        
                                    </li>     
                                    <li>
                                        <?=
                                        Html::a('<i class="fa fa-angle-right icon-color-green"></i>
                                                             งานศูนย์ Admit ผู้ป่วย', ['admit/index']);
                                        ?>                                        
                                    </li> 
                                    <li>
                                        <?=
                                        Html::a('<i class="fa fa-angle-right icon-color-green"></i>
                                                             งานห้องชันสูตร(LAB)', ['lab/index']);
                                        ?>                                        
                                    </li>   
                                    <li>
                                        <?=
                                        Html::a('<i class="fa fa-angle-right icon-color-green"></i>
                                                             งานวิสัญญี(Anesth)', ['anesth/index']);
                                        ?>                                        
                                    </li>        
                                    <li>
                                        <?=
                                        Html::a('<i class="fa fa-angle-right icon-color-green"></i>
                                                             งานกายภาพบำบัด(physical therapy)', ['physic/index']);
                                        ?>                                        
                                    </li>                      
                                    <li>
                                        <?=
                                        Html::a('<i class="fa fa-angle-right icon-color-green"></i>
                                                             งานสุขศึกษาและปรับเปลี่ยนพฤติกรรม', ['health-educ/index']);
                                        ?>                                        
                                    </li>                                       
                                    
                                </ul>
                            </li>

                            <!-- Features -->
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                                    งานผู้ป่วยใน
                                </a>
                                <ul class="dropdown-menu">                                     
                                    <li>
                                        <?=
                                        Html::a('<i class="fa fa-angle-right icon-color-green"></i>
                                                             อาคาร 4 ชั้น 1 (ศัลยกรรมกระดูก)', ['ipd-ortho/index']);
                                        ?>                                        
                                    </li>     
                                    <li>
                                        <?=
                                        Html::a('<i class="fa fa-angle-right icon-color-green"></i>
                                                             อาคาร 4 ชั้น 2 (ศัลยกรรมทั่วไป-หญิง)', ['ipd-sur/index']);
                                        ?>                                        
                                    </li>       
                                    <li>
                                        <?=
                                        Html::a('<i class="fa fa-angle-right icon-color-green"></i>
                                                             อาคาร 4 ชั้น 3 (ศัลยกรรมทั่วไป-ชาย)', ['ipd-sur-men/index']);
                                        ?>                                        
                                    </li>  
                                    <li>
                                        <?=
                                        Html::a('<i class="fa fa-angle-right icon-color-green"></i>
                                                             อาคาร 4 ชั้น 5 (พิเศษ)', ['ipd-ortho-pedics/index']);
                                        ?>                                        
                                    </li>                                       
                                    <li>
                                        <?=
                                        Html::a('<i class="fa fa-angle-right icon-color-green"></i>
                                                             หอผู้ป่วยหนัก (ICU)', ['ipd-icu/index']);
                                        ?>                                        
                                    </li>   
                                    <li>
                                        <?=
                                        Html::a('<i class="fa fa-angle-right icon-color-green"></i>
                                                             อาคาร 5 ชั้น 1 (อายุรกรรม - ชาย)', ['ipd-medm/index']);
                                        ?>                                        
                                    </li>                                       
                                    <li>
                                        <?=
                                        Html::a('<i class="fa fa-angle-right icon-color-green"></i>
                                                             อาคาร 5 ชั้น 2 (อายุรกรรม - หญิง)', ['ipd-medf/index']);
                                        ?>                                        
                                    </li>                                     
                                    <li>
                                        <?=
                                        Html::a('<i class="fa fa-angle-right icon-color-green"></i>
                                                             อาคาร 5 ชั้น 3 (EENT)', ['ipd-eent/index']);
                                        ?>                                        
                                    </li>                                      
                                    <li>
                                        <?=
                                        Html::a('<i class="fa fa-angle-right icon-color-green"></i>
                                                             อาคาร 5 ชั้น 4 (เคมีบำบัด)', ['ipd-cancer/index']);
                                        ?>                                        
                                    </li>   
                                    <li>
                                        <?=
                                        Html::a('<i class="fa fa-angle-right icon-color-green"></i>
                                                             อาคาร 5 ชั้น 5 (อายุรกรรม - ห้องพิเศษ)', ['ipd-meds5/index']);
                                        ?>                                        
                                    </li>         
                                    <li>
                                        <?=
                                        Html::a('<i class="fa fa-angle-right icon-color-green"></i>
                                                             อาคาร 5 ชั้น 6 (อายุรกรรม - ห้องพิเศษ)', ['ipd-meds6/index']);
                                        ?>                                        
                                    </li>                                       
                                    <li>
                                        <?=
                                        Html::a('<i class="fa fa-angle-right icon-color-green"></i>
                                                             อาคาร สกลฯชั้น 2 (กุมารเวชกรรม)', ['ipd-child/index']);
                                        ?>                                        
                                    </li>   
                                    <li>
                                        <?=
                                        Html::a('<i class="fa fa-angle-right icon-color-green"></i>
                                                             อาคาร สกลฯชั้น 3 (พิเศษ - กุมารเวชกรรม)', ['ipd-child3/index']);
                                        ?>                                        
                                    </li>       
                                    <li>
                                        <?=
                                        Html::a('<i class="fa fa-angle-right icon-color-green"></i>
                                                             อาคาร สกลฯชั้น 4 (พิเศษ - กุมารเวชกรรม)', ['ipd-child4/index']);
                                        ?>                                        
                                    </li>                                      
                                </ul>
                            </li>
                            <!-- End Features --> 

                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                                    คลินิกพิเศษ
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <?=
                                        Html::a('<i class="fa fa-angle-right icon-color-green"></i>
                                                             คลินิกผู้ป่วยโรคเรื้อรัง(NCD)', ['ncd-clinic/index']);
                                        ?>                                        
                                    </li> 
                                    <li>
                                        <?=
                                        Html::a('<i class="fa fa-angle-right icon-color-green"></i>
                                                             คลินิกโรคไต', ['kidney/index']);
                                        ?>                                        
                                    </li> 
                                    <li>
                                        <?=
                                        Html::a('<i class="fa fa-angle-right icon-color-green"></i>
                                                             คลินิกสุขภาพเด็กดี(บัญชี 3,4)', ['child/index']);
                                        ?>                                        
                                    </li>                
                                    <li>
                                        <?=
                                        Html::a('<i class="fa fa-angle-right icon-color-green"></i>
                                                             คลินิกหญิงตั้งครรภ์(ANC)', ['anc/index']);
                                        ?>                                        
                                    </li>                                       
                                    <li>
                                        <?=
                                        Html::a('<i class="fa fa-angle-right icon-color-green"></i>
                                                             คลินิกยาต้านผู้ป่วยโรคเรื้อรัง(ARV)', ['arv/index']);
                                        ?>                                        
                                    </li> 
                                    <li>
                                        <?=
                                        Html::a('<i class="fa fa-angle-right icon-color-green"></i>
                                                             คลินิกผู้ป่วยโรคเรื้อรัง(COPD)', ['copd/index']);
                                        ?>                                        
                                    </li>   
                                    <li>
                                        <?=
                                        Html::a('<i class="fa fa-angle-right icon-color-green"></i>
                                                             คลินิกผู้ป่วยโรคเรื้อรัง(Asthma)', ['asthma/index']);
                                        ?>                                        
                                    </li>                                       
                                    <li>
                                        <?=
                                        Html::a('<i class="fa fa-angle-right icon-color-green"></i>
                                                             คลินิกผู้ป่วยโรคเรื้อรัง(TB)', ['tb/index']);
                                        ?>                                        
                                    </li>                                     
                                    <li>
                                        <?=
                                        Html::a('<i class="fa fa-angle-right icon-color-green"></i>
                                                             คลินิกผู้ป่วยโรคเรื้อรัง(Warfarin)', ['warfarin/index']);
                                        ?>                                        
                                    </li>                                     
                                    
                                    
                                </ul>
                            </li> 
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                                    งานประกันสุขภาพ
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <?=
                                        Html::a('<i class="fa fa-angle-right icon-color-green"></i>ข้อมูลงานการเงิน', ['insurance/index']);
                                        ?>                                        
                                    </li> 

                                  
                                    
                                    
                                </ul>
                            </li>                             
                             <?php
                                     if(Yii::$app->user->isGuest) {
                                         
                             ?>                            
                             
                             <?php
                                     } else {
                                            if(Yii::$app->user->identity->isAdmin){
                             ?>
                                            <li>
                                                  <?=Html::a('Administrator',['/administrator'])?> 
                                            </li> 
                            
                             <?php            
                                    }                
                                     }
                             ?>

                  

                                                            
                                           
<!--                            
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                                    รายงานกองทุน
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <?=
                                        Html::a('<i class="fa fa-angle-right icon-color-green"></i>
                                                             กองทุน SERVICE PLAN', ['fund-service-plan/index']);
                                        ?>                                        
                                    </li> 
                                    <li>
                                        <?=
                                        Html::a('<i class="fa fa-angle-right icon-color-green"></i>
                                                             กองทุน QOF', ['fund-qof/index']);
                                        ?>                                        
                                    </li>     
                                    <li>
                                        <?=
                                        Html::a('<i class="fa fa-angle-right icon-color-green"></i>
                                                             กองทุนโรคเรื้อรัง (DM/HT)', ['fund-ncd/index']);
                                        ?>                                        
                                    </li>  
                                    <li>
                                        <?=
                                        Html::a('<i class="fa fa-angle-right icon-color-green"></i>
                                                             กองทุนโรคไต (CKD)', ['fund-ckd/index']);
                                        ?>                                        
                                    </li>     
                                    <li>
                                        <?=
                                        Html::a('<i class="fa fa-angle-right icon-color-green"></i>
                                                             กองทุน LTC', ['fund-ltc/index']);
                                        ?>                                        
                                    </li>  
                                    <li>
                                        <?=
                                        Html::a('<i class="fa fa-angle-right icon-color-green"></i>
                                                            กองทุนโรคเอดส์', ['fund-aid/index']);
                                        ?>                                        
                                    </li>    
                                    <li>
                                        <?=
                                        Html::a('<i class="fa fa-angle-right icon-color-green"></i>
                                                             กองทุน PP', ['fund-pp/index']);
                                        ?>                                        
                                    </li>       
                                    <li>
                                        <?=
                                        Html::a('<i class="fa fa-angle-right icon-color-green"></i>
                                                             กองทุนโรค จิตเวช', ['fund-psychiatry/index']);
                                        ?>                                        
                                    </li>                                    
                                </ul>
                            </li>            
-->                   

                        </ul>
                    </div><!--/end container-->
                </div><!--/navbar-collapse-->
            </div>
            <!--=== End Header ===-->
            <!--</nav>-->

            <div class="wrapper page-option-v1"> 
                <?=
                Breadcrumbs::widget([
                    'options' => ['class' => 'pull-right breadcrumb'],
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],])
                ?>                
                <?= $content ?>
            </div><!--/wrapper-->

            <!--=== Footer Version 1 ===-->
            <div class="footer-v1">
                <div class="footer">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3">
                                <a href="#" class="footer"><img src="<?= $baseUrl ?>/assets/img/1.jpeg"  alt=""></a>
                                <p>ศูนย์คอมพิวเตอร์ รพ.นางรอง.</p>
                            </div>
                        </div>
                    </div>
                </div><!--/footer-->

                <div class="copyright">
                    <div class="container">
                        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

                        <p class="pull-right"><?= Yii::powered() ?></p>
                    </div>
                </div><!--/copyright-->
            </div>
            <!--=== End Footer Version 1 ===-->
        </div><!--/wrapper-->
        <?php $this->endBody() ?>
        <script type="text/javascript">
            jQuery(document).ready(function () {
                App.init();
                OwlCarousel.initOwlCarousel();
                StyleSwitcher.initStyleSwitcher();
                ParallaxSlider.initParallaxSlider();
                Masking.initMasking();
                Datepicker.initDatepicker();
                Validation.initValidation();
                StyleSwitcher.initStyleSwitcher();
            });

        </script>   
    </body>
</html>
<?php $this->endPage() ?>
