<?php

namespace frontend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\data\ArrayDataProvider;
use yii\helpers\ArrayHelper;

use frontend\models\Formmodel;

class IpdOrthoPedicsController extends Controller
{
    public $mText = "อาคาร 4 ชั้น 5 (พิเศษ)";
    public $sText = "งานผู้ป่วยใน";
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
         $names = $this->mText;
         return $this -> render('/site/ipd-ortho-pedics/index',['mText'=>$this->mText,'names'=>$names, 'sText' =>$this->sText]);
    } 
     public function actionIndex1() {
        $model = new Formmodel();
        $names="รายงานยอดผู้ป่วยรับบริการด้วยอาการปวดเข่า(OA Knee) ทั้งหมด";          
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;           
            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ipd-ortho-pedics/";   
            return $this->redirect($url.'pedics1.mrt&d1='.$date1.'&d2='.$date2);                         

        }
            return $this -> render('/site/ipd-ortho-pedics/pedics1-index',['mText'=>$this->mText, 'sText' => $this->sText,
                                         'names'=>$names,'model' => $model]);
    } 
     public function actionIndex2() {
        $model = new Formmodel();
        $names="รายงานยอดผู้ป่วยด้วยอาการปวดเข่า(OA Knee) ได้รับการผ่าตัด ทั้งหมด"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ipd-ortho-pedics/";   
            return $this->redirect($url.'pedics2.mrt&d1='.$date1.'&d2='.$date2);                         

        }
            return $this -> render('/site/ipd-ortho-pedics/pedics1-index',['mText'=>$this->mText, 'sText' => $this->sText,
                                         'names'=>$names,'model' => $model]);
    } 
     public function actionIndex3() {
        $model = new Formmodel();
        $names="รายงานยอดผู้ป่วยได้รับการผ่าตัดทำ Total Knee Replacement (เฉพาะ อาคาร 4 ชั้น 5)"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ipd-ortho-pedics/";   
            return $this->redirect($url.'pedics3.mrt&d1='.$date1.'&d2='.$date2);                         

        }
            return $this -> render('/site/ipd-ortho-pedics/pedics1-index',['mText'=>$this->mText, 'sText' => $this->sText,
                                         'names'=>$names,'model' => $model]);
    } 
     public function actionIndex4() {
        $model = new Formmodel();
        $names="รายงานผู้ป่วย re-admit 28 วัน ด้วยโรคเดิมหลังผ่าตัด Total Knee Replacement (ทั้งหมด)"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ipd-ortho-pedics/";   
            return $this->redirect($url.'pedics4.mrt&d1='.$date1.'&d2='.$date2);                         

        }
            return $this -> render('/site/ipd-ortho-pedics/pedics1-index',['mText'=>$this->mText, 'sText' => $this->sText,
                                         'names'=>$names,'model' => $model]);
    }     
     public function actionIndex5() {
        $model = new Formmodel();
        $names="รายงานสรุปผลปริมาณงานผู้ป่วยใน(อาคาร 4 ชั้น 5)"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ipd-ortho-pedics/";   
            return $this->redirect($url.'pedics5.mrt&d1='.$date1.'&d2='.$date2);                         

        }
            return $this -> render('/site/ipd-ortho-pedics/pedics1-index',['mText'=>$this->mText, 'sText' => $this->sText,
                                         'names'=>$names,'model' => $model]);
    }        
     public function actionIndex6() {
        $model = new Formmodel();
        $names="รายงาน 5 อันดับโรคผู้ป่วยใน(อาคาร 4 ชั้น 5)"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ipd-ortho-pedics/";   
            return $this->redirect($url.'pedics6.mrt&d1='.$date1.'&d2='.$date2);                         

        }
            return $this -> render('/site/ipd-ortho-pedics/pedics1-index',['mText'=>$this->mText, 'sText' => $this->sText,
                                         'names'=>$names,'model' => $model]);    
}    
     public function actionIndex7() {
        $model = new Formmodel();
        $names="รายงาน 5 อันดับโรคการตายของผู้ป่วยใน(อาคาร 4 ชั้น 5)"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ipd-ortho-pedics/";   
            return $this->redirect($url.'pedics7.mrt&d1='.$date1.'&d2='.$date2);                         

        }
            return $this -> render('/site/ipd-ortho-pedics/pedics1-index',['mText'=>$this->mText, 'sText' => $this->sText,
                                         'names'=>$names,'model' => $model]);    
} 
     public function actionIndex8() {
        $model = new Formmodel();
        $names="รายงาน 5 อันดับโรคการส่งต่อ(refer-out)ของผู้ป่วยใน(อาคาร 4 ชั้น 5)"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ipd-ortho-pedics/";   
            return $this->redirect($url.'pedics8.mrt&d1='.$date1.'&d2='.$date2);                         

        }
            return $this -> render('/site/ipd-ortho-pedics/pedics1-index',['mText'=>$this->mText, 'sText' => $this->sText,
                                         'names'=>$names,'model' => $model]);    
} 
     public function actionIndex9() {
        $model = new Formmodel();
        $names="รายงานการกลับมารักษา(re-admit) 28 วันของผู้ป่วยใน(อาคาร 4 ชั้น 5)"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ipd-ortho-pedics/";   
            return $this->redirect($url.'pedics9.mrt&d1='.$date1.'&d2='.$date2);                         

        }
            return $this -> render('/site/ipd-ortho-pedics/pedics1-index',['mText'=>$this->mText, 'sText' => $this->sText,
                                         'names'=>$names,'model' => $model]);    
} 
     public function actionIndex10() {
        $model = new Formmodel();
        $names="รายงาน 5 อันดับโรคการกลับมารักษา(re-admit) 28 วันของผู้ป่วยใน(อาคาร 4 ชั้น 5)"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ipd-ortho-pedics/";   
            return $this->redirect($url.'pedics10.mrt&d1='.$date1.'&d2='.$date2);                         

        }
            return $this -> render('/site/ipd-ortho-pedics/pedics1-index',['mText'=>$this->mText, 'sText' => $this->sText,
                                         'names'=>$names,'model' => $model]);    
} 


}