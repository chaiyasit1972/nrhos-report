<?php

namespace frontend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\data\ArrayDataProvider;
use yii\helpers\ArrayHelper;

use frontend\models\Formmodel;

class ErController extends Controller
{
    public $mText = "งานอุบัติเหตุและฉุกเฉิน";
    public $sText = "งานผู้ป่วยนอก";    
    public $kText = "รายงานตัวชีวัดปีงบประมาณ 2561";
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
        $names="งานอุบัติเหตุและฉุกเฉิน"; 
         return $this -> render('/site/er/index',['mText'=>$this->mText,'names'=>$names,'sText' =>$this->sText]);
    } 
    public function actionEr1() {
        $model = new Formmodel();
        $names="รายงานส่งต่อผู้ป่วย(refer out) with ambulance"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;          
            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=er/";   
            return $this->redirect($url.'er1.mrt&d1='.$date1.'&d2='.$date2);                  
             // return $this->redirect(['preview','name'=>$names,'d1'=>$date1,'d2'=>$date2]);
        }
            return $this -> render('/site/er/er1-index',['mText'=>$this->mText,'names'=>$names,'model' => $model]);
    }    
    public function actionEr2() {
        $model = new Formmodel();
        $names="รายงานส่งต่อผู้ป่วย(refer out) ภายในจังหวัด(with ambulance/ไปเอง)"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;     
               $check = $model->radio_list;
               if ($check==0){               
               $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=er/";   
               return $this->redirect($url.'er2_1.mrt&d1='.$date1.'&d2='.$date2);                     
               }else{
               $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=er/";   
               return $this->redirect($url.'er2_2.mrt&d1='.$date1.'&d2='.$date2);                           
               }
        }
            return $this -> render('/site/er/er2-index',['mText'=>$this->mText,'names'=>$names,'model' => $model]);
    }     
    public function actionEr3() {
        $model = new Formmodel();
        $names="รายงานส่งต่อผู้ป่วย(refer out) ภายในเขต9 (with ambulance/ไปเอง)"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;     
               $check = $model->radio_list;
               if ($check==0){               
               $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=er/";   
               return $this->redirect($url.'er3_1.mrt&d1='.$date1.'&d2='.$date2);                     
               }else{
               $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=er/";   
               return $this->redirect($url.'er3_2.mrt&d1='.$date1.'&d2='.$date2);                           
               }
        }
            return $this -> render('/site/er/er3-index',['mText'=>$this->mText,'names'=>$names,'model' => $model]);
    }  
    public function actionEr4() {
        $model = new Formmodel();
        $names="รายงานส่งต่อผู้ป่วย(refer out) นอกเขต 9 (ขอนแก่น,อื่นๆ) with Ambulance/ไปเอง"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;     
               $check = $model->radio_list;
               if ($check==0){               
               $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=er/";   
               return $this->redirect($url.'er4_1.mrt&d1='.$date1.'&d2='.$date2);                     
               }else{
               $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=er/";   
               return $this->redirect($url.'er4_2.mrt&d1='.$date1.'&d2='.$date2);                           
               }
        }
            return $this -> render('/site/er/er4-index',['mText'=>$this->mText,'names'=>$names,'model' => $model]);
    }    
    public function actionEr5() {
        $model = new Formmodel();
        $names="รายงานส่งต่อผู้ป่วย(refer out) ส่วนกลาง (ก.ท.ม.) with Ambulance/ไปเอง"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;     
               $check = $model->radio_list;
               if ($check==0){               
               $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=er/";   
               return $this->redirect($url.'er5_1.mrt&d1='.$date1.'&d2='.$date2);                     
               }else{
               $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=er/";   
               return $this->redirect($url.'er5_2.mrt&d1='.$date1.'&d2='.$date2);                           
               }
        }
            return $this -> render('/site/er/er5-index',['mText'=>$this->mText,'names'=>$names,'model' => $model]);
    }     
    public function actionEr6() {
        $model = new Formmodel();
        $names="รายงานสาเหตุการส่งต่อ (with Ambulance/ไปเอง)"; 
        $sql1="select concat(rfrcs,',',name) id,name as names from rfrcs;";
        $locations = \Yii::$app->db1->createCommand($sql1)->queryAll();    
        $listData=ArrayHelper::map($locations,'id','names');          
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;     
               $check = $model->radio_list;
               $rfrcs_c = explode(',', $model->select1);$rfrcs=$rfrcs_c[0];$rfrcs_n=$rfrcs_c[1];
               if ($check==0){               
               $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=er/";   
               return $this->redirect($url.'er6_1.mrt&d1='.$date1.'&d2='.$date2.'&c1='.$rfrcs.'&n1='.$rfrcs_n);                     
               }else{
               $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=er/";   
               return $this->redirect($url.'er6_2.mrt&d1='.$date1.'&d2='.$date2.'&c1='.$rfrcs.'&n1='.$rfrcs_n);                           
               }
        }
            return $this -> render('/site/er/er6-index',['mText'=>$this->mText,'names'=>$names,'model' => $model,'data'=>$listData]);
    } 
    public function actionEr7() {
        $model = new Formmodel();
        $names="รายงานการส่งต่อผู้ป่วย on ETT (with Ambulance/ไปเอง)"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;     
               $check = $model->radio_list;
               if ($check==0){               
               $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=er/";   
               return $this->redirect($url.'er7_1.mrt&d1='.$date1.'&d2='.$date2);                     
               }else{
               $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=er/";   
               return $this->redirect($url.'er7_2.mrt&d1='.$date1.'&d2='.$date2);                           
               }
        }
            return $this -> render('/site/er/er7-index',['mText'=>$this->mText,'names'=>$names,'model' => $model]);
    }  
    public function actionEr8() {
        $model = new Formmodel();
        $names="รายงานการส่งต่อผู้ป่วย  high-volume (with Ambulance/ไปเอง)"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;     
               $check = $model->radio_list;
               if ($check==0){               
               $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=er/";   
               return $this->redirect($url.'er8_1.mrt&d1='.$date1.'&d2='.$date2);                     
               }else{
               $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=er/";   
               return $this->redirect($url.'er8_2.mrt&d1='.$date1.'&d2='.$date2);                           
               }
        }
            return $this -> render('/site/er/er8-index',['mText'=>$this->mText,'names'=>$names,'model' => $model]);
    }    
    public function actionEr9() {
        $model = new Formmodel();
        $names="รายงานการส่งต่อผู้ป่วย  high-risk (with Ambulance/ไปเอง)"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;     
               $check = $model->radio_list;
               if ($check==0){               
               $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=er/";   
               return $this->redirect($url.'er9_1.mrt&d1='.$date1.'&d2='.$date2);                     
               }else{
               $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=er/";   
               return $this->redirect($url.'er9_2.mrt&d1='.$date1.'&d2='.$date2);                           
               }
        }
            return $this -> render('/site/er/er9-index',['mText'=>$this->mText,'names'=>$names,'model' => $model]);
    }     
    public function actionEr10() {
        $model = new Formmodel();
        $names="รายงานการส่งต่อผู้ป่วย แยกตามสถานบริการส่งต่อ(with Ambulance/ไปเอง)"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;     
               $check = $model->radio_list;
               if ($check==0){               
               $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=er/";   
               return $this->redirect($url.'er10_1.mrt&d1='.$date1.'&d2='.$date2);                     
               }else{
               $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=er/";   
               return $this->redirect($url.'er10_2.mrt&d1='.$date1.'&d2='.$date2);                           
               }
        }
            return $this -> render('/site/er/er10-index',['mText'=>$this->mText,'names'=>$names,'model' => $model]);
    }  
    public function actionEr11() {
        $model = new Formmodel();
        $names="รายงานการส่งต่อผู้ป่วย แยกตามแผนก (with Ambulance/ไปเอง)"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;     
               $check = $model->radio_list;
               if ($check==0){               
               $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=er/";   
               return $this->redirect($url.'er11_1.mrt&d1='.$date1.'&d2='.$date2);                     
               }else{
               $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=er/";   
               return $this->redirect($url.'er11_2.mrt&d1='.$date1.'&d2='.$date2);                           
               }
        }
            return $this -> render('/site/er/er11-index',['mText'=>$this->mText,'names'=>$names,'model' => $model]);
    }   
    public function actionEr12() {
        $model = new Formmodel();
        $names="รายงานการส่งต่อผู้ป่วย แยกตามตึกผู้ป่วย (with Ambulance/ไปเอง)"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;     
               $check = $model->radio_list;
               if ($check==0){               
               $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=er/";   
               return $this->redirect($url.'er12_1.mrt&d1='.$date1.'&d2='.$date2);                     
               }else{
               $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=er/";   
               return $this->redirect($url.'er12_2.mrt&d1='.$date1.'&d2='.$date2);                           
               }
        }
            return $this -> render('/site/er/er12-index',['mText'=>$this->mText,'names'=>$names,'model' => $model]);
    }  
    public function actionEr13() {
        $model = new Formmodel();
        $names=" รายงานการรับการส่งต่อผู้ป่วย (refer in) ตามการวินิจฉัย"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;     
               $check = $model->radio_list;     
               $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=er/";   
               return $this->redirect($url.'er13.mrt&d1='.$date1.'&d2='.$date2);                     
        }
            return $this -> render('/site/er/er13-index',['mText'=>$this->mText,'names'=>$names,'model' => $model]);
    }   
    public function actionEr14() {
        $model = new Formmodel();
        $names="รายงานผู้ป่วยอุบัติเหตุฉุกเฉินแยกตามกลุ่มหัตถการ"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;     
               $check = $model->radio_list;     
               $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=er/";   
               return $this->redirect($url.'er14.mrt&d1='.$date1.'&d2='.$date2);                     
        }
            return $this -> render('/site/er/er14-index',['mText'=>$this->mText,'names'=>$names,'model' => $model]);
    }   
    public function actionEr15() {
        $model = new Formmodel();
        $names="รายงานผู้ป่วย case ฉุกเฉิน ใน ER"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;      
               $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=er/";   
               return $this->redirect($url.'er15.mrt&d1='.$date1.'&d2='.$date2);                     
        }
            return $this -> render('/site/er/er15-index',['mText'=>$this->mText,'names'=>$names,'model' => $model]);
    }       
    public function actionEr16() {
        $model = new Formmodel();
        $names="รายงานส่งต่อผู้ป่วย(refer out) นอกเขต 9 แยกตามสิทธิ์"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;      
               $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=er/";   
               return $this->redirect($url.'er16.mrt&d1='.$date1.'&d2='.$date2);                     
        }
            return $this -> render('/site/er/er16-index',['mText'=>$this->mText,'names'=>$names,'model' => $model]);
    }          
    public function actionEr17() {
        $model = new Formmodel();
        $names="รายงานรับส่งต่อผู้ป่วย(refer in) แยกแผนก(PCT)/โรค"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;     
               $check = $model->radio_list;
               if ($check==1){               
               $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=er/";   
               return $this->redirect($url.'er17_1.mrt&d1='.$date1.'&d2='.$date2);                     
               }else{
               $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=er/";   
               return $this->redirect($url.'er17_2.mrt&d1='.$date1.'&d2='.$date2);                           
               }
        }
            return $this -> render('/site/er/er17-index',['mText'=>$this->mText,'names'=>$names,'model' => $model]);
    }       
    public function actionEr18() {
        $model = new Formmodel();
        $names="รายงานรับส่งต่อผู้ป่วย(refer in) RW <= 0.5 แยกแผนก(PCT)/โรค"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;      
               $check = $model->radio_list;
               if ($check==1){               
               $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=er/";   
               return $this->redirect($url.'er18_1.mrt&d1='.$date1.'&d2='.$date2);                     
               }else{
               $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=er/";   
               return $this->redirect($url.'er18_2.mrt&d1='.$date1.'&d2='.$date2);                           
               }                  
        }
            return $this -> render('/site/er/er17-index',['mText'=>$this->mText,'names'=>$names,'model' => $model]);
    }       
    public function actionEr19() {
        $model = new Formmodel();
        $names="รายงานส่งต่อผู้ป่วย(refer out เฉพาะ รพ.ที่มีศักยภาพสูงกว่า) แยกแผนก(PCT)/โรค"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;      
               $check = $model->radio_list;
               if ($check==1){               
               $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=er/";   
               return $this->redirect($url.'er19_1.mrt&d1='.$date1.'&d2='.$date2);                     
               }else{
               $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=er/";   
               return $this->redirect($url.'er19_2.mrt&d1='.$date1.'&d2='.$date2);                           
               }                    
        }
            return $this -> render('/site/er/er17-index',['mText'=>$this->mText,'names'=>$names,'model' => $model]);
    } 
    public function actionEr20() {
        $model = new Formmodel();
        $names="รายงานส่งต่อผู้ป่วย(refer out เฉพาะ รพ.ที่มีศักยภาพสูงกว่า) RW <= 0.5 แยกแผนก(PCT)/โรค"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;      
               $check = $model->radio_list;
               if ($check==1){               
               $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=er/";   
               return $this->redirect($url.'er20_1.mrt&d1='.$date1.'&d2='.$date2);                     
               }else{
               $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=er/";   
               return $this->redirect($url.'er20_2.mrt&d1='.$date1.'&d2='.$date2);                           
               }                
        }
            return $this -> render('/site/er/er17-index',['mText'=>$this->mText,'names'=>$names,'model' => $model]);
    } 
    public function actionEr21() {
        $model = new Formmodel();
        $names="รายงานส่งต่อผู้ป่วยจาก สาเหตุ 19 กลุ่มโรค(แยก refer out/ refer in)"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;      
               $check = $model->radio_list;
               if ($check==1){               
               $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=er/";   
               return $this->redirect($url.'er21_1.mrt&d1='.$date1.'&d2='.$date2);                     
               }else{
               $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=er/";   
               return $this->redirect($url.'er21_2.mrt&d1='.$date1.'&d2='.$date2);                           
               }                
        }
            return $this -> render('/site/er/er18-index',['mText'=>$this->mText,'names'=>$names,'model' => $model]);
    }
    public function actionEr22() {
        $model = new Formmodel();
        $names="รายงานผู้ป่วยที่ Admit จาก Er แล้วส่งต่อผู้ป่วยภายใน 6 ชั่วโมง"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;      
               $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=er/";   
               return $this->redirect($url.'er22.mrt&d1='.$date1.'&d2='.$date2);                     
        }
            return $this -> render('/site/er/er16-index',['mText'=>$this->mText,'names'=>$names,'model' => $model]);
    }  
    public function actionEr23() {
        $model = new Formmodel();
        $names="รายงานรับส่งต่อผู้ป่วย(refer in) ที่มีค่า RW <= 0.5 โรงพยาบาลเครือข่าย"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;      
               $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=er/";   
               return $this->redirect($url.'er23.mrt&d1='.$date1.'&d2='.$date2);                     
        }
            return $this -> render('/site/er/er16-index',['mText'=>$this->mText,'names'=>$names,'model' => $model]);
    }    
    public function actionEr24() {
        $model = new Formmodel();
        $names="รายงานรับส่งต่อผู้ป่วย(refer in) โรงพยาบาลเครือข่าย เพื่อทำ CT แล้วส่งต่อ รพ.แม่ข่าย'"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;      
               $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=er/";   
               return $this->redirect($url.'er24.mrt&d1='.$date1.'&d2='.$date2);                     
        }
            return $this -> render('/site/er/er16-index',['mText'=>$this->mText,'names'=>$names,'model' => $model]);
    }     
    public function actionEr25() {
        $model = new Formmodel();
        $names="รายงานระยะเวลาการดูแลผู้ป่วยอุบัติเหตุฉุกเฉินแยกตามระดับความรุนแรง(emergency_level)"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;      
               $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=er/";   
               return $this->redirect($url.'er25.mrt&d1='.$date1.'&d2='.$date2);                     
        }
            return $this -> render('/site/er/er16-index',['mText'=>$this->mText,'names'=>$names,'model' => $model]);
    }        
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    public function actionErKpi61Index() {
        $names = "รายงานตัวชีวัดปีงบประมาณ 2561" ;
        return $this -> render('/site/er/er-kpi61',['mText'=>$this->mText,'names'=>$names,'sText' => $this->sText]);        
    }
    public function actionKpi61Index1() {
        $model = new Formmodel();
        $names=" รายงานอัตราการเสียชีวิตผู้เจ็บป่วยวิกฤตฉุกเฉินภายใน 24 ชั่วโมง (< 12 %) "; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;      
               $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=er/";   
               return $this->redirect($url.'kpi61_1.mrt&d1='.$date1.'&d2='.$date2);                     
        }
            return $this -> render('/site/er/kpi61',['mText'=>$this->mText,'names'=>$names,'model' => $model, 
                                'sText' => $this->sText,'kText' => $this->kText]);
    }     
    public function actionKpi61Index2() {
        $model = new Formmodel();
        $names=" รายงานร้อยละของผู้เจ็บป่วยวิกฤตฉุกเฉินมาโดย EMS"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;      
               $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=er/";   
               return $this->redirect($url.'kpi61_2.mrt&d1='.$date1.'&d2='.$date2);                     
        }
            return $this -> render('/site/er/kpi61',['mText'=>$this->mText,'names'=>$names,'model' => $model, 
                                'sText' => $this->sText,'kText' => $this->kText]);
    }     
    public function actionKpi61Index3() {
        $model = new Formmodel();
        $names="รายงานอัตราการเสียชีวิตของผู้ป่วย Severe Trauma Brain Injury(Glasgow Coma Score 3 - 8)"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;      
               $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=er/";   
               return $this->redirect($url.'kpi61_3.mrt&d1='.$date1.'&d2='.$date2);                     
        }
            return $this -> render('/site/er/kpi61',['mText'=>$this->mText,'names'=>$names,'model' => $model, 
                                'sText' => $this->sText, 'kText' => $this->kText]);
    }     
    public function actionKpi61Index4() {
        $model = new Formmodel();
        $names="รายงานอัตราการเสียชีวิตของผู้ป่วย Moderate Trauma Brain Injury(Glasgow Coma Score 9 - 12)"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;      
               $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=er/";   
               return $this->redirect($url.'kpi61_4.mrt&d1='.$date1.'&d2='.$date2);                     
        }
            return $this -> render('/site/er/kpi61',['mText'=>$this->mText,'names'=>$names,'model' => $model, 
                                'sText' => $this->sText, 'kText' => $this->kText]);
    }       
    public function actionKpi61Index5() {
        $model = new Formmodel();
        $names="รายงานอัตราการเสียชีวิตของผู้ป่วย  Mild Trauma Brain Injury(Glasgow Coma Score 13 - 15)"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;      
               $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=er/";   
               return $this->redirect($url.'kpi61_5.mrt&d1='.$date1.'&d2='.$date2);                     
        }
            return $this -> render('/site/er/kpi61',['mText'=>$this->mText,'names'=>$names,'model' => $model, 
                                'sText' => $this->sText, 'kText' => $this->kText]);
    }       
    public function actionKpi61Index6() {
        $model = new Formmodel();
        $names="รายงานผู้ป่วย Trauma / Non Trauma"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;      
               $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=er/";   
               return $this->redirect($url.'kpi61_6.mrt&d1='.$date1.'&d2='.$date2);                     
        }
            return $this -> render('/site/er/kpi61',['mText'=>$this->mText,'names'=>$names,'model' => $model, 
                                'sText' => $this->sText, 'kText' => $this->kText]);
    }    
    public function actionKpi61Index7() {
        $model = new Formmodel();
        $names="อัตราการรอดชีวิตของผู้ป่วย OHCA"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;      
               $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=er/";   
               return $this->redirect($url.'kpi61_7.mrt&d1='.$date1.'&d2='.$date2);                     
        }
            return $this -> render('/site/er/kpi61',['mText'=>$this->mText,'names'=>$names,'model' => $model, 
                                'sText' => $this->sText, 'kText' => $this->kText]);
    } 
    public function actionKpi61Index8() {
        $model = new Formmodel();
        $names="ร้อยละผู้ป่วยของ รพ. ระดับ A,S ที่มีชีวิตรอดจนถึงรับไว้ใน รพ. (Survival to Hospital Admission)"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;      
               $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=er/";   
               return $this->redirect($url.'kpi61_8.mrt&d1='.$date1.'&d2='.$date2);                     
        }
            return $this -> render('/site/er/kpi61',['mText'=>$this->mText,'names'=>$names,'model' => $model, 
                                'sText' => $this->sText, 'kText' => $this->kText]);
    } 
    public function actionKpi61Index9() {
        $model = new Formmodel();
        $names="ร้อยละผู้ป่วยของ รพ. ระดับ F2,M1,M2 ที่มีชีวิตรอดจนถึงการนำส่ง (Survival to Refer)"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;      
               $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=er/";   
               return $this->redirect($url.'kpi61_9.mrt&d1='.$date1.'&d2='.$date2);                     
        }
            return $this -> render('/site/er/kpi61',['mText'=>$this->mText,'names'=>$names,'model' => $model, 
                                'sText' => $this->sText, 'kText' => $this->kText]);
    } 
    public function actionKpi61Index10() {
        $model = new Formmodel();
        $names="ร้อยละการส่งต่อผู้ป่วย(นอกเขตสุขภาพ) ลดลง"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;      
               $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=er/";   
               return $this->redirect($url.'kpi61_10.mrt&d1='.$date1.'&d2='.$date2);                     
        }
            return $this -> render('/site/er/kpi61',['mText'=>$this->mText,'names'=>$names,'model' => $model, 
                                'sText' => $this->sText, 'kText' => $this->kText]);
    } 
    
}    