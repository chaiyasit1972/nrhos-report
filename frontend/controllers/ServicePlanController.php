<?php

namespace frontend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\data\ArrayDataProvider;
use yii\helpers\ArrayHelper;

use frontend\models\Formmodel;

class ServicePlanController extends Controller
{
    public $mText = "รายงานตัวชี้วัด Service Plan แยกปีงบประมาณ";
    public $sText = "งานบริการข้อมูล";
    public $mName = "รายงานตัวชี้วัด Service Plan "; 
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }
    public function actionIndex() {
        $model = new Formmodel();        
        $names="รายงานตัวชี้วัด Service Plan "; 
        if($model->load(Yii::$app->request->post())){
               $select1 = $model->select1;
               return $this->redirect(['preview', 'name' =>$names, 'select1' =>$select1]);                
        }
              return $this -> render('/site/service-plan/index',['mText'=>$this->mText,'names'=>$names,'model'=>$model,
                                           'sText'=>$this->sText]);        
    }
    public function actionPreview($name,$select1) {
        $names = "รายงานตัวชี้วัด Service Plan (ปีงบประมาณ 25" . $select1 . ")" ;
        $file = 'index'.$select1;
        return $this -> render('/site/service-plan/'.$file,['mText'=>$this->mText,'names'=>$names,
                             'select1'=>$select1,'sText'=>$this->sText,'mName'=>$this->mName]);
    }
    public function actionServicePlan601_1($year) {
        $model = new Formmodel();
        $names = "ร้อยละของผู้ป่วยที่ได้รับการผ่าตัดคลอดในโรงพยาบาลระดับ M2 ลงไป";
        $pct = "สาขาสูติกรรม";
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;        
            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=serviceplan/";   
            return $this->redirect($url.'serviceplan601_1.mrt&d1='.$date1.'&d2='.$date2);                  
        }
            return $this -> render('/site/service-plan/service-plan',['mText'=>$this->mText ."&nbsp;".$year,
                                           'pct'=>$pct,'names'=>$names,'model' => $model]);               
    }    
    public function actionServicePlan601_2($year) {
        $model = new Formmodel();
        $names = "อัตราตายของมารดาจากการตกเลือดหลังคลอด";
        $pct = "สาขาสูติกรรม";
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;        
            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=serviceplan/";   
            return $this->redirect($url.'serviceplan601_2.mrt&d1='.$date1.'&d2='.$date2);                  
        }
            return $this -> render('/site/service-plan/service-plan',['mText'=>$this->mText ."&nbsp;".$year,
                                           'pct'=>$pct,'names'=>$names,'model' => $model]);               
    }    
    public function actionServicePlan602_1($year) {
        $model = new Formmodel();
        $names = "อัตราป่วยตายโรคปอดบวมในเด็ก อายุ 1 เดือน ถึง 5 ปี บริบูรณ์ ลดลงร้อยละ 10";
        $pct = "สาขากุมารเวชกรรม";
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;        
            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=serviceplan/";   
            return $this->redirect($url.'serviceplan602_1.mrt&d1='.$date1.'&d2='.$date2);                  
        }
            return $this -> render('/site/service-plan/service-plan',['mText'=>$this->mText ."&nbsp;".$year,
                                           'pct'=>$pct,'names'=>$names,'model' => $model]);               
    }      
    
    public function actionServicePlan603_1($year) {
        $model = new Formmodel();
        $names = "อัตราตายจาก Sepsis/Septic Shock";  
        $pct = "สาขาอายุรกรรม";        
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=serviceplan/";   
            return $this->redirect($url.'serviceplan603_1.mrt&d1='.$date1.'&d2='.$date2);                  
        }
            return $this -> render('/site/service-plan/service-plan',['mText'=>$this->mText ."&nbsp;".$year,
                                           'pct'=>$pct,'names'=>$names,'model' => $model,'sText'=>$this->sText,'mName'=>$this->mName]);       

    }

    public function actionServicePlan603_2($year) {
        $model = new Formmodel();        
        $names = "อัตราตายจากการติดเชื้อในกระแสเลือด (Community Acquired Sepsis)";  
        $pct = "สาขาอายุรกรรม";
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=serviceplan/";   
            return $this->redirect($url.'serviceplan603_2.mrt&d1='.$date1.'&d2='.$date2);                  
        }
            return $this -> render('/site/service-plan/service-plan',['mText'=>$this->mText ."&nbsp;".$year,
                                           'pct'=>$pct, 'names'=>$names,'model' => $model,'sText'=>$this->sText,'mName'=>$this->mName]);              
    }    
    public function actionServicePlan603_3($year) {
        $model = new Formmodel();        
        $names = "อัตราการเกิด การกำเริบเฉียบพลันในผู้ป่วยโรคปอดอุดกั้นเรื้อรัง (PDX= J440,J441)";  
        $pct = "สาขาอายุรกรรม";
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=serviceplan/";   
            return $this->redirect($url.'serviceplan603_3.mrt&d1='.$date1.'&d2='.$date2);                  
        }
            return $this -> render('/site/service-plan/service-plan',['mText'=>$this->mText ."&nbsp;".$year,
                                           'pct'=>$pct, 'names'=>$names,'model' => $model,'sText'=>$this->sText,'mName'=>$this->mName]);              
    }  
    public function actionServicePlan603_4($year) {
        $model = new Formmodel();
        $names = "อัตราตายจาก Sepsis/Septic Shock เป้าหมาย <  &nbsp;ร้อยละ 30 (แยกโรค)";  
        $pct = "สาขาอายุรกรรม";        
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=serviceplan/";   
            return $this->redirect($url.'serviceplan603_4.mrt&d1='.$date1.'&d2='.$date2);                  
        }
            return $this -> render('/site/service-plan/service-plan',['mText'=>$this->mText ."&nbsp;".$year,
                                           'pct'=>$pct,'names'=>$names,'model' => $model,'sText'=>$this->sText,'mName'=>$this->mName]);       

    }    
    public function actionServicePlan603_5($year) {
        $model = new Formmodel();
        $names = "อัตราตายจากการติดเชื้อในกระแสเลือด (Community Acquired Sepsis) เป้าหมาย <  &nbsp;ร้อยละ 30 (Comorbidity)";  
        $pct = "สาขาอายุรกรรม";        
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=serviceplan/";   
            return $this->redirect($url.'serviceplan603_5.mrt&d1='.$date1.'&d2='.$date2);                  
        }
            return $this -> render('/site/service-plan/service-plan',['mText'=>$this->mText ."&nbsp;".$year,
                                           'pct'=>$pct,'names'=>$names,'model' => $model,'sText'=>$this->sText,'mName'=>$this->mName]);       

    }       
    
    public function actionServicePlan604_1($year) {
        $model = new Formmodel();
        $names = "อัตราไส้ติ่งแตกในผู้ป่วยไส้ติ่งอักเสบ";  
        $pct = "สาขาศัลยกรรม";
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=serviceplan/";   
            return $this->redirect($url.'serviceplan604_1.mrt&d1='.$date1.'&d2='.$date2);                  
        }
            return $this -> render('/site/service-plan/service-plan',['mText'=>$this->mText ."&nbsp;".$year,
                                           'pct'=>$pct,'names'=>$names,'model' => $model,'sText'=>$this->sText,'mName'=>$this->mName]);       
    }    
    public function actionServicePlan604_2($year) {
        $model = new Formmodel();
        $names = "ร้อยละของผู้ป่วยเสียชีวิตด้วยอาการปวดท้องเฉียบพลัน Acute Abdomen";  
        $pct = "สาขาศัลยกรรม";
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=serviceplan/";   
            return $this->redirect($url.'serviceplan604_2.mrt&d1='.$date1.'&d2='.$date2);                  
        }
            return $this -> render('/site/service-plan/service-plan',['mText'=>$this->mText ."&nbsp;".$year,
                                           'pct'=>$pct,'names'=>$names,'model' => $model,'sText'=>$this->sText,'mName'=>$this->mName]);       
    }    
    public function actionServicePlan604_3($year) {
        $model = new Formmodel();
        $names = "ร้อยละของผู้ป่วยที่เสียชีวิตด้วยอาการภาวะขาดเลือดที่แขนหรือขา";  
        $pct = "สาขาศัลยกรรม";
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=serviceplan/";   
            return $this->redirect($url.'serviceplan604_3.mrt&d1='.$date1.'&d2='.$date2);                  
        }
            return $this -> render('/site/service-plan/service-plan',['mText'=>$this->mText ."&nbsp;".$year,
                                           'pct'=>$pct,'names'=>$names,'model' => $model,'sText'=>$this->sText,'mName'=>$this->mName]);       
    }  
    public function actionServicePlan604_4($year) {
        $model = new Formmodel();
        $names = "ร้อยละของการถูกตัดขาตั้งแต่ระดับข้อเท้าขึ้นมาของผู้ป่วยภาวะขาดเลือดที่ขา";  
        $pct = "สาขาศัลยกรรม";
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=serviceplan/";   
            return $this->redirect($url.'serviceplan604_4.mrt&d1='.$date1.'&d2='.$date2);                  
        }
            return $this -> render('/site/service-plan/service-plan',['mText'=>$this->mText ."&nbsp;".$year,
                                           'pct'=>$pct,'names'=>$names,'model' => $model,'sText'=>$this->sText,'mName'=>$this->mName]);       
    }  

    public function actionServicePlan605_1($year) {
        $model = new Formmodel();
        $names = "อัตราของการดูแลรักษาของผู้ป่วยที่มีกระดูกหักไม่ซับซ้อนใน รพ.ระดับ M2 ลงไป เป้าหมาย >  &nbsp;ร้อยละ 70";  
        $pct = "สาขาศัลยกรรมกระดูก";
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
               $clinic = Yii::$app->request->post('clinic');
               $type = explode(',', $clinic);               
               if($type[0]==1){
                       $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=serviceplan/";   
                      return $this->redirect($url.'serviceplan605_1_1.mrt&d1='.$date1.'&d2='.$date2);   
               }else{
                       $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=serviceplan/";   
                      return $this->redirect($url.'serviceplan605_1_2.mrt&d1='.$date1.'&d2='.$date2);                    
               }
        }
            return $this -> render('/site/service-plan/service-plan-index',['mText'=>$this->mText ."&nbsp;".$year,
                                           'pct'=>$pct,'names'=>$names,'model' => $model,'sText'=>$this->sText,'mName'=>$this->mName]);       
    }      
    
    public function actionServicePlan606_1($year) {
        $model = new Formmodel();
        $names = "รายงาน 5 อันดับโรคของผู้ป่วยมะเร็ง(PDX C00-C99)";  
        $pct = "สาขามะเร็ง";
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
               $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=serviceplan/";   
               return $this->redirect($url.'serviceplan606_1.mrt&d1='.$date1.'&d2='.$date2);                    
   
        }
            return $this -> render('/site/service-plan/service-plan',['mText'=>$this->mText ."&nbsp;".$year,
                                           'pct'=>$pct,'names'=>$names,'model' => $model,'sText'=>$this->sText,'mName'=>$this->mName]);       
    }          
    
    
    public function actionServicePlan611_1($year) {
        $model = new Formmodel();
        $names = "อัตราตายผู้ป่วยติดเชื้อในกระแสเลือดแบบรุนแรงชนิด community-acquired";  
        $pct = "สาขาอายุรกรรม";        
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=serviceplan/";   
            return $this->redirect($url.'serviceplan611_1.mrt&d1='.$date1.'&d2='.$date2);                  
        }
            return $this -> render('/site/service-plan/service-plan',['mText'=>$this->mText ."&nbsp;".$year,'mName'=>$this->mName,
                                           'pct'=>$pct,'names'=>$names,'model' => $model,'sText'=>$this->sText]);       

    }    
    public function actionServicePlan611_2($year) {
        $model = new Formmodel();
        $names = "อัตราการเสียชีวิตในผู้ป่วย (sepsis / septic shock / severe sepsis)";  
        $pct = "สาขาอายุรกรรม";        
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=serviceplan/";   
            return $this->redirect($url.'serviceplan611_2.mrt&d1='.$date1.'&d2='.$date2);                  
        }
            return $this -> render('/site/service-plan/service-plan',['mText'=>$this->mText ."&nbsp;".$year,'mName'=>$this->mName,
                                           'pct'=>$pct,'names'=>$names,'model' => $model,'sText'=>$this->sText]);       

    }    
    public function actionServicePlan611_3($year) {
        $model = new Formmodel();
        $names = "อัตราการส่งต่อผู้ป่วย sepsis รักษาโรงพยาบาลที่มีศักญภาพสูงกว่า (refer out)";  
        $pct = "สาขาอายุรกรรม";        
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=serviceplan/";   
            return $this->redirect($url.'serviceplan611_3.mrt&d1='.$date1.'&d2='.$date2);                  
        }
            return $this -> render('/site/service-plan/service-plan',['mText'=>$this->mText ."&nbsp;".$year,'mName'=>$this->mName,
                                           'pct'=>$pct,'names'=>$names,'model' => $model,'sText'=>$this->sText]);       

    } 
    public function actionServicePlan611_4($year) {
        $model = new Formmodel();
        $names = "อัตราการส่งผู้ป่วย sepsis / septic shock / severe sepsis กลับ รพ.ลูกข่าย/รพช. (refer back)";  
        $pct = "สาขาอายุรกรรม";        
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=serviceplan/";   
            return $this->redirect($url.'serviceplan611_4.mrt&d1='.$date1.'&d2='.$date2);                  
        }
            return $this -> render('/site/service-plan/service-plan',['mText'=>$this->mText ."&nbsp;".$year,'mName'=>$this->mName,
                                           'pct'=>$pct,'names'=>$names,'model' => $model,'sText'=>$this->sText]);       

    } 
    public function actionServicePlan611_5($year) {
        $model = new Formmodel();
        $names = "อัตราการรับผู้ป่วย sepsis / septic shock / severe sepsis จาก รพ.ลูกข่าย/รพช. (refer in)";  
        $pct = "สาขาอายุรกรรม";        
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=serviceplan/";   
            return $this->redirect($url.'serviceplan611_5.mrt&d1='.$date1.'&d2='.$date2);                  
        }
            return $this -> render('/site/service-plan/service-plan',['mText'=>$this->mText ."&nbsp;".$year,'mName'=>$this->mName,
                                           'pct'=>$pct,'names'=>$names,'model' => $model,'sText'=>$this->sText]);       

    } 
    public function actionServicePlan611_6($year) {
        $model = new Formmodel();
        $names = "รายงานจำนวนผู้ป่วย sepsis / septic shock / severe sepsis ทั้งหมด/ตายทั้งหมด (ราย/เดือน) ";  
        $pct = "สาขาอายุรกรรม";              
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
               $sql="select  IF(MONTH(o.vstdate)>=10,YEAR(o.vstdate)+1 ,YEAR(o.vstdate))+543 AS yrs from ovstdiag o
                       where o.vstdate between '{$date1}' and '{$date2}' group by yrs;";
               $result = \Yii::$app->db1->createCommand($sql)->queryAll();      
               foreach ($result as $value) {
                      $yrs = $value['yrs'];                                              
               }                 
               $yra = $yrs-1;
            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=serviceplan/";   
            return $this->redirect($url.'serviceplan611_6.mrt&d1='.$date1.'&d2='.$date2.'&yrs='.$yrs.'&yra='.$yra);                  
        }
            return $this -> render('/site/service-plan/service-plan',['mText'=>$this->mText ."&nbsp;".$year,'mName'=>$this->mName,
                                           'pct'=>$pct,'names'=>$names,'model' => $model,'sText'=>$this->sText]);       

    }       
    public function actionServicePlan611_7($year) {
        $model = new Formmodel();
        $names = "รายงานจำนวนผู้ป่วย sepsis/septic shock (ส่งต่อ/ตาย/จำนวน ทั้งหมด) ";  
        $pct = "สาขาอายุรกรรม";        
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=serviceplan/";   
            return $this->redirect($url.'serviceplan611_7.mrt&d1='.$date1.'&d2='.$date2);                  
        }
            return $this -> render('/site/service-plan/service-plan',['mText'=>$this->mText ."&nbsp;".$year,'mName'=>$this->mName,
                                           'pct'=>$pct,'names'=>$names,'model' => $model,'sText'=>$this->sText]);       

    }     
    public function actionServicePlan611_8($year) {
        $model = new Formmodel();
        $names = "รายงานจำนวนผู้ป่วยติดเชื้อในกระแสเลือด( Community Acquired Sepsis)  (ส่งต่อ/ตาย/จำนวน ทั้งหมด) ";  
        $pct = "สาขาอายุรกรรม";        
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=serviceplan/";   
            return $this->redirect($url.'serviceplan611_8.mrt&d1='.$date1.'&d2='.$date2);                  
        }
            return $this -> render('/site/service-plan/service-plan',['mText'=>$this->mText ."&nbsp;".$year,'mName'=>$this->mName,
                                           'pct'=>$pct,'names'=>$names,'model' => $model,'sText'=>$this->sText]);       

    } 
    public function actionServicePlan611_9($year) {
        $model = new Formmodel();
        $names = "รายงานจำนวนผู้ป่วยติดเชื้อในกระแสเลือดแบบรุนแรงชนิด( Community Acquired ) (ส่งต่อ/ตาย/จำนวน ทั้งหมด) ";  
        $pct = "สาขาอายุรกรรม";        
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=serviceplan/";   
            return $this->redirect($url.'serviceplan611_9.mrt&d1='.$date1.'&d2='.$date2);                  
        }
            return $this -> render('/site/service-plan/service-plan',['mText'=>$this->mText ."&nbsp;".$year,'mName'=>$this->mName,
                                           'pct'=>$pct,'names'=>$names,'model' => $model,'sText'=>$this->sText]);       

    }            
    public function actionServicePlan612_1($year) {
        $model = new Formmodel();
        $names = "อัตราการคลอดก่อนกำหนด (อายุครรภ์น้อยกว่า 37 สัปดาห์)";  
        $pct = "สาขาสูติกรรม";        
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=serviceplan/";   
            return $this->redirect($url.'serviceplan612_1.mrt&d1='.$date1.'&d2='.$date2);                  
        }
            return $this -> render('/site/service-plan/service-plan',['mText'=>$this->mText ."&nbsp;".$year,'mName'=>$this->mName,
                                           'pct'=>$pct,'names'=>$names,'model' => $model,'sText'=>$this->sText]);       
    }      
    public function actionServicePlan612_2($year) {
        $model = new Formmodel();
        $names = "อัตราตายมารดาจากการตกเลือดหลังคลอด(PPH)";  
        $pct = "สาขาสูติกรรม";        
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=serviceplan/";   
            return $this->redirect($url.'serviceplan612_2.mrt&d1='.$date1.'&d2='.$date2);                  
        }
            return $this -> render('/site/service-plan/service-plan',['mText'=>$this->mText ."&nbsp;".$year,'mName'=>$this->mName,
                                           'pct'=>$pct,'names'=>$names,'model' => $model,'sText'=>$this->sText]);       
    }   
    public function actionServicePlan612_3($year) {
        $model = new Formmodel();
        $names = "อัตรามารดาตกเลือดหลังคลอด(PPH)";  
        $pct = "สาขาสูติกรรม";        
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=serviceplan/";   
            return $this->redirect($url.'serviceplan612_3.mrt&d1='.$date1.'&d2='.$date2);                  
        }
            return $this -> render('/site/service-plan/service-plan',['mText'=>$this->mText ."&nbsp;".$year,'mName'=>$this->mName,
                                           'pct'=>$pct,'names'=>$names,'model' => $model,'sText'=>$this->sText]);       
    }       
    
    
    public function actionServicePlan613_1($year) {
        $model = new Formmodel();
        $names = "อัตราป่วยตายโรคปอดบวมในเด็ก อายุ ๑ เดือน – ๕ ปีบริบูรณ์";  
        $pct = "สาขากุมารเวชกรรม";        
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=serviceplan/";   
            return $this->redirect($url.'serviceplan613_1.mrt&d1='.$date1.'&d2='.$date2);                  
        }
            return $this -> render('/site/service-plan/service-plan',['mText'=>$this->mText ."&nbsp;".$year,'mName'=>$this->mName,
                                           'pct'=>$pct,'names'=>$names,'model' => $model,'sText'=>$this->sText]);       
    }         
    
    public function actionServicePlan614_1($year) {
        $model = new Formmodel();
        $names = "อัตราผู้ป่วยที่มีกระดูกหักซ้ำภายหลังกระดูกสะโพกหัก";  
        $pct = "สาขาศัลยกรรมกระดูก";        
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=serviceplan/";   
            return $this->redirect($url.'serviceplan614_1.mrt&d1='.$date1.'&d2='.$date2);                  
        }
            return $this -> render('/site/service-plan/service-plan',['mText'=>$this->mText ."&nbsp;".$year,'mName'=>$this->mName,
                                           'pct'=>$pct,'names'=>$names,'model' => $model,'sText'=>$this->sText]);       
    }     
    public function actionServicePlan614_2($year) {
        $model = new Formmodel();
        $names = "อัตราการผ่าตัดแบบ Early Surgery";  
        $pct = "สาขาศัลยกรรมกระดูก";        
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=serviceplan/";   
            return $this->redirect($url.'serviceplan614_2.mrt&d1='.$date1.'&d2='.$date2);                  
        }
            return $this -> render('/site/service-plan/service-plan',['mText'=>$this->mText ."&nbsp;".$year,'mName'=>$this->mName,
                                           'pct'=>$pct,'names'=>$names,'model' => $model,'sText'=>$this->sText]);       
    }      
    
    public function actionServicePlan615_1($year) {
        $model = new Formmodel();
        $names = "รายงานจำนวนผู้ป่วยศัลยกรรมตามการวินิจฉัยโรค(ตามรหัส ICD-10) ที่ได้รับการผ่าตัด(หัตถการ)";  
        $pct = "สาขาศัลยกรรม";        
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=serviceplan/";   
            return $this->redirect($url.'serviceplan615_1.mrt&d1='.$date1.'&d2='.$date2);                  
        }
            return $this -> render('/site/service-plan/service-plan',['mText'=>$this->mText ."&nbsp;".$year,'mName'=>$this->mName,
                                           'pct'=>$pct,'names'=>$names,'model' => $model,'sText'=>$this->sText]);       
    }      
    
    
    
    public function actionServicePlan61a($year) {
        $model = new Formmodel();
        $names = "รายงานอัตราการครองเตียง";  
        $pct = "";        
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
               $bed = $model->text1;
            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=serviceplan/";   
            return $this->redirect($url.'serviceplan61A.mrt&d1='.$date1.'&d2='.$date2.'&bed='.$bed);                  
        }
            return $this -> render('/site/service-plan/service-plant',['mText'=>$this->mText ."&nbsp;".$year,'mName'=>$this->mName,
                                           'pct'=>$pct,'names'=>$names,'model' => $model,'sText'=>$this->sText]);       
    }  
    public function actionServicePlan61b($year) {
        $model = new Formmodel();
        $names = "ค่า CMI";  
        $pct = "";        
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=serviceplan/";   
            return $this->redirect($url.'serviceplan61B.mrt&d1='.$date1.'&d2='.$date2);                  
        }
            return $this -> render('/site/service-plan/service-plan',['mText'=>$this->mText ."&nbsp;".$year,'mName'=>$this->mName,
                                           'pct'=>$pct,'names'=>$names,'model' => $model,'sText'=>$this->sText]);       
    } 
    public function actionServicePlan61c($year) {
        $model = new Formmodel();
        $names = "อัตราการ Refer Out ผู้ป่วยใน ที่มีค่า RW < 0.5  ไปรพ.บุรีรัมย์";  
        $pct = "";        
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=serviceplan/";   
            return $this->redirect($url.'serviceplan61C.mrt&d1='.$date1.'&d2='.$date2);                  
        }
            return $this -> render('/site/service-plan/service-plan',['mText'=>$this->mText ."&nbsp;".$year,'mName'=>$this->mName,
                                           'pct'=>$pct,'names'=>$names,'model' => $model,'sText'=>$this->sText]);       
    } 
    
    
}