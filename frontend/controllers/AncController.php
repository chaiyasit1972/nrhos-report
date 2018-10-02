<?php

namespace frontend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\data\ArrayDataProvider;
use yii\helpers\ArrayHelper;

use frontend\models\Formmodel;

class AncController extends Controller
{
    public $mText = "คลินิกฝากครรภ์หญิงตั้งครรภ์ (ANC)";
    public $sText = "งานคลินิกพิเศษ";
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
        $names="คลินิกฝากครรภ์หญิงตั้งครรภ์ (ANC)"; 
         return $this -> render('/site/anc/index',['mText'=>$this->mText,'names'=>$names,'sText'=>$this->sText]);
    } 
     public function actionIndex1() {
        $names="รายงานการให้บริการหญิงตั้งครรภ์(ANC)";
        $model = new Formmodel();
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
               $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=anc/";   
               return $this->redirect($url.'report1.mrt&d1='.$date1.'&d2='.$date2);                       
        }
            return $this -> render('/site/anc/index1',['mText'=>$this->mText,'names'=>$names,'model' => $model,'sText'=>$this->sText]);
}
     public function actionIndex2() {
        $names="รายงานโรงเรียนพ่อแม่";
        $model = new Formmodel();
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
               $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=anc/";   
               return $this->redirect($url.'report2.mrt&d1='.$date1.'&d2='.$date2);                       
        }
            return $this -> render('/site/anc/index1',['mText'=>$this->mText,'names'=>$names,'model' => $model,'sText'=>$this->sText]);
}
     public function actionIndex3() {
        $names="รายงานการคลอด ";
        $model = new Formmodel();
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
               $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=anc/";   
               return $this->redirect($url.'report3.mrt&d1='.$date1.'&d2='.$date2);                       
        }
            return $this -> render('/site/anc/index1',['mText'=>$this->mText,'names'=>$names,'model' => $model,'sText'=>$this->sText]);
}
     public function actionIndex4() {
        $names="รายงานการรับส่งต่อ(Refer-In)ผู้ป่วยแผนกสูติกรรม(OPD+ANC)";
        $model = new Formmodel();
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
               $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=anc/";   
               return $this->redirect($url.'report4.mrt&d1='.$date1.'&d2='.$date2);                       
        }
            return $this -> render('/site/anc/index1',['mText'=>$this->mText,'names'=>$names,'model' => $model,'sText'=>$this->sText]);
}
     public function actionIndex5() {
        $names="รายงานการรับส่งต่อ(Refer-Out)ผู้ป่วยแผนกสูติกรรม(OPD+ANC)";
        $model = new Formmodel();
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
               $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=anc/";   
               return $this->redirect($url.'report5.mrt&d1='.$date1.'&d2='.$date2);                       
        }
            return $this -> render('/site/anc/index1',['mText'=>$this->mText,'names'=>$names,'model' => $model,'sText'=>$this->sText]);
}


}    

