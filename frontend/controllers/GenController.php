<?php

namespace frontend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\data\ArrayDataProvider;
use yii\helpers\ArrayHelper;

use frontend\models\Formmodel;
use common\models\Hospcode;
use common\models\SoRecv;

class GenController extends Controller
{    
    public $mText = "งานบริการข้อมูล";
    public $sText = "ข้อมูลระดับโรงพยาบาล";    
    public $dText = "ข้อมูลพื้นฐาน & ข้อมูลทั่วไป";
    public $gText = "ข้อมูลพื้นฐานทั่วไป";
    public $oText = "ข้อมูลพื้นฐานผู้ป่วยนอก";        
    public $iText = "ข้อมูลพื้นฐานผู้ป่วยใน";
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
        $names="ข้อมูลพื้นฐาน  & ข้อมูลทั่วไป"; 
         return $this -> render('/site/gen/index',['mText'=>$this->mText, 'sText' => $this->sText,'names'=>$names]);
    } 
    public function actionGenBasic0Index() {
        $names="รายงานปิรามิดประชากรในเขตรับผิดชอบ(บัญชี 1)";       
        $model = new Formmodel();
        $sql1 = "select hospcode as pcode, concat(if(hospital_type_id ='6','รพท.','รพ.สต.') , ' ',cast(name as char CHARACTER set utf8)) pname 
                      from hospcode where chwpart='31' and amppart='04' and hospital_type_id in('6','18')";
        $location = \Yii::$app->db1->createCommand($sql1)->queryAll(); 
        $listData = ArrayHelper::map($location,'pcode','pname');
        if(Yii::$app->request->post('pcode')){
               $cup = Yii::$app->request->post('pcode');
               $vill = Yii::$app->request->post('hospsub');
               return $this->redirect(['popu_preview1','name'=>$names,'s1'=>$cup,'s2'=>$vill]);
        }
            return $this -> render('/site/gen/gen-index',['sText'=>$this->sText,'names'=>$names, 'dText' => $this->dText ,'data' => $listData,
                                    'model' => $model,'gText'=>$this->gText,'mText'=>$this->mText]); 
 
    }    
    public function actionPopu_preview1($name,$s1,$s2){
        $names=$name;
        $db = "hosxp_".$s1;
        $vl = TRIM($s2);
        $station = Hospcode::find()->where(['hospcode'=>$s1,'chwpart'=>'31','amppart'=>'04','hospital_type_id'=>[6,18]])->all();
        foreach ($station as $value) {
              $type = $value->hospital_type_id=='6' ? 'รพท.'. '  ' .$value->name : 'รพ.สต.' . ' ' .$value->name;    
        }         
        $sql2 = "select hospsub, moo_name from so_recv where moo_id='{$vl}';";
        try {
            $rawD = \Yii::$app->db1->createCommand($sql2)->queryAll();
        } catch (\yii\db\Exception $e) {
            throw new \yii\web\ConflictHttpException('sql error');
        }         
        $count = count($rawD);
        if($count == 0){
            $village = "";
        }else{
            foreach ($rawD as $value1) {
               $village = $value1['hospsub'] == '10897' ? $value1['moo_name']:  "บ้าน". $value1['moo_name']; 
            }
        }    
        switch ($s1) {
               case '10897':
                   if(TRIM($s2)=='00'){
                      $sql1 = "
		select  '0-4' as pname, count(if(sex=1,1,null)) as man, count(if(sex=2,1,null)) feman from person where village_id !='9' and house_regist_type_id in ('1','3') and death !='Y'  
		and discharge_date is null and TIMESTAMPDIFF(YEAR,birthdate,CURDATE()) between 0 and 4
                             union all 
		select  '5-9' as pname, count(if(sex=1,1,null)) as man, count(if(sex=2,1,null)) feman from person where village_id !='9' and house_regist_type_id in ('1','3') and death !='Y'  
		and discharge_date is null and TIMESTAMPDIFF(YEAR,birthdate,CURDATE()) between 5 and 9
                             union all
		select  '10-14' as pname, count(if(sex=1,1,null)) as man, count(if(sex=2,1,null)) feman from person where village_id !='9' and house_regist_type_id in ('1','3') and death !='Y'  
		and discharge_date is null and TIMESTAMPDIFF(YEAR,birthdate,CURDATE()) between 10 and 14
                             union all
		select  '15-19' as pname, count(if(sex=1,1,null)) as man, count(if(sex=2,1,null)) feman from person where village_id !='9' and house_regist_type_id in ('1','3') and death !='Y'  
		and discharge_date is null and TIMESTAMPDIFF(YEAR,birthdate,CURDATE()) between 15 and 19
                             union all
		select  '20-24' as pname, count(if(sex=1,1,null)) as man, count(if(sex=2,1,null)) feman from person where village_id !='9' and house_regist_type_id in ('1','3') and death !='Y'  
		and discharge_date is null and TIMESTAMPDIFF(YEAR,birthdate,CURDATE()) between 20 and 24
                             union all
		select  '25-29' as pname, count(if(sex=1,1,null)) as man, count(if(sex=2,1,null)) feman from person where village_id !='9' and house_regist_type_id in ('1','3') and death !='Y'  
		and discharge_date is null and TIMESTAMPDIFF(YEAR,birthdate,CURDATE()) between 25 and 29
                             union all
		select  '30-34' as pname, count(if(sex=1,1,null)) as man, count(if(sex=2,1,null)) feman from person where village_id !='9' and house_regist_type_id in ('1','3') and death !='Y'  
		and discharge_date is null and TIMESTAMPDIFF(YEAR,birthdate,CURDATE()) between 30 and 34
                             union all
		select  '35-39' as pname, count(if(sex=1,1,null)) as man, count(if(sex=2,1,null)) feman from person where village_id !='9' and house_regist_type_id in ('1','3') and death !='Y'  
		and discharge_date is null and TIMESTAMPDIFF(YEAR,birthdate,CURDATE()) between 35 and 39
                             union all
		select  '40-44' as pname, count(if(sex=1,1,null)) as man, count(if(sex=2,1,null)) feman from person where village_id !='9' and house_regist_type_id in ('1','3') and death !='Y'  
		and discharge_date is null and TIMESTAMPDIFF(YEAR,birthdate,CURDATE()) between 40 and 44
                             union all
		select  '45-49' as pname, count(if(sex=1,1,null)) as man, count(if(sex=2,1,null)) feman from person where village_id !='9' and house_regist_type_id in ('1','3') and death !='Y'  
		and discharge_date is null and TIMESTAMPDIFF(YEAR,birthdate,CURDATE()) between 45 and 49
                             union all
		select  '50-54' as pname, count(if(sex=1,1,null)) as man, count(if(sex=2,1,null)) feman from person where village_id !='9' and house_regist_type_id in ('1','3') and death !='Y'  
		and discharge_date is null and TIMESTAMPDIFF(YEAR,birthdate,CURDATE()) between 50 and 54
                             union all
		select  '55-59' as pname, count(if(sex=1,1,null)) as man, count(if(sex=2,1,null)) feman from person where village_id !='9' and house_regist_type_id in ('1','3') and death !='Y'  
		and discharge_date is null and TIMESTAMPDIFF(YEAR,birthdate,CURDATE()) between 55 and 59
                             union all
		select  '60-64' as pname, count(if(sex=1,1,null)) as man, count(if(sex=2,1,null)) feman from person where village_id !='9' and house_regist_type_id in ('1','3') and death !='Y'  
		and discharge_date is null and TIMESTAMPDIFF(YEAR,birthdate,CURDATE()) between 60 and 64
                             union all
		select  '65-69' as pname, count(if(sex=1,1,null)) as man, count(if(sex=2,1,null)) feman from person where village_id !='9' and house_regist_type_id in ('1','3') and death !='Y'  
		and discharge_date is null and TIMESTAMPDIFF(YEAR,birthdate,CURDATE()) between 65 and 69
                             union all
		select  '70-74' as pname, count(if(sex=1,1,null)) as man, count(if(sex=2,1,null)) feman from person where village_id !='9' and house_regist_type_id in ('1','3') and death !='Y'  
		and discharge_date is null and TIMESTAMPDIFF(YEAR,birthdate,CURDATE()) between 70 and 74
                             union all
		select  '75-79' as pname, count(if(sex=1,1,null)) as man, count(if(sex=2,1,null)) feman from person where village_id !='9' and house_regist_type_id in ('1','3') and death !='Y'  
		and discharge_date is null and TIMESTAMPDIFF(YEAR,birthdate,CURDATE()) between 75 and 79
                             union all
		select  '80-84' as pname, count(if(sex=1,1,null)) as man, count(if(sex=2,1,null)) feman from person where village_id !='9' and house_regist_type_id in ('1','3') and death !='Y'  
		and discharge_date is null and TIMESTAMPDIFF(YEAR,birthdate,CURDATE()) between 80 and 84
                             union all
		select  '85-89' as pname, count(if(sex=1,1,null)) as man, count(if(sex=2,1,null)) feman from person where village_id !='9' and house_regist_type_id in ('1','3') and death !='Y'  
		and discharge_date is null and TIMESTAMPDIFF(YEAR,birthdate,CURDATE()) between 85 and 89
                             union all
		select  '90-94' as pname, count(if(sex=1,1,null)) as man, count(if(sex=2,1,null)) feman from person where village_id !='9' and house_regist_type_id in ('1','3') and death !='Y'  
		and discharge_date is null and TIMESTAMPDIFF(YEAR,birthdate,CURDATE()) between 90 and 94
                             union all
		select  '95-99' as pname, count(if(sex=1,1,null)) as man, count(if(sex=2,1,null)) feman from person where village_id !='9' and house_regist_type_id in ('1','3') and death !='Y'  
		and discharge_date is null and TIMESTAMPDIFF(YEAR,birthdate,CURDATE()) between 95 and 99
                             union all
		select  '100 +' as pname, count(if(sex=1,1,null)) as man, count(if(sex=2,1,null)) feman from person where village_id !='9' and house_regist_type_id in ('1','3') and death !='Y'  
		and discharge_date is null and TIMESTAMPDIFF(YEAR,birthdate,CURDATE()) >=100 
                             ";         
                            try {
                                 $rawData = \Yii::$app->db1->createCommand($sql1)->queryAll();
                             } catch (\yii\db\Exception $e) {
                                 throw new \yii\web\ConflictHttpException('sql error');
                             }                        
                   }else{
                      $sql1="select  '0-4' as pname, count(if(p.sex=1,1,null)) as man, count(if(p.sex=2,1,null)) feman from person p left outer join patient pt on p.cid=pt.cid where  p.house_regist_type_id in ('1','3') and p.death !='Y'  
		and p.discharge_date is null and TIMESTAMPDIFF(YEAR,p.birthdate,CURDATE()) between 0 and 4 and concat(pt.chwpart,pt.amppart,pt.tmbpart,RIGHT(CONCAT('00',pt.moopart),2)) = '{$vl}'
                             union all 
		select  '5-9' as pname, count(if(p.sex=1,1,null)) as man, count(if(p.sex=2,1,null)) feman from person p left outer join patient pt on p.cid=pt.cid where  p.house_regist_type_id in ('1','3') and p.death !='Y'  
		and p.discharge_date is null and TIMESTAMPDIFF(YEAR,p.birthdate,CURDATE()) between 5 and 9 and concat(pt.chwpart,pt.amppart,pt.tmbpart,RIGHT(CONCAT('00',pt.moopart),2)) = '{$vl}'
                             union all
		select  '10-14' as pname, count(if(p.sex=1,1,null)) as man, count(if(p.sex=2,1,null)) feman from person p left outer join patient pt on p.cid=pt.cid where  p.house_regist_type_id in ('1','3') and p.death !='Y'  
		and p.discharge_date is null and TIMESTAMPDIFF(YEAR,p.birthdate,CURDATE()) between 10 and 14 and concat(pt.chwpart,pt.amppart,pt.tmbpart,RIGHT(CONCAT('00',pt.moopart),2)) = '{$vl}'
                             union all
		select  '15-19' as pname, count(if(p.sex=1,1,null)) as man, count(if(p.sex=2,1,null)) feman from person p left outer join patient pt on p.cid=pt.cid where  p.house_regist_type_id in ('1','3') and p.death !='Y'  
		and p.discharge_date is null and TIMESTAMPDIFF(YEAR,p.birthdate,CURDATE()) between 15 and 19 and concat(pt.chwpart,pt.amppart,pt.tmbpart,RIGHT(CONCAT('00',pt.moopart),2)) = '{$vl}'
                             union all
		select  '20-24' as pname, count(if(p.sex=1,1,null)) as man, count(if(p.sex=2,1,null)) feman from person p left outer join patient pt on p.cid=pt.cid where  p.house_regist_type_id in ('1','3') and p.death !='Y'  
		and p.discharge_date is null and TIMESTAMPDIFF(YEAR,p.birthdate,CURDATE()) between 20 and 24 and concat(pt.chwpart,pt.amppart,pt.tmbpart,RIGHT(CONCAT('00',pt.moopart),2)) = '{$vl}'
                             union all
		select  '25-29' as pname, count(if(p.sex=1,1,null)) as man, count(if(p.sex=2,1,null)) feman from person p left outer join patient pt on p.cid=pt.cid where  p.house_regist_type_id in ('1','3') and p.death !='Y'  
		and p.discharge_date is null and TIMESTAMPDIFF(YEAR,p.birthdate,CURDATE()) between 25 and 29 and concat(pt.chwpart,pt.amppart,pt.tmbpart,RIGHT(CONCAT('00',pt.moopart),2)) = '{$vl}'
                             union all
		select  '30-34' as pname, count(if(p.sex=1,1,null)) as man, count(if(p.sex=2,1,null)) feman from person p left outer join patient pt on p.cid=pt.cid where  p.house_regist_type_id in ('1','3') and p.death !='Y'  
		and p.discharge_date is null and TIMESTAMPDIFF(YEAR,p.birthdate,CURDATE()) between 30 and 34 and concat(pt.chwpart,pt.amppart,pt.tmbpart,RIGHT(CONCAT('00',pt.moopart),2)) = '{$vl}'
                             union all
		select  '35-39' as pname, count(if(p.sex=1,1,null)) as man, count(if(p.sex=2,1,null)) feman from person p left outer join patient pt on p.cid=pt.cid where  p.house_regist_type_id in ('1','3') and p.death !='Y'  
		and p.discharge_date is null and TIMESTAMPDIFF(YEAR,p.birthdate,CURDATE()) between 35 and 39 and concat(pt.chwpart,pt.amppart,pt.tmbpart,RIGHT(CONCAT('00',pt.moopart),2)) = '{$vl}'
                             union all
		select  '40-44' as pname, count(if(p.sex=1,1,null)) as man, count(if(p.sex=2,1,null)) feman from person p left outer join patient pt on p.cid=pt.cid where  p.house_regist_type_id in ('1','3') and p.death !='Y'  
		and p.discharge_date is null and TIMESTAMPDIFF(YEAR,p.birthdate,CURDATE()) between 40 and 44 and concat(pt.chwpart,pt.amppart,pt.tmbpart,RIGHT(CONCAT('00',pt.moopart),2)) = '{$vl}'
                             union all
		select  '45-49' as pname, count(if(p.sex=1,1,null)) as man, count(if(p.sex=2,1,null)) feman from person p left outer join patient pt on p.cid=pt.cid where  p.house_regist_type_id in ('1','3') and p.death !='Y'  
		and p.discharge_date is null and TIMESTAMPDIFF(YEAR,p.birthdate,CURDATE()) between 45 and 49 and concat(pt.chwpart,pt.amppart,pt.tmbpart,RIGHT(CONCAT('00',pt.moopart),2)) = '{$vl}'
                             union all
		select  '50-54' as pname, count(if(p.sex=1,1,null)) as man, count(if(p.sex=2,1,null)) feman from person p left outer join patient pt on p.cid=pt.cid where  p.house_regist_type_id in ('1','3') and p.death !='Y'  
		and p.discharge_date is null and TIMESTAMPDIFF(YEAR,p.birthdate,CURDATE()) between 50 and 54 and concat(pt.chwpart,pt.amppart,pt.tmbpart,RIGHT(CONCAT('00',pt.moopart),2)) = '{$vl}'
                             union all
		select  '55-59' as pname, count(if(p.sex=1,1,null)) as man, count(if(p.sex=2,1,null)) feman from person p left outer join patient pt on p.cid=pt.cid where  p.house_regist_type_id in ('1','3') and p.death !='Y'  
		and p.discharge_date is null and TIMESTAMPDIFF(YEAR,p.birthdate,CURDATE()) between 55 and 59 and concat(pt.chwpart,pt.amppart,pt.tmbpart,RIGHT(CONCAT('00',pt.moopart),2)) = '{$vl}'
                             union all
		select  '60-64' as pname, count(if(p.sex=1,1,null)) as man, count(if(p.sex=2,1,null)) feman from person p left outer join patient pt on p.cid=pt.cid where  p.house_regist_type_id in ('1','3') and p.death !='Y'  
		and p.discharge_date is null and TIMESTAMPDIFF(YEAR,p.birthdate,CURDATE()) between 60 and 64 and concat(pt.chwpart,pt.amppart,pt.tmbpart,RIGHT(CONCAT('00',pt.moopart),2)) = '{$vl}'
                             union all
		select  '65-69' as pname, count(if(p.sex=1,1,null)) as man, count(if(p.sex=2,1,null)) feman from person p left outer join patient pt on p.cid=pt.cid where  p.house_regist_type_id in ('1','3') and p.death !='Y'  
		and p.discharge_date is null and TIMESTAMPDIFF(YEAR,p.birthdate,CURDATE()) between 65 and 69 and concat(pt.chwpart,pt.amppart,pt.tmbpart,RIGHT(CONCAT('00',pt.moopart),2)) = '{$vl}'
                             union all
		select  '70-74' as pname, count(if(p.sex=1,1,null)) as man, count(if(p.sex=2,1,null)) feman from person p left outer join patient pt on p.cid=pt.cid where  p.house_regist_type_id in ('1','3') and p.death !='Y'  
		and p.discharge_date is null and TIMESTAMPDIFF(YEAR,p.birthdate,CURDATE()) between 70 and 74 and concat(pt.chwpart,pt.amppart,pt.tmbpart,RIGHT(CONCAT('00',pt.moopart),2)) = '{$vl}'
                             union all
		select  '75-79' as pname, count(if(p.sex=1,1,null)) as man, count(if(p.sex=2,1,null)) feman from person p left outer join patient pt on p.cid=pt.cid where  p.house_regist_type_id in ('1','3') and p.death !='Y'  
		and p.discharge_date is null and TIMESTAMPDIFF(YEAR,p.birthdate,CURDATE()) between 75 and 79 and concat(pt.chwpart,pt.amppart,pt.tmbpart,RIGHT(CONCAT('00',pt.moopart),2)) = '{$vl}'
                             union all
		select  '80-84' as pname, count(if(p.sex=1,1,null)) as man, count(if(p.sex=2,1,null)) feman from person p left outer join patient pt on p.cid=pt.cid where  p.house_regist_type_id in ('1','3') and p.death !='Y'  
		and p.discharge_date is null and TIMESTAMPDIFF(YEAR,p.birthdate,CURDATE()) between 80 and 84 and concat(pt.chwpart,pt.amppart,pt.tmbpart,RIGHT(CONCAT('00',pt.moopart),2)) = '{$vl}'
                             union all
		select  '85-89' as pname, count(if(p.sex=1,1,null)) as man, count(if(p.sex=2,1,null)) feman from person p left outer join patient pt on p.cid=pt.cid where  p.house_regist_type_id in ('1','3') and p.death !='Y'  
		and p.discharge_date is null and TIMESTAMPDIFF(YEAR,p.birthdate,CURDATE()) between 85 and 89 and concat(pt.chwpart,pt.amppart,pt.tmbpart,RIGHT(CONCAT('00',pt.moopart),2)) = '{$vl}'
                             union all
		select  '90-94' as pname, count(if(p.sex=1,1,null)) as man, count(if(p.sex=2,1,null)) feman from person p left outer join patient pt on p.cid=pt.cid where  p.house_regist_type_id in ('1','3') and p.death !='Y'  
		and p.discharge_date is null and TIMESTAMPDIFF(YEAR,p.birthdate,CURDATE()) between 90 and 94 and concat(pt.chwpart,pt.amppart,pt.tmbpart,RIGHT(CONCAT('00',pt.moopart),2)) = '{$vl}'
                             union all
		select  '95-99' as pname, count(if(p.sex=1,1,null)) as man, count(if(p.sex=2,1,null)) feman from person p left outer join patient pt on p.cid=pt.cid where  p.house_regist_type_id in ('1','3') and p.death !='Y'  
		and p.discharge_date is null and TIMESTAMPDIFF(YEAR,p.birthdate,CURDATE()) between 95 and 99 and concat(pt.chwpart,pt.amppart,pt.tmbpart,RIGHT(CONCAT('00',pt.moopart),2)) = '{$vl}'
                             union all
		select  '100 +' as pname, count(if(p.sex=1,1,null)) as man, count(if(p.sex=2,1,null)) feman from person p left outer join patient pt on p.cid=pt.cid where  p.house_regist_type_id in ('1','3') and p.death !='Y'  
		and p.discharge_date is null and TIMESTAMPDIFF(YEAR,p.birthdate,CURDATE()) >=100 and concat(pt.chwpart,pt.amppart,pt.tmbpart,RIGHT(CONCAT('00',pt.moopart),2)) = '{$vl}'";
                            try {
                                 $rawData = \Yii::$app->db1->createCommand($sql1)->queryAll();
                             } catch (\yii\db\Exception $e) {
                                 throw new \yii\web\ConflictHttpException('sql error');
                             }                 
                   }

               break;
               default:
                   $dba = $db.'.person';
                   $dbb = $db.'.patient';      
                   if(TRIM($s2)=='00'){                
                      $sql1 = "
		select  '0-4' as pname, count(if(sex=1,1,null)) as man, count(if(sex=2,1,null)) feman from $dba where village_id !='1' and house_regist_type_id in ('1','3') and death !='Y'  
		and discharge_date is null and TIMESTAMPDIFF(YEAR,birthdate,CURDATE()) between 0 and 4
                             union all 
		select  '5-9' as pname, count(if(sex=1,1,null)) as man, count(if(sex=2,1,null)) feman from $dba where village_id !='1' and house_regist_type_id in ('1','3') and death !='Y'  
		and discharge_date is null and TIMESTAMPDIFF(YEAR,birthdate,CURDATE()) between 5 and 9
                             union all
		select  '10-14' as pname, count(if(sex=1,1,null)) as man, count(if(sex=2,1,null)) feman from $dba where village_id !='1' and house_regist_type_id in ('1','3') and death !='Y'  
		and discharge_date is null and TIMESTAMPDIFF(YEAR,birthdate,CURDATE()) between 10 and 14
                             union all
		select  '15-19' as pname, count(if(sex=1,1,null)) as man, count(if(sex=2,1,null)) feman from $dba where village_id !='1' and house_regist_type_id in ('1','3') and death !='Y'  
		and discharge_date is null and TIMESTAMPDIFF(YEAR,birthdate,CURDATE()) between 15 and 19
                             union all
		select  '20-24' as pname, count(if(sex=1,1,null)) as man, count(if(sex=2,1,null)) feman from $dba where village_id !='1' and house_regist_type_id in ('1','3') and death !='Y'  
		and discharge_date is null and TIMESTAMPDIFF(YEAR,birthdate,CURDATE()) between 20 and 24
                             union all
		select  '25-29' as pname, count(if(sex=1,1,null)) as man, count(if(sex=2,1,null)) feman from $dba where village_id !='1' and house_regist_type_id in ('1','3') and death !='Y'  
		and discharge_date is null and TIMESTAMPDIFF(YEAR,birthdate,CURDATE()) between 25 and 29
                             union all
		select  '30-34' as pname, count(if(sex=1,1,null)) as man, count(if(sex=2,1,null)) feman from $dba where village_id !='1' and house_regist_type_id in ('1','3') and death !='Y'  
		and discharge_date is null and TIMESTAMPDIFF(YEAR,birthdate,CURDATE()) between 30 and 34
                             union all
		select  '35-39' as pname, count(if(sex=1,1,null)) as man, count(if(sex=2,1,null)) feman from $dba where village_id !='1' and house_regist_type_id in ('1','3') and death !='Y'  
		and discharge_date is null and TIMESTAMPDIFF(YEAR,birthdate,CURDATE()) between 35 and 39
                             union all
		select  '40-44' as pname, count(if(sex=1,1,null)) as man, count(if(sex=2,1,null)) feman from $dba where village_id !='1' and house_regist_type_id in ('1','3') and death !='Y'  
		and discharge_date is null and TIMESTAMPDIFF(YEAR,birthdate,CURDATE()) between 40 and 44
                             union all
		select  '45-49' as pname, count(if(sex=1,1,null)) as man, count(if(sex=2,1,null)) feman from $dba where village_id !='1' and house_regist_type_id in ('1','3') and death !='Y'  
		and discharge_date is null and TIMESTAMPDIFF(YEAR,birthdate,CURDATE()) between 45 and 49
                             union all
		select  '50-54' as pname, count(if(sex=1,1,null)) as man, count(if(sex=2,1,null)) feman from $dba where village_id !='1' and house_regist_type_id in ('1','3') and death !='Y'  
		and discharge_date is null and TIMESTAMPDIFF(YEAR,birthdate,CURDATE()) between 50 and 54
                             union all
		select  '55-59' as pname, count(if(sex=1,1,null)) as man, count(if(sex=2,1,null)) feman from $dba where village_id !='1' and house_regist_type_id in ('1','3') and death !='Y'  
		and discharge_date is null and TIMESTAMPDIFF(YEAR,birthdate,CURDATE()) between 55 and 59
                             union all
		select  '60-64' as pname, count(if(sex=1,1,null)) as man, count(if(sex=2,1,null)) feman from $dba where village_id !='1' and house_regist_type_id in ('1','3') and death !='Y'  
		and discharge_date is null and TIMESTAMPDIFF(YEAR,birthdate,CURDATE()) between 60 and 64
                             union all
		select  '65-69' as pname, count(if(sex=1,1,null)) as man, count(if(sex=2,1,null)) feman from $dba where village_id !='1' and house_regist_type_id in ('1','3') and death !='Y'  
		and discharge_date is null and TIMESTAMPDIFF(YEAR,birthdate,CURDATE()) between 65 and 69
                             union all
		select  '70-74' as pname, count(if(sex=1,1,null)) as man, count(if(sex=2,1,null)) feman from $dba where village_id !='1' and house_regist_type_id in ('1','3') and death !='Y'  
		and discharge_date is null and TIMESTAMPDIFF(YEAR,birthdate,CURDATE()) between 70 and 74
                             union all
		select  '75-79' as pname, count(if(sex=1,1,null)) as man, count(if(sex=2,1,null)) feman from $dba where village_id !='1' and house_regist_type_id in ('1','3') and death !='Y'  
		and discharge_date is null and TIMESTAMPDIFF(YEAR,birthdate,CURDATE()) between 75 and 79
                             union all
		select  '80-84' as pname, count(if(sex=1,1,null)) as man, count(if(sex=2,1,null)) feman from $dba where village_id !='1' and house_regist_type_id in ('1','3') and death !='Y'  
		and discharge_date is null and TIMESTAMPDIFF(YEAR,birthdate,CURDATE()) between 80 and 84
                             union all
		select  '85-89' as pname, count(if(sex=1,1,null)) as man, count(if(sex=2,1,null)) feman from $dba where village_id !='1' and house_regist_type_id in ('1','3') and death !='Y'  
		and discharge_date is null and TIMESTAMPDIFF(YEAR,birthdate,CURDATE()) between 85 and 89
                             union all
		select  '90-94' as pname, count(if(sex=1,1,null)) as man, count(if(sex=2,1,null)) feman from $dba where village_id !='1' and house_regist_type_id in ('1','3') and death !='Y'  
		and discharge_date is null and TIMESTAMPDIFF(YEAR,birthdate,CURDATE()) between 90 and 94
                             union all
		select  '95-99' as pname, count(if(sex=1,1,null)) as man, count(if(sex=2,1,null)) feman from $dba where village_id !='1' and house_regist_type_id in ('1','3') and death !='Y'  
		and discharge_date is null and TIMESTAMPDIFF(YEAR,birthdate,CURDATE()) between 95 and 99
                             union all
		select  '100 +' as pname, count(if(sex=1,1,null)) as man, count(if(sex=2,1,null)) feman from $dba where village_id !='1' and house_regist_type_id in ('1','3') and death !='Y'  
		and discharge_date is null and TIMESTAMPDIFF(YEAR,birthdate,CURDATE()) >=100 
                             ";                
                        try {
                             $rawData = \Yii::$app->db2->createCommand($sql1)->queryAll();
                         } catch (\yii\db\Exception $e) {
                             throw new \yii\web\ConflictHttpException('sql error');
                         }                       
                   }else{
                      $sql1="select  '0-4' as pname, count(if(p.sex=1,1,null)) as man, count(if(p.sex=2,1,null)) feman from $dba p left outer join $dbb pt on p.cid=pt.cid where  p.house_regist_type_id in ('1','3') and p.death !='Y'  
		and p.discharge_date is null and TIMESTAMPDIFF(YEAR,p.birthdate,CURDATE()) between 0 and 4 and concat(pt.chwpart,pt.amppart,pt.tmbpart,RIGHT(CONCAT('00',pt.moopart),2)) = '{$vl}'
                             union all 
		select  '5-9' as pname, count(if(p.sex=1,1,null)) as man, count(if(p.sex=2,1,null)) feman from $dba p left outer join $dbb pt on p.cid=pt.cid where  p.house_regist_type_id in ('1','3') and p.death !='Y'  
		and p.discharge_date is null and TIMESTAMPDIFF(YEAR,p.birthdate,CURDATE()) between 5 and 9 and concat(pt.chwpart,pt.amppart,pt.tmbpart,RIGHT(CONCAT('00',pt.moopart),2)) = '{$vl}'
                             union all
		select  '10-14' as pname, count(if(p.sex=1,1,null)) as man, count(if(p.sex=2,1,null)) feman from $dba p left outer join $dbb pt on p.cid=pt.cid where  p.house_regist_type_id in ('1','3') and p.death !='Y'  
		and p.discharge_date is null and TIMESTAMPDIFF(YEAR,p.birthdate,CURDATE()) between 10 and 14 and concat(pt.chwpart,pt.amppart,pt.tmbpart,RIGHT(CONCAT('00',pt.moopart),2)) = '{$vl}'
                             union all
		select  '15-19' as pname, count(if(p.sex=1,1,null)) as man, count(if(p.sex=2,1,null)) feman from $dba p left outer join $dbb pt on p.cid=pt.cid where  p.house_regist_type_id in ('1','3') and p.death !='Y'  
		and p.discharge_date is null and TIMESTAMPDIFF(YEAR,p.birthdate,CURDATE()) between 15 and 19 and concat(pt.chwpart,pt.amppart,pt.tmbpart,RIGHT(CONCAT('00',pt.moopart),2)) = '{$vl}'
                             union all
		select  '20-24' as pname, count(if(p.sex=1,1,null)) as man, count(if(p.sex=2,1,null)) feman from $dba p left outer join $dbb pt on p.cid=pt.cid where  p.house_regist_type_id in ('1','3') and p.death !='Y'  
		and p.discharge_date is null and TIMESTAMPDIFF(YEAR,p.birthdate,CURDATE()) between 20 and 24 and concat(pt.chwpart,pt.amppart,pt.tmbpart,RIGHT(CONCAT('00',pt.moopart),2)) = '{$vl}'
                             union all
		select  '25-29' as pname, count(if(p.sex=1,1,null)) as man, count(if(p.sex=2,1,null)) feman from $dba p left outer join $dbb pt on p.cid=pt.cid where  p.house_regist_type_id in ('1','3') and p.death !='Y'  
		and p.discharge_date is null and TIMESTAMPDIFF(YEAR,p.birthdate,CURDATE()) between 25 and 29 and concat(pt.chwpart,pt.amppart,pt.tmbpart,RIGHT(CONCAT('00',pt.moopart),2)) = '{$vl}'
                             union all
		select  '30-34' as pname, count(if(p.sex=1,1,null)) as man, count(if(p.sex=2,1,null)) feman from $dba p left outer join $dbb pt on p.cid=pt.cid where  p.house_regist_type_id in ('1','3') and p.death !='Y'  
		and p.discharge_date is null and TIMESTAMPDIFF(YEAR,p.birthdate,CURDATE()) between 30 and 34 and concat(pt.chwpart,pt.amppart,pt.tmbpart,RIGHT(CONCAT('00',pt.moopart),2)) = '{$vl}'
                             union all
		select  '35-39' as pname, count(if(p.sex=1,1,null)) as man, count(if(p.sex=2,1,null)) feman from $dba p left outer join $dbb pt on p.cid=pt.cid where  p.house_regist_type_id in ('1','3') and p.death !='Y'  
		and p.discharge_date is null and TIMESTAMPDIFF(YEAR,p.birthdate,CURDATE()) between 35 and 39 and concat(pt.chwpart,pt.amppart,pt.tmbpart,RIGHT(CONCAT('00',pt.moopart),2)) = '{$vl}'
                             union all
		select  '40-44' as pname, count(if(p.sex=1,1,null)) as man, count(if(p.sex=2,1,null)) feman from $dba p left outer join $dbb pt on p.cid=pt.cid where  p.house_regist_type_id in ('1','3') and p.death !='Y'  
		and p.discharge_date is null and TIMESTAMPDIFF(YEAR,p.birthdate,CURDATE()) between 40 and 44 and concat(pt.chwpart,pt.amppart,pt.tmbpart,RIGHT(CONCAT('00',pt.moopart),2)) = '{$vl}'
                             union all
		select  '45-49' as pname, count(if(p.sex=1,1,null)) as man, count(if(p.sex=2,1,null)) feman from $dba p left outer join $dbb pt on p.cid=pt.cid where  p.house_regist_type_id in ('1','3') and p.death !='Y'  
		and p.discharge_date is null and TIMESTAMPDIFF(YEAR,p.birthdate,CURDATE()) between 45 and 49 and concat(pt.chwpart,pt.amppart,pt.tmbpart,RIGHT(CONCAT('00',pt.moopart),2)) = '{$vl}'
                             union all
		select  '50-54' as pname, count(if(p.sex=1,1,null)) as man, count(if(p.sex=2,1,null)) feman from $dba p left outer join $dbb pt on p.cid=pt.cid where  p.house_regist_type_id in ('1','3') and p.death !='Y'  
		and p.discharge_date is null and TIMESTAMPDIFF(YEAR,p.birthdate,CURDATE()) between 50 and 54 and concat(pt.chwpart,pt.amppart,pt.tmbpart,RIGHT(CONCAT('00',pt.moopart),2)) = '{$vl}'
                             union all
		select  '55-59' as pname, count(if(p.sex=1,1,null)) as man, count(if(p.sex=2,1,null)) feman from $dba p left outer join $dbb pt on p.cid=pt.cid where  p.house_regist_type_id in ('1','3') and p.death !='Y'  
		and p.discharge_date is null and TIMESTAMPDIFF(YEAR,p.birthdate,CURDATE()) between 55 and 59 and concat(pt.chwpart,pt.amppart,pt.tmbpart,RIGHT(CONCAT('00',pt.moopart),2)) = '{$vl}'
                             union all
		select  '60-64' as pname, count(if(p.sex=1,1,null)) as man, count(if(p.sex=2,1,null)) feman from $dba p left outer join $dbb pt on p.cid=pt.cid where  p.house_regist_type_id in ('1','3') and p.death !='Y'  
		and p.discharge_date is null and TIMESTAMPDIFF(YEAR,p.birthdate,CURDATE()) between 60 and 64 and concat(pt.chwpart,pt.amppart,pt.tmbpart,RIGHT(CONCAT('00',pt.moopart),2)) = '{$vl}'
                             union all
		select  '65-69' as pname, count(if(p.sex=1,1,null)) as man, count(if(p.sex=2,1,null)) feman from $dba p left outer join $dbb pt on p.cid=pt.cid where  p.house_regist_type_id in ('1','3') and p.death !='Y'  
		and p.discharge_date is null and TIMESTAMPDIFF(YEAR,p.birthdate,CURDATE()) between 65 and 69 and concat(pt.chwpart,pt.amppart,pt.tmbpart,RIGHT(CONCAT('00',pt.moopart),2)) = '{$vl}'
                             union all
		select  '70-74' as pname, count(if(p.sex=1,1,null)) as man, count(if(p.sex=2,1,null)) feman from $dba p left outer join $dbb pt on p.cid=pt.cid where  p.house_regist_type_id in ('1','3') and p.death !='Y'  
		and p.discharge_date is null and TIMESTAMPDIFF(YEAR,p.birthdate,CURDATE()) between 70 and 74 and concat(pt.chwpart,pt.amppart,pt.tmbpart,RIGHT(CONCAT('00',pt.moopart),2)) = '{$vl}'
                             union all
		select  '75-79' as pname, count(if(p.sex=1,1,null)) as man, count(if(p.sex=2,1,null)) feman from $dba p left outer join $dbb pt on p.cid=pt.cid where  p.house_regist_type_id in ('1','3') and p.death !='Y'  
		and p.discharge_date is null and TIMESTAMPDIFF(YEAR,p.birthdate,CURDATE()) between 75 and 79 and concat(pt.chwpart,pt.amppart,pt.tmbpart,RIGHT(CONCAT('00',pt.moopart),2)) = '{$vl}'
                             union all
		select  '80-84' as pname, count(if(p.sex=1,1,null)) as man, count(if(p.sex=2,1,null)) feman from $dba p left outer join $dbb pt on p.cid=pt.cid where  p.house_regist_type_id in ('1','3') and p.death !='Y'  
		and p.discharge_date is null and TIMESTAMPDIFF(YEAR,p.birthdate,CURDATE()) between 80 and 84 and concat(pt.chwpart,pt.amppart,pt.tmbpart,RIGHT(CONCAT('00',pt.moopart),2)) = '{$vl}'
                             union all
		select  '85-89' as pname, count(if(p.sex=1,1,null)) as man, count(if(p.sex=2,1,null)) feman from $dba p left outer join $dbb pt on p.cid=pt.cid where  p.house_regist_type_id in ('1','3') and p.death !='Y'  
		and p.discharge_date is null and TIMESTAMPDIFF(YEAR,p.birthdate,CURDATE()) between 85 and 89 and concat(pt.chwpart,pt.amppart,pt.tmbpart,RIGHT(CONCAT('00',pt.moopart),2)) = '{$vl}'
                             union all
		select  '90-94' as pname, count(if(p.sex=1,1,null)) as man, count(if(p.sex=2,1,null)) feman from $dba p left outer join $dbb pt on p.cid=pt.cid where  p.house_regist_type_id in ('1','3') and p.death !='Y'  
		and p.discharge_date is null and TIMESTAMPDIFF(YEAR,p.birthdate,CURDATE()) between 90 and 94 and concat(pt.chwpart,pt.amppart,pt.tmbpart,RIGHT(CONCAT('00',pt.moopart),2)) = '{$vl}'
                             union all
		select  '95-99' as pname, count(if(p.sex=1,1,null)) as man, count(if(p.sex=2,1,null)) feman from $dba p left outer join $dbb pt on p.cid=pt.cid where  p.house_regist_type_id in ('1','3') and p.death !='Y'  
		and p.discharge_date is null and TIMESTAMPDIFF(YEAR,p.birthdate,CURDATE()) between 95 and 99 and concat(pt.chwpart,pt.amppart,pt.tmbpart,RIGHT(CONCAT('00',pt.moopart),2)) = '{$vl}'
                             union all
		select  '100 +' as pname, count(if(p.sex=1,1,null)) as man, count(if(p.sex=2,1,null)) feman from $dba p left outer join $dbb pt on p.cid=pt.cid where  p.house_regist_type_id in ('1','3') and p.death !='Y'  
		and p.discharge_date is null and TIMESTAMPDIFF(YEAR,p.birthdate,CURDATE()) >=100 and concat(pt.chwpart,pt.amppart,pt.tmbpart,RIGHT(CONCAT('00',pt.moopart),2)) = '{$vl}'";                     
                        try {
                             $rawData = \Yii::$app->db2->createCommand($sql1)->queryAll();
                         } catch (\yii\db\Exception $e) {
                             throw new \yii\web\ConflictHttpException('sql error');
                         }                    
                   }
               break;
        }
       $pname = [];
        $pman = [];
        $pfman = [];

        
        for($i=0;$i<=20;$i++) 
            {
               $pname[] = [$rawData[$i]['pname']*(1)];

          }
        for($i=0;$i<=20;$i++) 
            {
               $pman[] = [$rawData[$i]['man'] * (-1)];

          }
        for($i=0;$i<=20;$i++) 
            {
               $pfman[] = [$rawData[$i]['feman']*(1)];

          }          
        $dataProvider = new \yii\data\ArrayDataProvider([
            'allModels' => $rawData,
        ]);  

        return $this -> render('/site/gen/popu-gen-1',['dataProvider' => $dataProvider,'names' => $names,'mText' => $this->mText, 'dText' => $this->dText,'sText'=>$this->sText,'gText'=>$this->gText, 
                             'pname'=>$pname,'pman'=>$pman,'pfman'=> $pfman,'rawData'=>$rawData,'pmoo'=>$type.' ' .$village]);  
    }    
    
    
    
    
    
    public function actionGenBasic1Index() {
        $model = new Formmodel();
        $names="รายงานจำนวนประชากรตามทะเบียนราษฎร์และตามสิทธิ์ UC"; 
        if($model->load(Yii::$app->request->post())){
               $y = substr(substr($model->date1,0,4)+543,2,2);
               $m =substr($model->date1,5,2);
               $db = 'dbpop_'.$y.$m;
                           $sql = "select * from '{$db}' ";
            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=gen/";   
            return $this->redirect($url.'gen-basic1.mrt&db='.$db.'&d1='.$model->date1.'&s='.$sql);              

        }
            return $this -> render('/site/gen/gen1-index',['sText'=>$this->sText,'names'=>$names, 'dText' => $this->dText ,
                                    'model' => $model,'gText'=>$this->gText,'mText'=>$this->mText]);
    }     
    public function actionGenBasic2Index() {
        $model = new Formmodel();
        $names="รายงานจำนวนผู้รับบริการ / 5 อันดับโรคแรก แยกตาม PCC"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
               $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=gen/";   
                return $this->redirect($url.'gen-basic2.mrt&d1='.$date1.'&d2='.$date2);              
        }
            return $this -> render('/site/gen/gen1-index',['sText'=>$this->sText,'names'=>$names, 'dText' => $this->dText ,
                                    'model' => $model,'gText'=>$this->gText,'mText'=>$this->mText]);
    }     
    public function actionGenBasic3Index() {
        $model = new Formmodel();
        $names="รายงานอันดับ(รายการผ่าตัด)ผู้ป่วยในฝ่าตัด"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
               $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=gen/";   
                return $this->redirect($url.'gen-basic3.mrt&d1='.$date1.'&d2='.$date2);              
        }
            return $this -> render('/site/gen/gen1-index',['sText'=>$this->sText,'names'=>$names, 'dText' => $this->dText ,
                                    'model' => $model,'gText'=>$this->gText,'mText'=>$this->mText]);
    }       
    public function actionGenBasic4Index() {
        $model = new Formmodel();
        $names="รายงาน 10 อันดับโรคแรกผู้ป่วยในฝ่าตัด"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
               $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=gen/";   
                return $this->redirect($url.'gen-basic4.mrt&d1='.$date1.'&d2='.$date2);              
        }
            return $this -> render('/site/gen/gen1-index',['sText'=>$this->sText,'names'=>$names, 'dText' => $this->dText ,
                                    'model' => $model,'gText'=>$this->gText,'mText'=>$this->mText]);
    }  
    public function actionGenBasic5Index() {
        $model = new Formmodel();
        $names="รายงานทะเบียนผู้ป่วยโรคเรื้อรังแยกตาม PCC และผล Lab ครั้งสุดท้าย"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
                                $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=gen/";   
                                return $this->redirect($url.'gen-basic5.mrt&d1='.$date1.'&d2='.$date2); 
                                  
        }
            return $this -> render('/site/gen/gen0-index',['sText'=>$this->sText,'names'=>$names, 'dText' => $this->dText ,
                                    'model' => $model,'gText'=>$this->gText,'mText'=>$this->mText]);
    } 
    public function actionGenBasic6Index() {
        $model = new Formmodel();
        $names="รายงานผู้ป่วยโรคเรื้อรังรับบริการแยกตาม PCC"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
                                $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=gen/";   
                                return $this->redirect($url.'gen-basic6.mrt&d1='.$date1.'&d2='.$date2); 
                                  
        }
            return $this -> render('/site/gen/gen1-index',['sText'=>$this->sText,'names'=>$names, 'dText' => $this->dText ,
                                    'model' => $model,'gText'=>$this->gText,'mText'=>$this->mText]);
    }    
    public function actionGenBasic7Index() {
        $model = new Formmodel();
        $names="รายงานจำนวนมูลค่ายาของผู้รับบริการแยกตาม PCC"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
                                $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=gen/";   
                                return $this->redirect($url.'gen-basic7.mrt&d1='.$date1.'&d2='.$date2); 
                                  
        }
            return $this -> render('/site/gen/gen1-index',['sText'=>$this->sText,'names'=>$names, 'dText' => $this->dText ,
                                    'model' => $model,'gText'=>$this->gText,'mText'=>$this->mText]);
    }       
    public function actionGenBasic8Index() {
        $model = new Formmodel();
        $names="รายงานสรุปโรคเรื้อรัง - DM(ผล Lab )  PCC หนองตาหมู่"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
                                $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=gen/";   
                                return $this->redirect($url.'gen-basic8.mrt&d1='.$date1.'&d2='.$date2); 
                                  
        }
            return $this -> render('/site/gen/gen1-index',['sText'=>$this->sText,'names'=>$names, 'dText' => $this->dText ,
                                    'model' => $model,'gText'=>$this->gText,'mText'=>$this->mText]);
    }      
    public function actionGenBasic9Index() {
        $model = new Formmodel();
        $names="รายงานประชากร PCC (Type1,Type3) แยกตามสิทธิการรักษาพยาบาล"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
                                $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=gen/";   
                                return $this->redirect($url.'gen-basic9.mrt&d1='.$date1); 
                                  
        }
            return $this -> render('/site/gen/gen0-index',['sText'=>$this->sText,'names'=>$names, 'dText' => $this->dText ,
                                    'model' => $model,'gText'=>$this->gText,'mText'=>$this->mText]);
    }      
    public function actionGenBasic10Index() {
        $model = new Formmodel();
        $names="รายงานการให้บริการวัคซีน แยกตามกลุ่มบริการ"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
               switch ($model->text1) {
                  case 1:
                      $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=gen/";   
                       return $this->redirect($url.'gen-basic10-1.mrt&d1='.$date1.'&d2='.$date2); 
                  break;
                  case 2:
                      $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=gen/";   
                       return $this->redirect($url.'gen-basic10-2.mrt&d1='.$date1.'&d2='.$date2); 
                  break;
                  case 3:
                      $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=gen/";   
                       return $this->redirect($url.'gen-basic10-3.mrt&d1='.$date1.'&d2='.$date2); 
                  break;              
                  default:
                  break;
               }                                  
        }
            return $this -> render('/site/gen/gen4-index',['sText'=>$this->sText,'names'=>$names, 'dText' => $this->dText ,
                                    'model' => $model,'gText'=>$this->gText,'mText'=>$this->mText,'iText'=>$this->iText]);
    }      
    
    public function actionGenOut1Index() {
        $model = new Formmodel();
        $names=" รายงานจำนวนผู้ป่วยนอก"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=gen/";   
            return $this->redirect($url.'gen-out1.mrt&d1='.$date1.'&d2='.$date2);                  
        }
            return $this -> render('/site/gen/gen2-index',['sText'=>$this->sText,'names'=>$names, 'dText' => $this->dText ,
                                    'model' => $model,'iText'=>$this->iText,'mText'=>$this->mText,'oText'=> $this->oText]);
    } 
    public function actionGenOut2Index() {
        $model = new Formmodel();
        $names="รายงานจำนวนใบสั่งยาผู้ป่วยนอก(OPD)"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=gen/";   
            return $this->redirect($url.'gen-out2.mrt&d1='.$date1.'&d2='.$date2);                
        }
            return $this -> render('/site/gen/gen2-index',['sText'=>$this->sText,'names'=>$names, 'dText' => $this->dText ,
                                    'model' => $model,'iText'=>$this->iText,'mText'=>$this->mText,'oText'=> $this->oText]);
    }      
    public function actionGenOut3Index() {
        $model = new Formmodel();
        $names="รายงาน 50 อันดับโรคผู้ป่วยนอก (OPD)"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=gen/";   
            return $this->redirect($url.'gen-out3.mrt&d1='.$date1.'&d2='.$date2);                
        }
            return $this -> render('/site/gen/gen2-index',['sText'=>$this->sText,'names'=>$names, 'dText' => $this->dText ,
                                    'model' => $model,'iText'=>$this->iText,'mText'=>$this->mText,'oText'=> $this->oText]);
    }  
    public function actionGenOut4Index() {
        $model = new Formmodel();
        $names="รายงานจำนวนผู้รับบริการผู้ป่วยนอกแยกตามแผนก"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=gen/";   
            return $this->redirect($url.'gen-out4.mrt&d1='.$date1.'&d2='.$date2);                
        }
            return $this -> render('/site/gen/gen2-index',['sText'=>$this->sText,'names'=>$names, 'dText' => $this->dText ,
                                    'model' => $model,'iText'=>$this->iText,'mText'=>$this->mText,'oText'=> $this->oText]);
    }      
    public function actionGenOut5Index() {
        $model = new Formmodel();
        $names="รายงานการให้บริการผู้ป่วยนอกในเขตรับผิดชอบ( 14 หมู่)"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=gen/";   
            return $this->redirect($url.'gen-out5.mrt&d1='.$date1.'&d2='.$date2);                
        }
            return $this -> render('/site/gen/gen2-index',['sText'=>$this->sText,'names'=>$names, 'dText' => $this->dText ,
                                    'model' => $model,'iText'=>$this->iText,'mText'=>$this->mText,'oText'=> $this->oText]);
    }   
    public function actionGenOut6Index() {
        $model = new Formmodel();
        $names="รายงานค่าใช้จ่ายการรับบริการผู้ป่วยนอก "; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=gen/";   
            return $this->redirect($url.'gen-out6.mrt&d1='.$date1.'&d2='.$date2);                
        }
            return $this -> render('/site/gen/gen2-index',['sText'=>$this->sText,'names'=>$names, 'dText' => $this->dText ,
                                    'model' => $model,'iText'=>$this->iText,'mText'=>$this->mText,'oText'=> $this->oText]);
    } 
    public function actionGenOut7Index() {
        $model = new Formmodel();
        $names="รายงานผู้รับบริการคลินิกพิเศษ แยกตามคลินิก(จุดบริการ)"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;
            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=gen/";   
            return $this->redirect($url.'gen-out7.mrt&d1='.$date1.'&d2='.$date2);                
        }
            return $this -> render('/site/gen/gen2-index',['sText'=>$this->sText,'names'=>$names, 'dText' => $this->dText ,
                                    'model' => $model,'iText'=>$this->iText,'mText'=>$this->mText,'oText'=> $this->oText]);
    } 

    
    
    
    
    
    
    
    
    public function actionGenIn1Index() {
        $model = new Formmodel();
        $names=" รายงานจำนวนผู้ป่วยใน( : วันนอน )"; 
        if($model->load(Yii::$app->request->post())){          
               $date1 = $model->date1;
               $date2 = $model->date2;
            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=gen/";   
            return $this->redirect($url.'gen-in1.mrt&d1='.$date1.'&d2='.$date2);                
        }
            return $this -> render('/site/gen/gen3-index',['sText'=>$this->sText,'names'=>$names, 'dText' => $this->dText ,
                                    'model' => $model,'iText'=>$this->iText,'mText'=>$this->mText]);
    }        
    public function actionGenIn2Index() {
        $model = new Formmodel();
        $names=" รายงาน 50 อันดับโรคแรกผู้ป่วยใน(Last Diag)"; 
        if($model->load(Yii::$app->request->post())){          
               $date1 = $model->date1;
               $date2 = $model->date2;
            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=gen/";   
            return $this->redirect($url.'gen-in2.mrt&d1='.$date1.'&d2='.$date2);                
        }
            return $this -> render('/site/gen/gen3-index',['sText'=>$this->sText,'names'=>$names, 'dText' => $this->dText ,
                                    'model' => $model,'iText'=>$this->iText,'mText'=>$this->mText]);
    }    
    public function actionGenIn3Index() {
        $model = new Formmodel();
        $names="รายงานยอดผู้ป่วยใน (IPD) Admit"; 
        if($model->load(Yii::$app->request->post())){          
               $date1 = $model->date1;
               $date2 = $model->date2;
            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=gen/";   
            return $this->redirect($url.'gen-in3.mrt&d1='.$date1.'&d2='.$date2);                
        }
            return $this -> render('/site/gen/gen3-index',['sText'=>$this->sText,'names'=>$names, 'dText' => $this->dText ,
                                    'model' => $model,'iText'=>$this->iText,'mText'=>$this->mText]);
    }        
    public function actionGenIn4Index() {
        $model = new Formmodel();
        $names="รายงาน 50 อันดับโรคแรกที่รับไว้รักษา ผู้ป่วยใน(First Diag)"; 
        if($model->load(Yii::$app->request->post())){          
               $date1 = $model->date1;
               $date2 = $model->date2;
            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=gen/";   
            return $this->redirect($url.'gen-in4.mrt&d1='.$date1.'&d2='.$date2);                
        }
            return $this -> render('/site/gen/gen3-index',['sText'=>$this->sText,'names'=>$names, 'dText' => $this->dText ,
                                    'model' => $model,'iText'=>$this->iText,'mText'=>$this->mText]);
    }     
    public function actionGenIn5Index() {
        $model = new Formmodel();
        $names="รายงาน 50 อันดับโรคแรกผู้ป่วยในผ่าตัด(Operations)"; 
        if($model->load(Yii::$app->request->post())){          
               $date1 = $model->date1;
               $date2 = $model->date2;
            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=gen/";   
            return $this->redirect($url.'gen-in5.mrt&d1='.$date1.'&d2='.$date2);                
        }
            return $this -> render('/site/gen/gen3-index',['sText'=>$this->sText,'names'=>$names, 'dText' => $this->dText ,
                                    'model' => $model,'iText'=>$this->iText,'mText'=>$this->mText]);
    }     
    public function actionGenIn6Index() {
        $model = new Formmodel();
        $names="รายงานจำนวนผู้ป่วยในที่จำหน่ายแต่ละหน่วยงาน"; 
        if($model->load(Yii::$app->request->post())){          
               $date1 = $model->date1;
               $date2 = $model->date2;
            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=gen/";   
            return $this->redirect($url.'gen-in6.mrt&d1='.$date1.'&d2='.$date2);                
        }
            return $this -> render('/site/gen/gen3-index',['sText'=>$this->sText,'names'=>$names, 'dText' => $this->dText ,
                                    'model' => $model,'iText'=>$this->iText,'mText'=>$this->mText]);
    }      
    public function actionGenIn7Index() {
        $model = new Formmodel();
        $names="รายงานจำนวนผู้ป่วยในที่จำหน่ายแต่ละแผนก"; 
        if($model->load(Yii::$app->request->post())){          
               $date1 = $model->date1;
               $date2 = $model->date2;
            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=gen/";   
            return $this->redirect($url.'gen-in7.mrt&d1='.$date1.'&d2='.$date2);                
        }
            return $this -> render('/site/gen/gen3-index',['sText'=>$this->sText,'names'=>$names, 'dText' => $this->dText ,
                                    'model' => $model,'iText'=>$this->iText,'mText'=>$this->mText]);
    }     
    public function actionGenIn8Index() {
        $model = new Formmodel();
        $names="รายงานค่าใช้จ่ายการรับบริการผู้ป่วยใน"; 
        if($model->load(Yii::$app->request->post())){          
               $date1 = $model->date1;
               $date2 = $model->date2;
            $url="http://192.168.3.8/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=gen/";   
            return $this->redirect($url.'gen-in8.mrt&d1='.$date1.'&d2='.$date2);                
        }
            return $this -> render('/site/gen/gen3-index',['sText'=>$this->sText,'names'=>$names, 'dText' => $this->dText ,
                                    'model' => $model,'iText'=>$this->iText,'mText'=>$this->mText]);
    }   
    
}    

