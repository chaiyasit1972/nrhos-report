<?php

namespace frontend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\data\ArrayDataProvider;
use yii\helpers\ArrayHelper;

use frontend\models\Formmodel;

class IpdEentController extends Controller
{
    public $mText = "งานผู้ป่วยใน (ตาหูคอจมูก ตึกผู้ป่วย 5/3)";
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
        $names="งานผู้ป่วยใน (ตาหูคอจมูก ตึกผู้ป่วย 5/3)"; 
         return $this -> render('/site/ipd-eent/index',['mText'=>$this->mText,'names'=>$names]);
    } 
    public function actionEent1Index() {
        $model = new Formmodel();
        $names="รายงาน 10 อันดับโรคผู้ป่วยใน ตา หู คอ จมูก (ทั้งหมด , แยกแผนก)"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
               $spcl = $model->select1;
               if($spcl=='00'){
                 $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=eent/";   
                 return $this->redirect($url.'eent1.mrt&d1='.$date1.'&d2='.$date2);  
               }else{
                 $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=eent/";   
                 return $this->redirect($url.'eent1a.mrt&d1='.$date1.'&d2='.$date2.'&sp='.$spcl);                     
               }

        }
            return $this -> render('/site/ipd-eent/eent2-index',['mText'=>$this->mText,'names'=>$names,'model' => $model]);
    }  
    public function actionEent2Index() {
        $model = new Formmodel();
        $names="รายงานจำนวนผู้ป่วยใน ตา หู คอ จมูก(eent) ทั้งหมด , แยกแผนก"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
                 $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=eent/";   
                 return $this->redirect($url.'eent2.mrt&d1='.$date1.'&d2='.$date2);  

        }
            return $this -> render('/site/ipd-eent/eent1-index',['mText'=>$this->mText,'names'=>$names,'model' => $model]);
    }      
    public function actionEent3Index() {
        $model = new Formmodel();
        $names="รายงาน Readmit 28 วัน ป่วยใน (eent) ทั้งหมด , แยกตามกลุ่มโรค"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
               $sele = $model->select1;
               switch ($sele) {
                      case '0':    // ทั้งหมด 
                            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=eent/";   
                            return $this->redirect($url.'eent3a.mrt&d1='.$date1.'&d2='.$date2); 
                      break;
                      case '1':    // H160 
                            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=eent/";   
                            return $this->redirect($url.'eent3b.mrt&d1='.$date1.'&d2='.$date2); 
                      break;
                      case '2':    // R040
                            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=eent/";   
                            return $this->redirect($url.'eent3c.mrt&d1='.$date1.'&d2='.$date2); 
                      break;
                      case '3':    // ICD9 280-289 
                            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=eent/";   
                            return $this->redirect($url.'eent3d.mrt&d1='.$date1.'&d2='.$date2); 
                      break;
                      case '4':    // ICD9 060-069
                            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=eent/";   
                            return $this->redirect($url.'eent3e.mrt&d1='.$date1.'&d2='.$date2); 
                      break;  
                      case '5':    // UAO 
                            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=eent/";   
                            return $this->redirect($url.'eent3f.mrt&d1='.$date1.'&d2='.$date2); 
                      break;                  
                      default:
                      break;
               }
 

        }
            return $this -> render('/site/ipd-eent/eent4-index',['mText'=>$this->mText,'names'=>$names,'model' => $model]);
    } 
    public function actionEent4Index() {
        $model = new Formmodel();
        $names="รายงานการส่งต่อ(Refer Out) ป่วยใน ตา หู คอ จมูก(eent)"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
                 $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=eent/";   
                 return $this->redirect($url.'eent4.mrt&d1='.$date1.'&d2='.$date2);  

        }
            return $this -> render('/site/ipd-eent/eent1-index',['mText'=>$this->mText,'names'=>$names,'model' => $model]);
    } 
    public function actionEent5Index() {
        $model = new Formmodel();
        $names="รายงานผู้ป่วยเสียชีวิต(Dead) ป่วยใน ตา หู คอ จมูก(eent)"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
                 $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=eent/";   
                 return $this->redirect($url.'eent5.mrt&d1='.$date1.'&d2='.$date2);  

        }
            return $this -> render('/site/ipd-eent/eent1-index',['mText'=>$this->mText,'names'=>$names,'model' => $model]);
    } 
    public function actionEent6Index() {
        $model = new Formmodel();
        $names="รายงานสถานะการจำหน่ายผู้ป่วยใน ตา หู คอ จมูก(eent)"; 
        $sql1 = "select '00' as dchtype, 'เลือกทั้งหมด' as name  union all select dchtype, name from dchtype";
        $locations =  \Yii::$app->db1->createCommand($sql1)->queryAll();    
        $listData=ArrayHelper::map($locations,'dchtype','name');           
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
               $dch = $model->select1;
               switch ($dch) {
                      case '00':
                        $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=eent/";   
                        return $this->redirect($url.'eent6a.mrt&d1='.$date1.'&d2='.$date2);  
                      break;
                      default:
                        $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=eent/";   
                        return $this->redirect($url.'eent6b.mrt&d1='.$date1.'&d2='.$date2.'&dch='.$dch);                            
                      break;
               }


        }
            return $this -> render('/site/ipd-eent/eent5-index',['mText'=>$this->mText,'names'=>$names,'model' => $model,'data' => $listData]);
    }     
    public function actionEent7Index() {
        $model = new Formmodel();
        $names="รายงานผู้ป่วยในได้เข้ารับผ่าตัดแผนก หู คอ จมูก ตามชนิดของการผ่าตัด(operation type)"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
               $op = $model->select1;
               switch ($op) {
                      case '0':
                        $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=eent/";   
                        return $this->redirect($url.'eent7a.mrt&d1='.$date1.'&d2='.$date2);  
                      break;
                      default:
                        $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=eent/";   
                        return $this->redirect($url.'eent7b.mrt&d1='.$date1.'&d2='.$date2.'&op='.$op);                            
                      break;
               }

        }
            return $this -> render('/site/ipd-eent/eent3-index',['mText'=>$this->mText,'names'=>$names,'model' => $model]);
    }    
    public function actionEent8Index() {
        $model = new Formmodel();
        $names="รายงานผู้ป่วยใน หู คอ จมูก(eent) ย้ายรักษาที่ ICU"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
                 $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=eent/";   
                 return $this->redirect($url.'eent8.mrt&d1='.$date1.'&d2='.$date2);  

        }
            return $this -> render('/site/ipd-eent/eent1-index',['mText'=>$this->mText,'names'=>$names,'model' => $model]);
    }     
    public function actionEent9Index() {
        $model = new Formmodel();
        $names="รายงานผู้ป่วยนอก หู คอ จมูก รับบริการ/รับบริการหัตการที่ห้องอุบัติเหตุและฉุกเฉิน"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
                 $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=eent/";   
                 return $this->redirect($url.'eent9.mrt&d1='.$date1.'&d2='.$date2);  

        }
            return $this -> render('/site/ipd-eent/eent1-index',['mText'=>$this->mText,'names'=>$names,'model' => $model]);
    }     
    public function actionEent10Index() {
        $model = new Formmodel();
        $names="รายงานผู้ป่วยนอก หู คอ จมูก ได้รับการตรวจการได้ยิน Routine Hearing Test(Audiogram)"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
                 $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=eent/";   
                 return $this->redirect($url.'eent10.mrt&d1='.$date1.'&d2='.$date2);  

        }
            return $this -> render('/site/ipd-eent/eent1-index',['mText'=>$this->mText,'names'=>$names,'model' => $model]);
    }
    public function actionEent11Index() {
        $model = new Formmodel();
        $names="รายงานผู้ป่วยนอก หู คอ จมูก ได้รับเครื่องช่วยฟังสำหรับคนหูพิการ(เด็ก-ผู้ใหญ่)"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
                 $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=eent/";   
                 return $this->redirect($url.'eent11.mrt&d1='.$date1.'&d2='.$date2);  

        }
            return $this -> render('/site/ipd-eent/eent1-index',['mText'=>$this->mText,'names'=>$names,'model' => $model]);
    }    
    
}    