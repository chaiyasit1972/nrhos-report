<?php

namespace frontend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\data\ArrayDataProvider;
use yii\helpers\ArrayHelper;

use frontend\models\Formmodel;

class PharInController extends Controller
{
    public $mText = "งานเภสัชกรรม(ห้องจ่ายยาผู้ป่วยใน)";
    public $sText = "งานผู้ป่วยนอก";       
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
        $names="งานเภสัชกรรม(ห้องจ่ายยาผู้ป่วยใน)"; 
         return $this -> render('/site/phar-in/index',['mText'=>$this->mText,'names'=>$names, 'sText' => $this->sText]);
    } 
    public function actionPharIn1Index() {
        $model = new Formmodel();
        $names="รายชื่อผู้ป่วยใช้ยาวัณโรค(ผป.ใน)"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=Phar_in/";   
            return $this->redirect($url.'Phar_in1.mrt&d1='.$date1.'&d2='.$date2);                     
        }
            return $this -> render('/site/phar-in/phar-in1-index',['mText'=>$this->mText,'names'=>$names,'model' => $model,
                                      'sText' => $this->sText]);
    }   
    public function actionPharIn2Index() {
        $model = new Formmodel();
        $names="รายงานรายการยากลับบ้าน(Hme)มูลค่าสูง เฉพาะยาฉีด"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=Phar_in/";   
            return $this->redirect($url.'Phar_in2.mrt&d1='.$date1.'&d2='.$date2);                     
        }
            return $this -> render('/site/phar-in/phar-in2-index',['mText'=>$this->mText,'names'=>$names,'model' => $model, 'sText' => $this->sText]);
    }       
    public function actionPharIn3Index() {
        $model = new Formmodel();
        $names="รายงานการใช้ยาเบาหวานในผู้ป่วย Admit"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=Phar_in/";   
            return $this->redirect($url.'Phar_in3.mrt&d1='.$date1.'&d2='.$date2);                     
        }
            return $this -> render('/site/phar-in/phar-in3-index',['mText'=>$this->mText,'names'=>$names,'model' => $model, 'sText' => $this->sText]);
    }      
    public function actionPharIn4Index() {
        $model = new Formmodel();
        $names="รายงานยาราคาสูงแจ้งคลังยา"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=Phar_in/";   
            return $this->redirect($url.'Phar_in4.mrt&d1='.$date1.'&d2='.$date2);                     
        }
            return $this -> render('/site/phar-in/phar-in4-index',['mText'=>$this->mText,'names'=>$names,'model' => $model, 'sText' => $this->sText]);
    }     
    public function actionPharIn5Index() {
        $model = new Formmodel();
        $names="รายงานเฝ้าระวังการใช้ยาในผู้ป่วยที่มีภาวะไตบกพร่อง"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=Phar_in/";   
            return $this->redirect($url.'Phar_in5.mrt&d1='.$date1.'&d2='.$date2);                     
        }
            return $this -> render('/site/phar-in/phar-in5-index',['mText'=>$this->mText,'names'=>$names,'model' => $model, 'sText' => $this->sText]);
    }       
    public function actionPharIn6Index() {
        $model = new Formmodel();
        $names="รายงานการใช้ยา Restricted Drug"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=Phar_in/";   
            return $this->redirect($url.'Phar_in6.mrt&d1='.$date1.'&d2='.$date2);                     
        }
            return $this -> render('/site/phar-in/phar-in6-index',['mText'=>$this->mText,'names'=>$names,'model' => $model, 'sText' => $this->sText]);
    }    
    public function actionPharIn7Index() {
        $model = new Formmodel();
        $names="รายงานการเกิด Drug Interaction"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=Phar_in/";   
            return $this->redirect($url.'Phar_in7.mrt&d1='.$date1.'&d2='.$date2);                     
        }
            return $this -> render('/site/phar-in/phar-in6-index',['mText'=>$this->mText,'names'=>$names,'model' => $model, 'sText' => $this->sText]);
    }      
    public function actionPharIn8Index() {
        $model = new Formmodel();
        $names="รายงานผู้ป่วยในที่จำหน่ายด้วยโรคเรื้อรัง(DM,HT,CKD)"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
               switch ($model->select1) {
                      case 1://dm
                        $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=Phar_in/";   
                        return $this->redirect($url.'Phar_in8_1.mrt&d1='.$date1.'&d2='.$date2);    
                       break;
                      case 2://ht
                        $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=Phar_in/";   
                        return $this->redirect($url.'Phar_in8_2.mrt&d1='.$date1.'&d2='.$date2);    
                       break;
                      case 3://ckd
                        $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=Phar_in/";   
                        return $this->redirect($url.'Phar_in8_3.mrt&d1='.$date1.'&d2='.$date2);    
                       break;                   
                       default:
                       break;
               }                  
        }
            return $this -> render('/site/phar-in/phar-in7-index',['mText'=>$this->mText,'names'=>$names,'model' => $model, 'sText' => $this->sText]);
    }       
    public function actionPharIn9Index() {
        $model = new Formmodel();
        $names="รายงานผู้ป่วยในที่ได้รับยา Warfarin"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=Phar_in/";   
            return $this->redirect($url.'Phar_in9.mrt&d1='.$date1.'&d2='.$date2);                     
        }
            return $this -> render('/site/phar-in/phar-in6-index',['mText'=>$this->mText,'names'=>$names,'model' => $model, 'sText' => $this->sText]);
    }    
    
    
}    

