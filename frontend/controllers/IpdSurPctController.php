<?php

namespace frontend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\data\ArrayDataProvider;
use yii\helpers\ArrayHelper;
use frontend\models\Formmodel;

class IpdSurPctController extends Controller
{
    public $mText = "งานศัลยกรรมทั่วไป โรคที่น่าสนใจ(PCT) ";
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
    public function actionPct1Index() {
        $model = new Formmodel();
        $names="ผลการดำเนินงานการให้บริการ PCT-ศัลยกรรม (Necrotising fasciitis)"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;                   
              return $this->redirect(['pct1_preview','name'=>$names,'d1'=>$date1,'d2'=>$date2]);
        }
            return $this -> render('/site/ipd-sur/pct/pct1_index',['mText'=>$this->mText,'names'=>$names,'model' => $model]);
    }    
    public function actionPct1_preview($name,$d1,$d2) {
        $names=$name;
        $date1=$d1;$date2=$d2;    
        $sql="select  IF(MONTH(o.vstdate)>=10,YEAR(o.vstdate)+1 ,YEAR(o.vstdate))+543 AS yrs from ovstdiag o
                where o.vstdate between '{$date1}' and '{$date2}' group by yrs;";
        $result = \Yii::$app->db1->createCommand($sql)->queryAll();      
        foreach ($result as $value) {
               $yrs = $value['yrs'];                                              
        }
        \Yii::$app->db1->createCommand("DROP TABLE IF EXISTS t1;")->execute();
        $dt1="CREATE TEMPORARY TABLE t1 AS
                (
                SELECT i.vn,i.an,i.dchdate,i.dchtype
                FROM ipt i
                INNER JOIN iptdiag d ON i.an=d.an
                WHERE i.dchdate BETWEEN '{$date1}' AND '{$date2}'
                AND d.icd10 BETWEEN 'M7261'  AND 'M7269' 
                GROUP BY i.an
                );";
        $rt1 = \Yii::$app->db1->createCommand($dt1)->execute();      
        \Yii::$app->db1->createCommand("DROP TABLE IF EXISTS t2;")->execute();
        $dt2="CREATE TEMPORARY TABLE t2 AS
                (
                SELECT i.vn,i.an,i.dchdate,i.dchtype
                FROM ipt i
                INNER JOIN iptdiag d ON i.an=d.an
                WHERE i.dchdate BETWEEN '{$date1}' AND '{$date2}'
                AND d.icd10 = 'R572' 
                GROUP BY i.an
                );";
        $rt2 = \Yii::$app->db1->createCommand($dt2)->execute();      
        
        $rawData=[];
        $sql1="SELECT  pname,total,Oct,Nov,Dece,Jan,Feb,Mar,Apr,May,Jun,Jul,Aug,Sep 
                    FROM (
			SELECT 'จำนวนผู้ป่วย Necrotising fasciitis' AS pname,
                        COUNT(t1.an) total,
                        COUNT(IF(MONTH(t1.dchdate)=10,1,NULL)) AS Oct,
                        COUNT(IF(MONTH(t1.dchdate)=11,1,NULL)) AS Nov,
                        COUNT(IF(MONTH(t1.dchdate)=12,1,NULL)) AS Dece,
                        COUNT(IF(MONTH(t1.dchdate)=1,1,NULL)) AS Jan,
                        COUNT(IF(MONTH(t1.dchdate)=2,1,NULL)) AS Feb,
                        COUNT(IF(MONTH(t1.dchdate)=3,1,NULL)) AS Mar,
                        COUNT(IF(MONTH(t1.dchdate)=4,1,NULL)) AS Apr,
                        COUNT(IF(MONTH(t1.dchdate)=5,1,NULL)) AS May,
                        COUNT(IF(MONTH(t1.dchdate)=6,1,NULL)) AS Jun,
                        COUNT(IF(MONTH(t1.dchdate)=7,1,NULL)) AS Jul,
                        COUNT(IF(MONTH(t1.dchdate)=8,1,NULL)) AS Aug,
                        COUNT(IF(MONTH(t1.dchdate)=9,1,NULL)) AS Sep
                    FROM t1 
		      ) pt;";                                                       
        $result1 = \Yii::$app->db1->createCommand($sql1)->queryAll();
        foreach ($result1 as $value1) {
        $rawData[]=[
               'id' => '',
               'pname' => $value1['pname'],
               'goal' => '',
               'oct' => $value1['Oct'],
               'nov' => $value1['Nov'],
               'dec' => $value1['Dece'],
               'jan' => $value1['Jan'],
               'feb' => $value1['Feb'],
               'mar' => $value1['Mar'],
               'apr' => $value1['Apr'],
               'may' => $value1['May'],
               'jun' => $value1['Jun'],
               'jul' => $value1['Jul'],
               'aug' => $value1['Aug'],
               'sep' => $value1['Sep'],
               'total' => $value1['total'], 
        ];               
        }      
        $sql2="SELECT  pname,total,Oct,Nov,Dece,Jan,Feb,Mar,Apr,May,Jun,Jul,Aug,Sep 
                    FROM (
			SELECT 'จำนวนผู้ป่วย Necrotising fasciitis With Shock' AS pname,
                        COUNT(t1.an) total,
                        COUNT(IF(MONTH(t1.dchdate)=10,1,NULL)) AS Oct,
                        COUNT(IF(MONTH(t1.dchdate)=11,1,NULL)) AS Nov,
                        COUNT(IF(MONTH(t1.dchdate)=12,1,NULL)) AS Dece,
                        COUNT(IF(MONTH(t1.dchdate)=1,1,NULL)) AS Jan,
                        COUNT(IF(MONTH(t1.dchdate)=2,1,NULL)) AS Feb,
                        COUNT(IF(MONTH(t1.dchdate)=3,1,NULL)) AS Mar,
                        COUNT(IF(MONTH(t1.dchdate)=4,1,NULL)) AS Apr,
                        COUNT(IF(MONTH(t1.dchdate)=5,1,NULL)) AS May,
                        COUNT(IF(MONTH(t1.dchdate)=6,1,NULL)) AS Jun,
                        COUNT(IF(MONTH(t1.dchdate)=7,1,NULL)) AS Jul,
                        COUNT(IF(MONTH(t1.dchdate)=8,1,NULL)) AS Aug,
                        COUNT(IF(MONTH(t1.dchdate)=9,1,NULL)) AS Sep
                    FROM t1 
			INNER JOIN t2 ON t1.an=t2.an 
		      ) pt;";                                                       
        $result2 = \Yii::$app->db1->createCommand($sql2)->queryAll();
        foreach ($result2 as $value2) {
        $rawData[]=[
               'id' => '',
               'pname' => $value2['pname'],
               'goal' => '',
               'oct' => $value2['Oct'],
               'nov' => $value2['Nov'],
               'dec' => $value2['Dece'],
               'jan' => $value2['Jan'],
               'feb' => $value2['Feb'],
               'mar' => $value2['Mar'],
               'apr' => $value2['Apr'],
               'may' => $value2['May'],
               'jun' => $value2['Jun'],
               'jul' => $value2['Jul'],
               'aug' => $value2['Aug'],
               'sep' => $value2['Sep'],
               'total' => $value2['total'], 
        ];               
        }      
        $sql3="SELECT  pname,total,Oct,Nov,Dece,Jan,Feb,Mar,Apr,May,Jun,Jul,Aug,Sep 
                    FROM (
			SELECT 'จำนวนผู้ป่วย Necrotising fasciitis เสียชีวิต' AS pname,
                        COUNT(t1.an) total,
                        COUNT(IF(MONTH(t1.dchdate)=10,1,NULL)) AS Oct,
                        COUNT(IF(MONTH(t1.dchdate)=11,1,NULL)) AS Nov,
                        COUNT(IF(MONTH(t1.dchdate)=12,1,NULL)) AS Dece,
                        COUNT(IF(MONTH(t1.dchdate)=1,1,NULL)) AS Jan,
                        COUNT(IF(MONTH(t1.dchdate)=2,1,NULL)) AS Feb,
                        COUNT(IF(MONTH(t1.dchdate)=3,1,NULL)) AS Mar,
                        COUNT(IF(MONTH(t1.dchdate)=4,1,NULL)) AS Apr,
                        COUNT(IF(MONTH(t1.dchdate)=5,1,NULL)) AS May,
                        COUNT(IF(MONTH(t1.dchdate)=6,1,NULL)) AS Jun,
                        COUNT(IF(MONTH(t1.dchdate)=7,1,NULL)) AS Jul,
                        COUNT(IF(MONTH(t1.dchdate)=8,1,NULL)) AS Aug,
                        COUNT(IF(MONTH(t1.dchdate)=9,1,NULL)) AS Sep
                    FROM t1 
                    WHERE t1.dchtype IN('08','09')
		      ) pt;";                                                       
        $result3 = \Yii::$app->db1->createCommand($sql3)->queryAll();
        foreach ($result3 as $value3) {
        $rawData[]=[
               'id' => '',
               'pname' => $value3['pname'],
               'goal' => '',
               'oct' => $value3['Oct'],
               'nov' => $value3['Nov'],
               'dec' => $value3['Dece'],
               'jan' => $value3['Jan'],
               'feb' => $value3['Feb'],
               'mar' => $value3['Mar'],
               'apr' => $value3['Apr'],
               'may' => $value3['May'],
               'jun' => $value3['Jun'],
               'jul' => $value3['Jul'],
               'aug' => $value3['Aug'],
               'sep' => $value3['Sep'],
               'total' => $value3['total'], 
        ];               
        }      
        $sql4="SELECT  pname,total,Oct,Nov,Dece,Jan,Feb,Mar,Apr,May,Jun,Jul,Aug,Sep 
                    FROM (
			SELECT 'จำนวนผู้ป่วย Necrotising fasciitis ที่รับไว้รักษาต่อ (Refer In)' AS pname,
                        COUNT(t1.an) total,
                        COUNT(IF(MONTH(t1.dchdate)=10,1,NULL)) AS Oct,
                        COUNT(IF(MONTH(t1.dchdate)=11,1,NULL)) AS Nov,
                        COUNT(IF(MONTH(t1.dchdate)=12,1,NULL)) AS Dece,
                        COUNT(IF(MONTH(t1.dchdate)=1,1,NULL)) AS Jan,
                        COUNT(IF(MONTH(t1.dchdate)=2,1,NULL)) AS Feb,
                        COUNT(IF(MONTH(t1.dchdate)=3,1,NULL)) AS Mar,
                        COUNT(IF(MONTH(t1.dchdate)=4,1,NULL)) AS Apr,
                        COUNT(IF(MONTH(t1.dchdate)=5,1,NULL)) AS May,
                        COUNT(IF(MONTH(t1.dchdate)=6,1,NULL)) AS Jun,
                        COUNT(IF(MONTH(t1.dchdate)=7,1,NULL)) AS Jul,
                        COUNT(IF(MONTH(t1.dchdate)=8,1,NULL)) AS Aug,
                        COUNT(IF(MONTH(t1.dchdate)=9,1,NULL)) AS Sep
                    FROM t1 
                    INNER JOIN referin r ON t1.vn=r.vn
		    ) pt;";                                                       
        $result4 = \Yii::$app->db1->createCommand($sql4)->queryAll();
        foreach ($result4 as $value4) {
        $rawData[]=[
               'id' => '',
               'pname' => $value4['pname'],
               'goal' => '',
               'oct' => $value4['Oct'],
               'nov' => $value4['Nov'],
               'dec' => $value4['Dece'],
               'jan' => $value4['Jan'],
               'feb' => $value4['Feb'],
               'mar' => $value4['Mar'],
               'apr' => $value4['Apr'],
               'may' => $value4['May'],
               'jun' => $value4['Jun'],
               'jul' => $value4['Jul'],
               'aug' => $value4['Aug'],
               'sep' => $value4['Sep'],
               'total' => $value4['total'], 
        ];               
        }      
        $sql5="SELECT  pname,total,Oct,Nov,Dece,Jan,Feb,Mar,Apr,May,Jun,Jul,Aug,Sep 
                    FROM (
			SELECT 'จำนวนผู้ป่วย Necrotising fasciitis ที่ได้รับการส่งต่อ (Refer Out)' AS pname,
                        COUNT(t1.an) total,
                        COUNT(IF(MONTH(t1.dchdate)=10,1,NULL)) AS Oct,
                        COUNT(IF(MONTH(t1.dchdate)=11,1,NULL)) AS Nov,
                        COUNT(IF(MONTH(t1.dchdate)=12,1,NULL)) AS Dece,
                        COUNT(IF(MONTH(t1.dchdate)=1,1,NULL)) AS Jan,
                        COUNT(IF(MONTH(t1.dchdate)=2,1,NULL)) AS Feb,
                        COUNT(IF(MONTH(t1.dchdate)=3,1,NULL)) AS Mar,
                        COUNT(IF(MONTH(t1.dchdate)=4,1,NULL)) AS Apr,
                        COUNT(IF(MONTH(t1.dchdate)=5,1,NULL)) AS May,
                        COUNT(IF(MONTH(t1.dchdate)=6,1,NULL)) AS Jun,
                        COUNT(IF(MONTH(t1.dchdate)=7,1,NULL)) AS Jul,
                        COUNT(IF(MONTH(t1.dchdate)=8,1,NULL)) AS Aug,
                        COUNT(IF(MONTH(t1.dchdate)=9,1,NULL)) AS Sep
                    FROM t1 
                    WHERE t1.dchtype IN('04')
		    ) pt;";                                                       
        $result5 = \Yii::$app->db1->createCommand($sql5)->queryAll();
        foreach ($result5 as $value5) {
        $rawData[]=[
               'id' => '',
               'pname' => $value5['pname'],
               'goal' => '',
               'oct' => $value5['Oct'],
               'nov' => $value5['Nov'],
               'dec' => $value5['Dece'],
               'jan' => $value5['Jan'],
               'feb' => $value5['Feb'],
               'mar' => $value5['Mar'],
               'apr' => $value5['Apr'],
               'may' => $value5['May'],
               'jun' => $value5['Jun'],
               'jul' => $value5['Jul'],
               'aug' => $value5['Aug'],
               'sep' => $value5['Sep'],
               'total' => $value5['total'], 
        ];               
        }      

        $dataProvider = new \yii\data\ArrayDataProvider([
            'allModels' => $rawData,
            'pagination' => [
                'pageSize' => 15,
                ],
        ]);  
        return $this -> render('/site/ipd-sur/pct/pct1_preview',
                    ['dataProvider' => $dataProvider,
                        'names' => $names,
                        'mText' => $this->mText, 
                        'date1' => $date1, 
                        'date2' => $date2,
                        'yrs' => $yrs]);          
    }
    
    public function actionPct2Index() {
        $model = new Formmodel();
        $names="ผลการดำเนินงานการให้บริการ PCT-ศัลยกรรม (Appendicitis)"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;                   
              return $this->redirect(['pct2_preview','name'=>$names,'d1'=>$date1,'d2'=>$date2]);
        }
            return $this -> render('/site/ipd-sur/pct/pct2_index',['mText'=>$this->mText,'names'=>$names,'model' => $model]);
    }    
    public function actionPct2_preview($name,$d1,$d2) {
        $names=$name;
        $date1=$d1;$date2=$d2;    
        $sql="select  IF(MONTH(o.vstdate)>=10,YEAR(o.vstdate)+1 ,YEAR(o.vstdate))+543 AS yrs from ovstdiag o
                where o.vstdate between '{$date1}' and '{$date2}' group by yrs;";
        $result = \Yii::$app->db1->createCommand($sql)->queryAll();      
        foreach ($result as $value) {
               $yrs = $value['yrs'];                                              
        }
        
        \Yii::$app->db1->createCommand("DROP TABLE IF EXISTS t0;")->execute();
        $dt0="CREATE TEMPORARY TABLE t0 AS
                (
                SELECT i.vn,i.an,i.dchdate,i.dchtype
                FROM ipt i
                INNER JOIN iptdiag d ON i.an=d.an
                WHERE i.dchdate BETWEEN '{$date1}' AND '{$date2}'
                AND d.icd10 IN('K352','K353') 
                GROUP BY i.an
                );";
        $rt0 = \Yii::$app->db1->createCommand($dt0)->execute();      
        
        \Yii::$app->db1->createCommand("DROP TABLE IF EXISTS t1;")->execute();
        $dt1="CREATE TEMPORARY TABLE t1 AS
                (
                SELECT i.vn,i.an,i.dchdate,i.dchtype
                FROM ipt i
                INNER JOIN iptdiag d ON i.an=d.an
                WHERE i.dchdate BETWEEN '{$date1}' AND '{$date2}'
                AND d.icd10 IN('K352','K353','K358','K36','K37','K38') 
                GROUP BY i.an
                );";
        $rt1 = \Yii::$app->db1->createCommand($dt1)->execute();      
        \Yii::$app->db1->createCommand("DROP TABLE IF EXISTS t2;")->execute();
        $dt2="CREATE TEMPORARY TABLE t2 AS
                (
                SELECT i.vn,i.an,i.dchdate,i.dchtype
                FROM ipt i
                INNER JOIN iptoprt o ON i.an=o.an
                WHERE i.dchdate BETWEEN '{$date1}' AND '{$date2}'
                AND o.icd9 IN('4701','4709') 
                GROUP BY i.an
                );";
        $rt2 = \Yii::$app->db1->createCommand($dt2)->execute();      
        
        $rawData=[];
        $sql0="SELECT  pname,total,Oct,Nov,Dece,Jan,Feb,Mar,Apr,May,Jun,Jul,Aug,Sep 
                    FROM (
			SELECT 'จำนวนผู้ป่วยที่ได้รับการวินิจฉัยว่าเป็นไส้ติ่งอักเสบหลังจากการผ่าตัดพบว่าเป็นไส้ติ่งแตก (ICD10=K352 Last Dx,K353) (ผลงาน) ' AS pname,
                        COUNT(t0.an) total,
                        COUNT(IF(MONTH(t0.dchdate)=10,1,NULL)) AS Oct,
                        COUNT(IF(MONTH(t0.dchdate)=11,1,NULL)) AS Nov,
                        COUNT(IF(MONTH(t0.dchdate)=12,1,NULL)) AS Dece,
                        COUNT(IF(MONTH(t0.dchdate)=1,1,NULL)) AS Jan,
                        COUNT(IF(MONTH(t0.dchdate)=2,1,NULL)) AS Feb,
                        COUNT(IF(MONTH(t0.dchdate)=3,1,NULL)) AS Mar,
                        COUNT(IF(MONTH(t0.dchdate)=4,1,NULL)) AS Apr,
                        COUNT(IF(MONTH(t0.dchdate)=5,1,NULL)) AS May,
                        COUNT(IF(MONTH(t0.dchdate)=6,1,NULL)) AS Jun,
                        COUNT(IF(MONTH(t0.dchdate)=7,1,NULL)) AS Jul,
                        COUNT(IF(MONTH(t0.dchdate)=8,1,NULL)) AS Aug,
                        COUNT(IF(MONTH(t0.dchdate)=9,1,NULL)) AS Sep
                    FROM t0 
		      ) pt;";                                                       
        $result0 = \Yii::$app->db1->createCommand($sql0)->queryAll();
        foreach ($result0 as $value0) {
        $rawData[]=[
               'id' => '',
               'pname' => $value0['pname'],
               'goal' => '',
               'oct' => $value0['Oct'],
               'nov' => $value0['Nov'],
               'dec' => $value0['Dece'],
               'jan' => $value0['Jan'],
               'feb' => $value0['Feb'],
               'mar' => $value0['Mar'],
               'apr' => $value0['Apr'],
               'may' => $value0['May'],
               'jun' => $value0['Jun'],
               'jul' => $value0['Jul'],
               'aug' => $value0['Aug'],
               'sep' => $value0['Sep'],
               'total' => $value0['total'], 
        ];               
        }      
        
        $sql1="SELECT  pname,total,Oct,Nov,Dece,Jan,Feb,Mar,Apr,May,Jun,Jul,Aug,Sep 
                    FROM (
			SELECT 'จำนวนผู้ป่วยที่ได้รับการวินิจฉัยว่าเป็นไส้ติ่งอักเสบ(ICD10=K352,Last Dx)(K353,K358 First Dx นับซ้ำ) (เป้าหมาย)' AS pname,
                        COUNT(t1.an) total,
                        COUNT(IF(MONTH(t1.dchdate)=10,1,NULL)) AS Oct,
                        COUNT(IF(MONTH(t1.dchdate)=11,1,NULL)) AS Nov,
                        COUNT(IF(MONTH(t1.dchdate)=12,1,NULL)) AS Dece,
                        COUNT(IF(MONTH(t1.dchdate)=1,1,NULL)) AS Jan,
                        COUNT(IF(MONTH(t1.dchdate)=2,1,NULL)) AS Feb,
                        COUNT(IF(MONTH(t1.dchdate)=3,1,NULL)) AS Mar,
                        COUNT(IF(MONTH(t1.dchdate)=4,1,NULL)) AS Apr,
                        COUNT(IF(MONTH(t1.dchdate)=5,1,NULL)) AS May,
                        COUNT(IF(MONTH(t1.dchdate)=6,1,NULL)) AS Jun,
                        COUNT(IF(MONTH(t1.dchdate)=7,1,NULL)) AS Jul,
                        COUNT(IF(MONTH(t1.dchdate)=8,1,NULL)) AS Aug,
                        COUNT(IF(MONTH(t1.dchdate)=9,1,NULL)) AS Sep
                    FROM t1 
		      ) pt;";                                                       
        $result1 = \Yii::$app->db1->createCommand($sql1)->queryAll();
        foreach ($result1 as $value1) {
        $rawData[]=[
               'id' => '',
               'pname' => $value1['pname'],
               'goal' => '',
               'oct' => $value1['Oct'],
               'nov' => $value1['Nov'],
               'dec' => $value1['Dece'],
               'jan' => $value1['Jan'],
               'feb' => $value1['Feb'],
               'mar' => $value1['Mar'],
               'apr' => $value1['Apr'],
               'may' => $value1['May'],
               'jun' => $value1['Jun'],
               'jul' => $value1['Jul'],
               'aug' => $value1['Aug'],
               'sep' => $value1['Sep'],
               'total' => $value1['total'], 
        ];               
        }      
        $sql2="SELECT  pname,total,Oct,Nov,Dece,Jan,Feb,Mar,Apr,May,Jun,Jul,Aug,Sep 
                    FROM (
			SELECT 'จำนวนผู้ป่วย Appendectomy' AS pname,
                        COUNT(t1.an) total,
                        COUNT(IF(MONTH(t1.dchdate)=10,1,NULL)) AS Oct,
                        COUNT(IF(MONTH(t1.dchdate)=11,1,NULL)) AS Nov,
                        COUNT(IF(MONTH(t1.dchdate)=12,1,NULL)) AS Dece,
                        COUNT(IF(MONTH(t1.dchdate)=1,1,NULL)) AS Jan,
                        COUNT(IF(MONTH(t1.dchdate)=2,1,NULL)) AS Feb,
                        COUNT(IF(MONTH(t1.dchdate)=3,1,NULL)) AS Mar,
                        COUNT(IF(MONTH(t1.dchdate)=4,1,NULL)) AS Apr,
                        COUNT(IF(MONTH(t1.dchdate)=5,1,NULL)) AS May,
                        COUNT(IF(MONTH(t1.dchdate)=6,1,NULL)) AS Jun,
                        COUNT(IF(MONTH(t1.dchdate)=7,1,NULL)) AS Jul,
                        COUNT(IF(MONTH(t1.dchdate)=8,1,NULL)) AS Aug,
                        COUNT(IF(MONTH(t1.dchdate)=9,1,NULL)) AS Sep
                    FROM t1 
			INNER JOIN t2 ON t1.an=t2.an 
		      ) pt;";                                                       
        $result2 = \Yii::$app->db1->createCommand($sql2)->queryAll();
        foreach ($result2 as $value2) {
        $rawData[]=[
               'id' => '',
               'pname' => $value2['pname'],
               'goal' => '',
               'oct' => $value2['Oct'],
               'nov' => $value2['Nov'],
               'dec' => $value2['Dece'],
               'jan' => $value2['Jan'],
               'feb' => $value2['Feb'],
               'mar' => $value2['Mar'],
               'apr' => $value2['Apr'],
               'may' => $value2['May'],
               'jun' => $value2['Jun'],
               'jul' => $value2['Jul'],
               'aug' => $value2['Aug'],
               'sep' => $value2['Sep'],
               'total' => $value2['total'], 
        ];               
        }      
        $sql3="SELECT  pname,total,Oct,Nov,Dece,Jan,Feb,Mar,Apr,May,Jun,Jul,Aug,Sep 
                    FROM (
			SELECT 'จำนวนผู้ป่วย Appendicitis เสียชีวิต' AS pname,
                        COUNT(t1.an) total,
                        COUNT(IF(MONTH(t1.dchdate)=10,1,NULL)) AS Oct,
                        COUNT(IF(MONTH(t1.dchdate)=11,1,NULL)) AS Nov,
                        COUNT(IF(MONTH(t1.dchdate)=12,1,NULL)) AS Dece,
                        COUNT(IF(MONTH(t1.dchdate)=1,1,NULL)) AS Jan,
                        COUNT(IF(MONTH(t1.dchdate)=2,1,NULL)) AS Feb,
                        COUNT(IF(MONTH(t1.dchdate)=3,1,NULL)) AS Mar,
                        COUNT(IF(MONTH(t1.dchdate)=4,1,NULL)) AS Apr,
                        COUNT(IF(MONTH(t1.dchdate)=5,1,NULL)) AS May,
                        COUNT(IF(MONTH(t1.dchdate)=6,1,NULL)) AS Jun,
                        COUNT(IF(MONTH(t1.dchdate)=7,1,NULL)) AS Jul,
                        COUNT(IF(MONTH(t1.dchdate)=8,1,NULL)) AS Aug,
                        COUNT(IF(MONTH(t1.dchdate)=9,1,NULL)) AS Sep
                    FROM t1 
                    WHERE t1.dchtype IN('08','09')
		      ) pt;";                                                       
        $result3 = \Yii::$app->db1->createCommand($sql3)->queryAll();
        foreach ($result3 as $value3) {
        $rawData[]=[
               'id' => '',
               'pname' => $value3['pname'],
               'goal' => '',
               'oct' => $value3['Oct'],
               'nov' => $value3['Nov'],
               'dec' => $value3['Dece'],
               'jan' => $value3['Jan'],
               'feb' => $value3['Feb'],
               'mar' => $value3['Mar'],
               'apr' => $value3['Apr'],
               'may' => $value3['May'],
               'jun' => $value3['Jun'],
               'jul' => $value3['Jul'],
               'aug' => $value3['Aug'],
               'sep' => $value3['Sep'],
               'total' => $value3['total'], 
        ];               
        }      
        $sql4="SELECT  pname,total,Oct,Nov,Dece,Jan,Feb,Mar,Apr,May,Jun,Jul,Aug,Sep 
                    FROM (
			SELECT 'จำนวนผู้ป่วย Appendicitis ที่รับไว้รักษาต่อ (Refer In)' AS pname,
                        COUNT(t1.an) total,
                        COUNT(IF(MONTH(t1.dchdate)=10,1,NULL)) AS Oct,
                        COUNT(IF(MONTH(t1.dchdate)=11,1,NULL)) AS Nov,
                        COUNT(IF(MONTH(t1.dchdate)=12,1,NULL)) AS Dece,
                        COUNT(IF(MONTH(t1.dchdate)=1,1,NULL)) AS Jan,
                        COUNT(IF(MONTH(t1.dchdate)=2,1,NULL)) AS Feb,
                        COUNT(IF(MONTH(t1.dchdate)=3,1,NULL)) AS Mar,
                        COUNT(IF(MONTH(t1.dchdate)=4,1,NULL)) AS Apr,
                        COUNT(IF(MONTH(t1.dchdate)=5,1,NULL)) AS May,
                        COUNT(IF(MONTH(t1.dchdate)=6,1,NULL)) AS Jun,
                        COUNT(IF(MONTH(t1.dchdate)=7,1,NULL)) AS Jul,
                        COUNT(IF(MONTH(t1.dchdate)=8,1,NULL)) AS Aug,
                        COUNT(IF(MONTH(t1.dchdate)=9,1,NULL)) AS Sep
                    FROM t1 
                    INNER JOIN referin r ON t1.vn=r.vn
		    ) pt;";                                                       
        $result4 = \Yii::$app->db1->createCommand($sql4)->queryAll();
        foreach ($result4 as $value4) {
        $rawData[]=[
               'id' => '',
               'pname' => $value4['pname'],
               'goal' => '',
               'oct' => $value4['Oct'],
               'nov' => $value4['Nov'],
               'dec' => $value4['Dece'],
               'jan' => $value4['Jan'],
               'feb' => $value4['Feb'],
               'mar' => $value4['Mar'],
               'apr' => $value4['Apr'],
               'may' => $value4['May'],
               'jun' => $value4['Jun'],
               'jul' => $value4['Jul'],
               'aug' => $value4['Aug'],
               'sep' => $value4['Sep'],
               'total' => $value4['total'], 
        ];               
        }      
        $sql5="SELECT  pname,total,Oct,Nov,Dece,Jan,Feb,Mar,Apr,May,Jun,Jul,Aug,Sep 
                    FROM (
			SELECT 'จำนวนผู้ป่วย Appendicitis ที่ได้รับการส่งต่อ (Refer Out)' AS pname,
                        COUNT(t1.an) total,
                        COUNT(IF(MONTH(t1.dchdate)=10,1,NULL)) AS Oct,
                        COUNT(IF(MONTH(t1.dchdate)=11,1,NULL)) AS Nov,
                        COUNT(IF(MONTH(t1.dchdate)=12,1,NULL)) AS Dece,
                        COUNT(IF(MONTH(t1.dchdate)=1,1,NULL)) AS Jan,
                        COUNT(IF(MONTH(t1.dchdate)=2,1,NULL)) AS Feb,
                        COUNT(IF(MONTH(t1.dchdate)=3,1,NULL)) AS Mar,
                        COUNT(IF(MONTH(t1.dchdate)=4,1,NULL)) AS Apr,
                        COUNT(IF(MONTH(t1.dchdate)=5,1,NULL)) AS May,
                        COUNT(IF(MONTH(t1.dchdate)=6,1,NULL)) AS Jun,
                        COUNT(IF(MONTH(t1.dchdate)=7,1,NULL)) AS Jul,
                        COUNT(IF(MONTH(t1.dchdate)=8,1,NULL)) AS Aug,
                        COUNT(IF(MONTH(t1.dchdate)=9,1,NULL)) AS Sep
                    FROM t1 
                    WHERE t1.dchtype IN('04')
		    ) pt;";                                                       
        $result5 = \Yii::$app->db1->createCommand($sql5)->queryAll();
        foreach ($result5 as $value5) {
        $rawData[]=[
               'id' => '',
               'pname' => $value5['pname'],
               'goal' => '',
               'oct' => $value5['Oct'],
               'nov' => $value5['Nov'],
               'dec' => $value5['Dece'],
               'jan' => $value5['Jan'],
               'feb' => $value5['Feb'],
               'mar' => $value5['Mar'],
               'apr' => $value5['Apr'],
               'may' => $value5['May'],
               'jun' => $value5['Jun'],
               'jul' => $value5['Jul'],
               'aug' => $value5['Aug'],
               'sep' => $value5['Sep'],
               'total' => $value5['total'], 
        ];               
        }      

        $dataProvider = new \yii\data\ArrayDataProvider([
            'allModels' => $rawData,
            'pagination' => [
                'pageSize' => 15,
                ],
        ]);  
        return $this -> render('/site/ipd-sur/pct/pct2_preview',
                    ['dataProvider' => $dataProvider,
                        'names' => $names,
                        'mText' => $this->mText, 
                        'date1' => $date1, 
                        'date2' => $date2,
                        'yrs' => $yrs]);          
    }
    
    public function actionPct3Index() {
        $model = new Formmodel();
        $names="ผลการดำเนินงานการให้บริการ PCT-ศัลยกรรม (ที่ทำหัตถการ EGD/Colonoscope/Hernioraphy/Wipple Operation)"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;                   
              return $this->redirect(['pct3_preview','name'=>$names,'d1'=>$date1,'d2'=>$date2]);
        }
            return $this -> render('/site/ipd-sur/pct/pct3_index',['mText'=>$this->mText,'names'=>$names,'model' => $model]);
    }    
    public function actionPct3_preview($name,$d1,$d2) {
        $names=$name;
        $date1=$d1;$date2=$d2;    
        $sql="select  IF(MONTH(o.vstdate)>=10,YEAR(o.vstdate)+1 ,YEAR(o.vstdate))+543 AS yrs from ovstdiag o
                where o.vstdate between '{$date1}' and '{$date2}' group by yrs;";
        $result = \Yii::$app->db1->createCommand($sql)->queryAll();      
        foreach ($result as $value) {
               $yrs = $value['yrs'];                                              
        }
        \Yii::$app->db1->createCommand("DROP TABLE IF EXISTS t1;")->execute();
        $dt1="CREATE TEMPORARY TABLE t1 AS
                (
                SELECT i.vn,i.an,i.dchdate,i.dchtype,d.icd9
                FROM ipt i
                INNER JOIN iptoprt d ON i.an=d.an
                WHERE i.dchdate BETWEEN '{$date1}' AND '{$date2}'
                AND d.icd9 IN('4513','4523','4516','5300','5302','5310','5253') 
                GROUP BY i.an
                );";
        $rt1 = \Yii::$app->db1->createCommand($dt1)->execute();      
        
        $rawData=[];
        $sql1="SELECT  pname,total,Oct,Nov,Dece,Jan,Feb,Mar,Apr,May,Jun,Jul,Aug,Sep 
                    FROM (
			SELECT 'EGD (ICD9CM=4513)' AS pname,
                        COUNT(t1.an) total,
                        COUNT(IF(MONTH(t1.dchdate)=10,1,NULL)) AS Oct,
                        COUNT(IF(MONTH(t1.dchdate)=11,1,NULL)) AS Nov,
                        COUNT(IF(MONTH(t1.dchdate)=12,1,NULL)) AS Dece,
                        COUNT(IF(MONTH(t1.dchdate)=1,1,NULL)) AS Jan,
                        COUNT(IF(MONTH(t1.dchdate)=2,1,NULL)) AS Feb,
                        COUNT(IF(MONTH(t1.dchdate)=3,1,NULL)) AS Mar,
                        COUNT(IF(MONTH(t1.dchdate)=4,1,NULL)) AS Apr,
                        COUNT(IF(MONTH(t1.dchdate)=5,1,NULL)) AS May,
                        COUNT(IF(MONTH(t1.dchdate)=6,1,NULL)) AS Jun,
                        COUNT(IF(MONTH(t1.dchdate)=7,1,NULL)) AS Jul,
                        COUNT(IF(MONTH(t1.dchdate)=8,1,NULL)) AS Aug,
                        COUNT(IF(MONTH(t1.dchdate)=9,1,NULL)) AS Sep
                    FROM t1 
                    WHERE icd9='4513'
		      ) pt;";                                                       
        $result1 = \Yii::$app->db1->createCommand($sql1)->queryAll();
        foreach ($result1 as $value1) {
        $rawData[]=[
               'id' => '',
               'pname' => $value1['pname'],
               'goal' => '',
               'oct' => $value1['Oct'],
               'nov' => $value1['Nov'],
               'dec' => $value1['Dece'],
               'jan' => $value1['Jan'],
               'feb' => $value1['Feb'],
               'mar' => $value1['Mar'],
               'apr' => $value1['Apr'],
               'may' => $value1['May'],
               'jun' => $value1['Jun'],
               'jul' => $value1['Jul'],
               'aug' => $value1['Aug'],
               'sep' => $value1['Sep'],
               'total' => $value1['total'], 
        ];               
        }      
        $sql2="SELECT  pname,total,Oct,Nov,Dece,Jan,Feb,Mar,Apr,May,Jun,Jul,Aug,Sep 
                    FROM (
			SELECT 'Colonoscope (ICD9CM=4516)' AS pname,
                        COUNT(t1.an) total,
                        COUNT(IF(MONTH(t1.dchdate)=10,1,NULL)) AS Oct,
                        COUNT(IF(MONTH(t1.dchdate)=11,1,NULL)) AS Nov,
                        COUNT(IF(MONTH(t1.dchdate)=12,1,NULL)) AS Dece,
                        COUNT(IF(MONTH(t1.dchdate)=1,1,NULL)) AS Jan,
                        COUNT(IF(MONTH(t1.dchdate)=2,1,NULL)) AS Feb,
                        COUNT(IF(MONTH(t1.dchdate)=3,1,NULL)) AS Mar,
                        COUNT(IF(MONTH(t1.dchdate)=4,1,NULL)) AS Apr,
                        COUNT(IF(MONTH(t1.dchdate)=5,1,NULL)) AS May,
                        COUNT(IF(MONTH(t1.dchdate)=6,1,NULL)) AS Jun,
                        COUNT(IF(MONTH(t1.dchdate)=7,1,NULL)) AS Jul,
                        COUNT(IF(MONTH(t1.dchdate)=8,1,NULL)) AS Aug,
                        COUNT(IF(MONTH(t1.dchdate)=9,1,NULL)) AS Sep
                    FROM t1 
                    WHERE icd9='4516'
		    ) pt;";                                                       
        $result2 = \Yii::$app->db1->createCommand($sql2)->queryAll();
        foreach ($result2 as $value2) {
        $rawData[]=[
               'id' => '',
               'pname' => $value2['pname'],
               'goal' => '',
               'oct' => $value2['Oct'],
               'nov' => $value2['Nov'],
               'dec' => $value2['Dece'],
               'jan' => $value2['Jan'],
               'feb' => $value2['Feb'],
               'mar' => $value2['Mar'],
               'apr' => $value2['Apr'],
               'may' => $value2['May'],
               'jun' => $value2['Jun'],
               'jul' => $value2['Jul'],
               'aug' => $value2['Aug'],
               'sep' => $value2['Sep'],
               'total' => $value2['total'], 
        ];               
        }      
        $sql3="SELECT  pname,total,Oct,Nov,Dece,Jan,Feb,Mar,Apr,May,Jun,Jul,Aug,Sep 
                    FROM (
			SELECT 'EGD With Biobsy (ICD9CM=4516)' AS pname,
                        COUNT(t1.an) total,
                        COUNT(IF(MONTH(t1.dchdate)=10,1,NULL)) AS Oct,
                        COUNT(IF(MONTH(t1.dchdate)=11,1,NULL)) AS Nov,
                        COUNT(IF(MONTH(t1.dchdate)=12,1,NULL)) AS Dece,
                        COUNT(IF(MONTH(t1.dchdate)=1,1,NULL)) AS Jan,
                        COUNT(IF(MONTH(t1.dchdate)=2,1,NULL)) AS Feb,
                        COUNT(IF(MONTH(t1.dchdate)=3,1,NULL)) AS Mar,
                        COUNT(IF(MONTH(t1.dchdate)=4,1,NULL)) AS Apr,
                        COUNT(IF(MONTH(t1.dchdate)=5,1,NULL)) AS May,
                        COUNT(IF(MONTH(t1.dchdate)=6,1,NULL)) AS Jun,
                        COUNT(IF(MONTH(t1.dchdate)=7,1,NULL)) AS Jul,
                        COUNT(IF(MONTH(t1.dchdate)=8,1,NULL)) AS Aug,
                        COUNT(IF(MONTH(t1.dchdate)=9,1,NULL)) AS Sep
                    FROM t1 
                    WHERE t1.icd9='4516'
		      ) pt;";                                                       
        $result3 = \Yii::$app->db1->createCommand($sql3)->queryAll();
        foreach ($result3 as $value3) {
        $rawData[]=[
               'id' => '',
               'pname' => $value3['pname'],
               'goal' => '',
               'oct' => $value3['Oct'],
               'nov' => $value3['Nov'],
               'dec' => $value3['Dece'],
               'jan' => $value3['Jan'],
               'feb' => $value3['Feb'],
               'mar' => $value3['Mar'],
               'apr' => $value3['Apr'],
               'may' => $value3['May'],
               'jun' => $value3['Jun'],
               'jul' => $value3['Jul'],
               'aug' => $value3['Aug'],
               'sep' => $value3['Sep'],
               'total' => $value3['total'], 
        ];               
        }      
        $sql4="SELECT  pname,total,Oct,Nov,Dece,Jan,Feb,Mar,Apr,May,Jun,Jul,Aug,Sep 
                    FROM (
			SELECT 'Hernioraphy (ICD9CM=5300,5302,5310)' AS pname,
                        COUNT(t1.an) total,
                        COUNT(IF(MONTH(t1.dchdate)=10,1,NULL)) AS Oct,
                        COUNT(IF(MONTH(t1.dchdate)=11,1,NULL)) AS Nov,
                        COUNT(IF(MONTH(t1.dchdate)=12,1,NULL)) AS Dece,
                        COUNT(IF(MONTH(t1.dchdate)=1,1,NULL)) AS Jan,
                        COUNT(IF(MONTH(t1.dchdate)=2,1,NULL)) AS Feb,
                        COUNT(IF(MONTH(t1.dchdate)=3,1,NULL)) AS Mar,
                        COUNT(IF(MONTH(t1.dchdate)=4,1,NULL)) AS Apr,
                        COUNT(IF(MONTH(t1.dchdate)=5,1,NULL)) AS May,
                        COUNT(IF(MONTH(t1.dchdate)=6,1,NULL)) AS Jun,
                        COUNT(IF(MONTH(t1.dchdate)=7,1,NULL)) AS Jul,
                        COUNT(IF(MONTH(t1.dchdate)=8,1,NULL)) AS Aug,
                        COUNT(IF(MONTH(t1.dchdate)=9,1,NULL)) AS Sep
                    FROM t1 
                    WHERE t1.icd9 IN('5300','5302','5310')
		      ) pt;";                                                       
        $result4 = \Yii::$app->db1->createCommand($sql4)->queryAll();
        foreach ($result4 as $value4) {
        $rawData[]=[
               'id' => '',
               'pname' => $value4['pname'],
               'goal' => '',
               'oct' => $value4['Oct'],
               'nov' => $value4['Nov'],
               'dec' => $value4['Dece'],
               'jan' => $value4['Jan'],
               'feb' => $value4['Feb'],
               'mar' => $value4['Mar'],
               'apr' => $value4['Apr'],
               'may' => $value4['May'],
               'jun' => $value4['Jun'],
               'jul' => $value4['Jul'],
               'aug' => $value4['Aug'],
               'sep' => $value4['Sep'],
               'total' => $value4['total'], 
        ];               
        }      
        $sql5="SELECT  pname,total,Oct,Nov,Dece,Jan,Feb,Mar,Apr,May,Jun,Jul,Aug,Sep 
                    FROM (
			SELECT 'Wipple Operation (ICD9CM=5253)' AS pname,
                        COUNT(t1.an) total,
                        COUNT(IF(MONTH(t1.dchdate)=10,1,NULL)) AS Oct,
                        COUNT(IF(MONTH(t1.dchdate)=11,1,NULL)) AS Nov,
                        COUNT(IF(MONTH(t1.dchdate)=12,1,NULL)) AS Dece,
                        COUNT(IF(MONTH(t1.dchdate)=1,1,NULL)) AS Jan,
                        COUNT(IF(MONTH(t1.dchdate)=2,1,NULL)) AS Feb,
                        COUNT(IF(MONTH(t1.dchdate)=3,1,NULL)) AS Mar,
                        COUNT(IF(MONTH(t1.dchdate)=4,1,NULL)) AS Apr,
                        COUNT(IF(MONTH(t1.dchdate)=5,1,NULL)) AS May,
                        COUNT(IF(MONTH(t1.dchdate)=6,1,NULL)) AS Jun,
                        COUNT(IF(MONTH(t1.dchdate)=7,1,NULL)) AS Jul,
                        COUNT(IF(MONTH(t1.dchdate)=8,1,NULL)) AS Aug,
                        COUNT(IF(MONTH(t1.dchdate)=9,1,NULL)) AS Sep
                    FROM t1 
                    WHERE t1.icd9='5253'
		    ) pt;";                                                       
        $result5 = \Yii::$app->db1->createCommand($sql5)->queryAll();
        foreach ($result5 as $value5) {
        $rawData[]=[
               'id' => '',
               'pname' => $value5['pname'],
               'goal' => '',
               'oct' => $value5['Oct'],
               'nov' => $value5['Nov'],
               'dec' => $value5['Dece'],
               'jan' => $value5['Jan'],
               'feb' => $value5['Feb'],
               'mar' => $value5['Mar'],
               'apr' => $value5['Apr'],
               'may' => $value5['May'],
               'jun' => $value5['Jun'],
               'jul' => $value5['Jul'],
               'aug' => $value5['Aug'],
               'sep' => $value5['Sep'],
               'total' => $value5['total'], 
        ];               
        }      

        $dataProvider = new \yii\data\ArrayDataProvider([
            'allModels' => $rawData,
            'pagination' => [
                'pageSize' => 15,
                ],
        ]);  
        return $this -> render('/site/ipd-sur/pct/pct3_preview',
                    ['dataProvider' => $dataProvider,
                        'names' => $names,
                        'mText' => $this->mText, 
                        'date1' => $date1, 
                        'date2' => $date2,
                        'yrs' => $yrs]);          
    }
    
    public function actionPct4Index() {
        $model = new Formmodel();
        $names="ผลการดำเนินงานการให้บริการ PCT-ศัลยกรรม (UGI Bleeding)"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;                   
              return $this->redirect(['pct4_preview','name'=>$names,'d1'=>$date1,'d2'=>$date2]);
        }
            return $this -> render('/site/ipd-sur/pct/pct4_index',['mText'=>$this->mText,'names'=>$names,'model' => $model]);
    }    
    public function actionPct4_preview($name,$d1,$d2) {
        $names=$name;
        $date1=$d1;$date2=$d2;    
        $sql="select  IF(MONTH(o.vstdate)>=10,YEAR(o.vstdate)+1 ,YEAR(o.vstdate))+543 AS yrs from ovstdiag o
                where o.vstdate between '{$date1}' and '{$date2}' group by yrs;";
        $result = \Yii::$app->db1->createCommand($sql)->queryAll();      
        foreach ($result as $value) {
               $yrs = $value['yrs'];                                              
        }
        \Yii::$app->db1->createCommand("DROP TABLE IF EXISTS t1;")->execute();
        $dt1="CREATE TEMPORARY TABLE t1 AS
                (
                SELECT i.vn,i.an,i.dchdate,i.dchtype,a.admdate,i.spclty
                FROM ipt i
                INNER JOIN an_stat a ON i.an=a.an
                INNER JOIN iptdiag d ON i.an=d.an
                WHERE i.dchdate BETWEEN '{$date1}' AND '{$date2}'
                AND ((d.icd10 BETWEEN 'K262' AND 'K269') OR d.icd10 = 'K260' OR (d.icd10 BETWEEN 'K290' AND 'K299') 
                OR (d.icd10 BETWEEN 'K252' AND 'K259')  OR d.icd10 = 'K250' OR d.icd10 in ('I850','I859','K226'))               
                GROUP BY i.an
                );";
        $rt1 = \Yii::$app->db1->createCommand($dt1)->execute();      
        \Yii::$app->db1->createCommand("DROP TABLE IF EXISTS t2;")->execute();
        $dt2="CREATE TEMPORARY TABLE t2 AS
                (
                SELECT i.vn,i.an,i.dchdate,i.dchtype
                FROM ipt i
                INNER JOIN iptdiag d ON i.an=d.an
                WHERE i.dchdate BETWEEN '{$date1}' AND '{$date2}'
                AND d.icd10='R571' 
                GROUP BY i.an
                );";
        $rt2 = \Yii::$app->db1->createCommand($dt2)->execute();      
        
        $rawData=[];
        $sql1="SELECT  pname,total,Oct,Nov,Dece,Jan,Feb,Mar,Apr,May,Jun,Jul,Aug,Sep 
                    FROM (
			SELECT 'จำนวนผู้ป่วย UGI Bleeding ' AS pname,
                        COUNT(t1.an) total,
                        COUNT(IF(MONTH(t1.dchdate)=10,1,NULL)) AS Oct,
                        COUNT(IF(MONTH(t1.dchdate)=11,1,NULL)) AS Nov,
                        COUNT(IF(MONTH(t1.dchdate)=12,1,NULL)) AS Dece,
                        COUNT(IF(MONTH(t1.dchdate)=1,1,NULL)) AS Jan,
                        COUNT(IF(MONTH(t1.dchdate)=2,1,NULL)) AS Feb,
                        COUNT(IF(MONTH(t1.dchdate)=3,1,NULL)) AS Mar,
                        COUNT(IF(MONTH(t1.dchdate)=4,1,NULL)) AS Apr,
                        COUNT(IF(MONTH(t1.dchdate)=5,1,NULL)) AS May,
                        COUNT(IF(MONTH(t1.dchdate)=6,1,NULL)) AS Jun,
                        COUNT(IF(MONTH(t1.dchdate)=7,1,NULL)) AS Jul,
                        COUNT(IF(MONTH(t1.dchdate)=8,1,NULL)) AS Aug,
                        COUNT(IF(MONTH(t1.dchdate)=9,1,NULL)) AS Sep
                    FROM t1 
                    WHERE admdate>1 AND spclty = '02'
		      ) pt;";                                                       
        $result1 = \Yii::$app->db1->createCommand($sql1)->queryAll();
        foreach ($result1 as $value1) {
        $rawData[]=[
               'id' => '',
               'pname' => $value1['pname'],
               'goal' => '',
               'oct' => $value1['Oct'],
               'nov' => $value1['Nov'],
               'dec' => $value1['Dece'],
               'jan' => $value1['Jan'],
               'feb' => $value1['Feb'],
               'mar' => $value1['Mar'],
               'apr' => $value1['Apr'],
               'may' => $value1['May'],
               'jun' => $value1['Jun'],
               'jul' => $value1['Jul'],
               'aug' => $value1['Aug'],
               'sep' => $value1['Sep'],
               'total' => $value1['total'], 
        ];               
        }      
        $sql2="SELECT  pname,total,Oct,Nov,Dece,Jan,Feb,Mar,Apr,May,Jun,Jul,Aug,Sep 
                    FROM (
			SELECT 'จำนวนผู้ป่วย UGI Bleeding With Shock' AS pname,
                        COUNT(t1.an) total,
                        COUNT(IF(MONTH(t1.dchdate)=10,1,NULL)) AS Oct,
                        COUNT(IF(MONTH(t1.dchdate)=11,1,NULL)) AS Nov,
                        COUNT(IF(MONTH(t1.dchdate)=12,1,NULL)) AS Dece,
                        COUNT(IF(MONTH(t1.dchdate)=1,1,NULL)) AS Jan,
                        COUNT(IF(MONTH(t1.dchdate)=2,1,NULL)) AS Feb,
                        COUNT(IF(MONTH(t1.dchdate)=3,1,NULL)) AS Mar,
                        COUNT(IF(MONTH(t1.dchdate)=4,1,NULL)) AS Apr,
                        COUNT(IF(MONTH(t1.dchdate)=5,1,NULL)) AS May,
                        COUNT(IF(MONTH(t1.dchdate)=6,1,NULL)) AS Jun,
                        COUNT(IF(MONTH(t1.dchdate)=7,1,NULL)) AS Jul,
                        COUNT(IF(MONTH(t1.dchdate)=8,1,NULL)) AS Aug,
                        COUNT(IF(MONTH(t1.dchdate)=9,1,NULL)) AS Sep
                      FROM t1 
	        INNER JOIN t2 ON t1.an=t2.an 
                      WHERE t1.spclty='02'  
		      ) pt;";                                                       
        $result2 = \Yii::$app->db1->createCommand($sql2)->queryAll();
        foreach ($result2 as $value2) {
        $rawData[]=[
               'id' => '',
               'pname' => $value2['pname'],
               'goal' => '',
               'oct' => $value2['Oct'],
               'nov' => $value2['Nov'],
               'dec' => $value2['Dece'],
               'jan' => $value2['Jan'],
               'feb' => $value2['Feb'],
               'mar' => $value2['Mar'],
               'apr' => $value2['Apr'],
               'may' => $value2['May'],
               'jun' => $value2['Jun'],
               'jul' => $value2['Jul'],
               'aug' => $value2['Aug'],
               'sep' => $value2['Sep'],
               'total' => $value2['total'], 
        ];               
        }      
        $sql3="SELECT  pname,total,Oct,Nov,Dece,Jan,Feb,Mar,Apr,May,Jun,Jul,Aug,Sep 
                    FROM (
			SELECT 'จำนวนผู้ป่วย UGI Bleeding With EGD' AS pname,
                        COUNT(t1.an) total,
                        COUNT(IF(MONTH(t1.dchdate)=10,1,NULL)) AS Oct,
                        COUNT(IF(MONTH(t1.dchdate)=11,1,NULL)) AS Nov,
                        COUNT(IF(MONTH(t1.dchdate)=12,1,NULL)) AS Dece,
                        COUNT(IF(MONTH(t1.dchdate)=1,1,NULL)) AS Jan,
                        COUNT(IF(MONTH(t1.dchdate)=2,1,NULL)) AS Feb,
                        COUNT(IF(MONTH(t1.dchdate)=3,1,NULL)) AS Mar,
                        COUNT(IF(MONTH(t1.dchdate)=4,1,NULL)) AS Apr,
                        COUNT(IF(MONTH(t1.dchdate)=5,1,NULL)) AS May,
                        COUNT(IF(MONTH(t1.dchdate)=6,1,NULL)) AS Jun,
                        COUNT(IF(MONTH(t1.dchdate)=7,1,NULL)) AS Jul,
                        COUNT(IF(MONTH(t1.dchdate)=8,1,NULL)) AS Aug,
                        COUNT(IF(MONTH(t1.dchdate)=9,1,NULL)) AS Sep
                       FROM t1 
	        INNER JOIN iptoprt i ON t1.an=i.an
                    WHERE i.icd9='4513' and t1.spclty='02' and t1.admdate>1
		      ) pt;";                                                       
        $result3 = \Yii::$app->db1->createCommand($sql3)->queryAll();
        foreach ($result3 as $value3) {
        $rawData[]=[
               'id' => '',
               'pname' => $value3['pname'],
               'goal' => '',
               'oct' => $value3['Oct'],
               'nov' => $value3['Nov'],
               'dec' => $value3['Dece'],
               'jan' => $value3['Jan'],
               'feb' => $value3['Feb'],
               'mar' => $value3['Mar'],
               'apr' => $value3['Apr'],
               'may' => $value3['May'],
               'jun' => $value3['Jun'],
               'jul' => $value3['Jul'],
               'aug' => $value3['Aug'],
               'sep' => $value3['Sep'],
               'total' => $value3['total'], 
        ];               
        }      

        $sql4="SELECT  pname,total,Oct,Nov,Dece,Jan,Feb,Mar,Apr,May,Jun,Jul,Aug,Sep 
                    FROM (
			SELECT 'จำนวนผู้ป่วย UGI Bleeding เสียชีวิต' AS pname,
                        COUNT(t1.an) total,
                        COUNT(IF(MONTH(t1.dchdate)=10,1,NULL)) AS Oct,
                        COUNT(IF(MONTH(t1.dchdate)=11,1,NULL)) AS Nov,
                        COUNT(IF(MONTH(t1.dchdate)=12,1,NULL)) AS Dece,
                        COUNT(IF(MONTH(t1.dchdate)=1,1,NULL)) AS Jan,
                        COUNT(IF(MONTH(t1.dchdate)=2,1,NULL)) AS Feb,
                        COUNT(IF(MONTH(t1.dchdate)=3,1,NULL)) AS Mar,
                        COUNT(IF(MONTH(t1.dchdate)=4,1,NULL)) AS Apr,
                        COUNT(IF(MONTH(t1.dchdate)=5,1,NULL)) AS May,
                        COUNT(IF(MONTH(t1.dchdate)=6,1,NULL)) AS Jun,
                        COUNT(IF(MONTH(t1.dchdate)=7,1,NULL)) AS Jul,
                        COUNT(IF(MONTH(t1.dchdate)=8,1,NULL)) AS Aug,
                        COUNT(IF(MONTH(t1.dchdate)=9,1,NULL)) AS Sep
                    FROM t1 
                    WHERE t1.dchtype IN('08','09') and t1.spclty='02'
		      ) pt;";                                                       
        $result4 = \Yii::$app->db1->createCommand($sql4)->queryAll();
        foreach ($result4 as $value4) {
        $rawData[]=[
               'id' => '',
               'pname' => $value4['pname'],
               'goal' => '',
               'oct' => $value4['Oct'],
               'nov' => $value4['Nov'],
               'dec' => $value4['Dece'],
               'jan' => $value4['Jan'],
               'feb' => $value4['Feb'],
               'mar' => $value4['Mar'],
               'apr' => $value4['Apr'],
               'may' => $value4['May'],
               'jun' => $value4['Jun'],
               'jul' => $value4['Jul'],
               'aug' => $value4['Aug'],
               'sep' => $value4['Sep'],
               'total' => $value4['total'], 
        ];               
        }      
        $sql5="SELECT  pname,total,Oct,Nov,Dece,Jan,Feb,Mar,Apr,May,Jun,Jul,Aug,Sep 
                    FROM (
			SELECT 'จำนวนผู้ป่วย UGI Bleeding ที่รับไว้รักษาต่อ (Refer In)' AS pname,
                        COUNT(t1.an) total,
                        COUNT(IF(MONTH(t1.dchdate)=10,1,NULL)) AS Oct,
                        COUNT(IF(MONTH(t1.dchdate)=11,1,NULL)) AS Nov,
                        COUNT(IF(MONTH(t1.dchdate)=12,1,NULL)) AS Dece,
                        COUNT(IF(MONTH(t1.dchdate)=1,1,NULL)) AS Jan,
                        COUNT(IF(MONTH(t1.dchdate)=2,1,NULL)) AS Feb,
                        COUNT(IF(MONTH(t1.dchdate)=3,1,NULL)) AS Mar,
                        COUNT(IF(MONTH(t1.dchdate)=4,1,NULL)) AS Apr,
                        COUNT(IF(MONTH(t1.dchdate)=5,1,NULL)) AS May,
                        COUNT(IF(MONTH(t1.dchdate)=6,1,NULL)) AS Jun,
                        COUNT(IF(MONTH(t1.dchdate)=7,1,NULL)) AS Jul,
                        COUNT(IF(MONTH(t1.dchdate)=8,1,NULL)) AS Aug,
                        COUNT(IF(MONTH(t1.dchdate)=9,1,NULL)) AS Sep
                    FROM t1 
                    INNER JOIN referin r ON t1.vn=r.vn WHERE t1.spclty='02'
		    ) pt;";                                                       
        $result5 = \Yii::$app->db1->createCommand($sql5)->queryAll();
        foreach ($result5 as $value5) {
        $rawData[]=[
               'id' => '',
               'pname' => $value5['pname'],
               'goal' => '',
               'oct' => $value5['Oct'],
               'nov' => $value5['Nov'],
               'dec' => $value5['Dece'],
               'jan' => $value5['Jan'],
               'feb' => $value5['Feb'],
               'mar' => $value5['Mar'],
               'apr' => $value5['Apr'],
               'may' => $value5['May'],
               'jun' => $value5['Jun'],
               'jul' => $value5['Jul'],
               'aug' => $value5['Aug'],
               'sep' => $value5['Sep'],
               'total' => $value5['total'], 
        ];               
        }      
        $sql6="SELECT  pname,total,Oct,Nov,Dece,Jan,Feb,Mar,Apr,May,Jun,Jul,Aug,Sep 
                    FROM (
			SELECT 'จำนวนผู้ป่วย UGI Bleeding ที่ได้รับการส่งต่อ (Refer Out)' AS pname,
                        COUNT(t1.an) total,
                        COUNT(IF(MONTH(t1.dchdate)=10,1,NULL)) AS Oct,
                        COUNT(IF(MONTH(t1.dchdate)=11,1,NULL)) AS Nov,
                        COUNT(IF(MONTH(t1.dchdate)=12,1,NULL)) AS Dece,
                        COUNT(IF(MONTH(t1.dchdate)=1,1,NULL)) AS Jan,
                        COUNT(IF(MONTH(t1.dchdate)=2,1,NULL)) AS Feb,
                        COUNT(IF(MONTH(t1.dchdate)=3,1,NULL)) AS Mar,
                        COUNT(IF(MONTH(t1.dchdate)=4,1,NULL)) AS Apr,
                        COUNT(IF(MONTH(t1.dchdate)=5,1,NULL)) AS May,
                        COUNT(IF(MONTH(t1.dchdate)=6,1,NULL)) AS Jun,
                        COUNT(IF(MONTH(t1.dchdate)=7,1,NULL)) AS Jul,
                        COUNT(IF(MONTH(t1.dchdate)=8,1,NULL)) AS Aug,
                        COUNT(IF(MONTH(t1.dchdate)=9,1,NULL)) AS Sep
                    FROM t1 
                    WHERE t1.dchtype IN('04') AND t1.spclty='02'
		    ) pt;";                                                       
        $result6 = \Yii::$app->db1->createCommand($sql6)->queryAll();
        foreach ($result6 as $value6) {
        $rawData[]=[
               'id' => '',
               'pname' => $value6['pname'],
               'goal' => '',
               'oct' => $value6['Oct'],
               'nov' => $value6['Nov'],
               'dec' => $value6['Dece'],
               'jan' => $value6['Jan'],
               'feb' => $value6['Feb'],
               'mar' => $value6['Mar'],
               'apr' => $value6['Apr'],
               'may' => $value6['May'],
               'jun' => $value6['Jun'],
               'jul' => $value6['Jul'],
               'aug' => $value6['Aug'],
               'sep' => $value6['Sep'],
               'total' => $value6['total'], 
        ];               
        }      

        $dataProvider = new \yii\data\ArrayDataProvider([
            'allModels' => $rawData,
            'pagination' => [
                'pageSize' => 15,
                ],
        ]);  
        return $this -> render('/site/ipd-sur/pct/pct4_preview',
                    ['dataProvider' => $dataProvider,
                        'names' => $names,
                        'mText' => $this->mText, 
                        'date1' => $date1, 
                        'date2' => $date2,
                        'yrs' => $yrs]);          
    }
    
    public function actionPct5Index() {
        $model = new Formmodel();
        $names="ผลการดำเนินงานการให้บริการ PCT-ศัลยกรรม (จำนวนผู้ป่วยในทุกกลุ่มอายุที่เสียชีวิตจากการวินิจฉัยหลัก PDx 5 ภาวะ)"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;                   
              return $this->redirect(['pct5_preview','name'=>$names,'d1'=>$date1,'d2'=>$date2]);
        }
            return $this -> render('/site/ipd-sur/pct/pct5_index',['mText'=>$this->mText,'names'=>$names,'model' => $model]);
    }    
    public function actionPct5_preview($name,$d1,$d2) {
        $names=$name;
        $date1=$d1;$date2=$d2;    
        $sql="select  IF(MONTH(o.vstdate)>=10,YEAR(o.vstdate)+1 ,YEAR(o.vstdate))+543 AS yrs from ovstdiag o
                where o.vstdate between '{$date1}' and '{$date2}' group by yrs;";
        $result = \Yii::$app->db1->createCommand($sql)->queryAll();      
        foreach ($result as $value) {
               $yrs = $value['yrs'];                                              
        }
        \Yii::$app->db1->createCommand("DROP TABLE IF EXISTS t1;")->execute();
        $dt1="CREATE TEMPORARY TABLE t1 AS
                (
                SELECT i.vn,i.an,i.dchdate,i.dchtype,a.admdate,i.spclty
                FROM ipt i
                INNER JOIN an_stat a ON i.an=a.an
                INNER JOIN iptdiag d ON i.an=d.an
                WHERE i.dchdate BETWEEN '{$date1}' AND '{$date2}'
                AND d.icd10 IN('K800','K801','K804','K810','K811')               
                GROUP BY i.an
                );";
        $rt1 = \Yii::$app->db1->createCommand($dt1)->execute();      
        \Yii::$app->db1->createCommand("DROP TABLE IF EXISTS t2;")->execute();
        $dt2="CREATE TEMPORARY TABLE t2 AS
                (
                SELECT i.vn,i.an,i.dchdate,i.dchtype
                FROM ipt i
                INNER JOIN iptdiag d ON i.an=d.an
                WHERE i.dchdate BETWEEN '{$date1}' AND '{$date2}'
                AND d.icd10 IN('K800','K803','K830')               
                GROUP BY i.an
                );";
        $rt2 = \Yii::$app->db1->createCommand($dt2)->execute();      
        \Yii::$app->db1->createCommand("DROP TABLE IF EXISTS t3;")->execute();
        $dt3="CREATE TEMPORARY TABLE t3 AS
                (
                SELECT i.vn,i.an,i.dchdate,i.dchtype
                FROM ipt i
                INNER JOIN iptdiag d ON i.an=d.an
                WHERE i.dchdate BETWEEN '{$date1}' AND '{$date2}'
                AND d.icd10 IN('K851','K852','K853','K859')               
                GROUP BY i.an
                );";
        $rt3 = \Yii::$app->db1->createCommand($dt3)->execute();      
        \Yii::$app->db1->createCommand("DROP TABLE IF EXISTS t4;")->execute();
        $dt4="CREATE TEMPORARY TABLE t4 AS
                (
                SELECT i.vn,i.an,i.dchdate,i.dchtype
                FROM ipt i
                INNER JOIN iptdiag d ON i.an=d.an
                WHERE i.dchdate BETWEEN '{$date1}' AND '{$date2}'
                AND d.icd10 IN('K561','K562','K563','K564','K565','K566')               
                GROUP BY i.an
                );";
        $rt4 = \Yii::$app->db1->createCommand($dt4)->execute();      
        \Yii::$app->db1->createCommand("DROP TABLE IF EXISTS t5;")->execute();
        $dt5="CREATE TEMPORARY TABLE t5 AS
                (
                SELECT i.vn,i.an,i.dchdate,i.dchtype
                FROM ipt i
                INNER JOIN iptdiag d ON i.an=d.an
                WHERE i.dchdate BETWEEN '{$date1}' AND '{$date2}'
                AND d.icd10 IN('K251','K255','K261','K265','K271','K275')               
                GROUP BY i.an
                );";
        $rt5 = \Yii::$app->db1->createCommand($dt5)->execute();      
        
        $rawData=[];
        $sql1="SELECT  pname,total,Oct,Nov,Dece,Jan,Feb,Mar,Apr,May,Jun,Jul,Aug,Sep 
                    FROM (
			SELECT '1.Ac.Cholecytitis (ICD 10 K80.0,K81.0,K80.4,K811,K801) เสียชีวิต (ผลงาน) ' AS pname,
                        COUNT(t1.an) total,
                        COUNT(IF(MONTH(t1.dchdate)=10,1,NULL)) AS Oct,
                        COUNT(IF(MONTH(t1.dchdate)=11,1,NULL)) AS Nov,
                        COUNT(IF(MONTH(t1.dchdate)=12,1,NULL)) AS Dece,
                        COUNT(IF(MONTH(t1.dchdate)=1,1,NULL)) AS Jan,
                        COUNT(IF(MONTH(t1.dchdate)=2,1,NULL)) AS Feb,
                        COUNT(IF(MONTH(t1.dchdate)=3,1,NULL)) AS Mar,
                        COUNT(IF(MONTH(t1.dchdate)=4,1,NULL)) AS Apr,
                        COUNT(IF(MONTH(t1.dchdate)=5,1,NULL)) AS May,
                        COUNT(IF(MONTH(t1.dchdate)=6,1,NULL)) AS Jun,
                        COUNT(IF(MONTH(t1.dchdate)=7,1,NULL)) AS Jul,
                        COUNT(IF(MONTH(t1.dchdate)=8,1,NULL)) AS Aug,
                        COUNT(IF(MONTH(t1.dchdate)=9,1,NULL)) AS Sep
                    FROM t1 
                    WHERE t1.dchtype IN('08','09')
		      ) pt;";                                                       
        $result1 = \Yii::$app->db1->createCommand($sql1)->queryAll();
        foreach ($result1 as $value1) {
        $rawData[]=[
               'id' => '',
               'pname' => $value1['pname'],
               'goal' => '',
               'oct' => $value1['Oct'],
               'nov' => $value1['Nov'],
               'dec' => $value1['Dece'],
               'jan' => $value1['Jan'],
               'feb' => $value1['Feb'],
               'mar' => $value1['Mar'],
               'apr' => $value1['Apr'],
               'may' => $value1['May'],
               'jun' => $value1['Jun'],
               'jul' => $value1['Jul'],
               'aug' => $value1['Aug'],
               'sep' => $value1['Sep'],
               'total' => $value1['total'], 
        ];               
        }      
        $sql2="SELECT  pname,total,Oct,Nov,Dece,Jan,Feb,Mar,Apr,May,Jun,Jul,Aug,Sep 
                    FROM (
			SELECT '1.Ac.Cholecytitis (ICD 10 K80.0,K81.0,K80.4,K811,K801) ทั้งหมด (เป้าหมาย) ' AS pname,
                        COUNT(t1.an) total,
                        COUNT(IF(MONTH(t1.dchdate)=10,1,NULL)) AS Oct,
                        COUNT(IF(MONTH(t1.dchdate)=11,1,NULL)) AS Nov,
                        COUNT(IF(MONTH(t1.dchdate)=12,1,NULL)) AS Dece,
                        COUNT(IF(MONTH(t1.dchdate)=1,1,NULL)) AS Jan,
                        COUNT(IF(MONTH(t1.dchdate)=2,1,NULL)) AS Feb,
                        COUNT(IF(MONTH(t1.dchdate)=3,1,NULL)) AS Mar,
                        COUNT(IF(MONTH(t1.dchdate)=4,1,NULL)) AS Apr,
                        COUNT(IF(MONTH(t1.dchdate)=5,1,NULL)) AS May,
                        COUNT(IF(MONTH(t1.dchdate)=6,1,NULL)) AS Jun,
                        COUNT(IF(MONTH(t1.dchdate)=7,1,NULL)) AS Jul,
                        COUNT(IF(MONTH(t1.dchdate)=8,1,NULL)) AS Aug,
                        COUNT(IF(MONTH(t1.dchdate)=9,1,NULL)) AS Sep
                      FROM t1 
		      ) pt;";                                                       
        $result2 = \Yii::$app->db1->createCommand($sql2)->queryAll();
        foreach ($result2 as $value2) {
        $rawData[]=[
               'id' => '',
               'pname' => $value2['pname'],
               'goal' => '',
               'oct' => $value2['Oct'],
               'nov' => $value2['Nov'],
               'dec' => $value2['Dece'],
               'jan' => $value2['Jan'],
               'feb' => $value2['Feb'],
               'mar' => $value2['Mar'],
               'apr' => $value2['Apr'],
               'may' => $value2['May'],
               'jun' => $value2['Jun'],
               'jul' => $value2['Jul'],
               'aug' => $value2['Aug'],
               'sep' => $value2['Sep'],
               'total' => $value2['total'], 
        ];               
        }      
        $sql3="SELECT  pname,total,Oct,Nov,Dece,Jan,Feb,Mar,Apr,May,Jun,Jul,Aug,Sep 
                    FROM (
			SELECT '2.Ac.Cholangitis (ICD10=K83.0,K80.3) เสียชีวิต (ผลงาน)' AS pname,
                        COUNT(t2.an) total,
                        COUNT(IF(MONTH(t2.dchdate)=10,1,NULL)) AS Oct,
                        COUNT(IF(MONTH(t2.dchdate)=11,1,NULL)) AS Nov,
                        COUNT(IF(MONTH(t2.dchdate)=12,1,NULL)) AS Dece,
                        COUNT(IF(MONTH(t2.dchdate)=1,1,NULL)) AS Jan,
                        COUNT(IF(MONTH(t2.dchdate)=2,1,NULL)) AS Feb,
                        COUNT(IF(MONTH(t2.dchdate)=3,1,NULL)) AS Mar,
                        COUNT(IF(MONTH(t2.dchdate)=4,1,NULL)) AS Apr,
                        COUNT(IF(MONTH(t2.dchdate)=5,1,NULL)) AS May,
                        COUNT(IF(MONTH(t2.dchdate)=6,1,NULL)) AS Jun,
                        COUNT(IF(MONTH(t2.dchdate)=7,1,NULL)) AS Jul,
                        COUNT(IF(MONTH(t2.dchdate)=8,1,NULL)) AS Aug,
                        COUNT(IF(MONTH(t2.dchdate)=9,1,NULL)) AS Sep
                       FROM t2 
                    WHERE t2.dchtype IN('08','09')
		    ) pt;";                                                       
        $result3 = \Yii::$app->db1->createCommand($sql3)->queryAll();
        foreach ($result3 as $value3) {
        $rawData[]=[
               'id' => '',
               'pname' => $value3['pname'],
               'goal' => '',
               'oct' => $value3['Oct'],
               'nov' => $value3['Nov'],
               'dec' => $value3['Dece'],
               'jan' => $value3['Jan'],
               'feb' => $value3['Feb'],
               'mar' => $value3['Mar'],
               'apr' => $value3['Apr'],
               'may' => $value3['May'],
               'jun' => $value3['Jun'],
               'jul' => $value3['Jul'],
               'aug' => $value3['Aug'],
               'sep' => $value3['Sep'],
               'total' => $value3['total'], 
        ];               
        }      

        $sql4="SELECT  pname,total,Oct,Nov,Dece,Jan,Feb,Mar,Apr,May,Jun,Jul,Aug,Sep 
                    FROM (
			SELECT '2.Ac.Cholangitis (ICD10=K83.0,K80.3) ทั้งหมด (ผลงาน)' AS pname,
                        COUNT(t2.an) total,
                        COUNT(IF(MONTH(t2.dchdate)=10,1,NULL)) AS Oct,
                        COUNT(IF(MONTH(t2.dchdate)=11,1,NULL)) AS Nov,
                        COUNT(IF(MONTH(t2.dchdate)=12,1,NULL)) AS Dece,
                        COUNT(IF(MONTH(t2.dchdate)=1,1,NULL)) AS Jan,
                        COUNT(IF(MONTH(t2.dchdate)=2,1,NULL)) AS Feb,
                        COUNT(IF(MONTH(t2.dchdate)=3,1,NULL)) AS Mar,
                        COUNT(IF(MONTH(t2.dchdate)=4,1,NULL)) AS Apr,
                        COUNT(IF(MONTH(t2.dchdate)=5,1,NULL)) AS May,
                        COUNT(IF(MONTH(t2.dchdate)=6,1,NULL)) AS Jun,
                        COUNT(IF(MONTH(t2.dchdate)=7,1,NULL)) AS Jul,
                        COUNT(IF(MONTH(t2.dchdate)=8,1,NULL)) AS Aug,
                        COUNT(IF(MONTH(t2.dchdate)=9,1,NULL)) AS Sep
                       FROM t2 
		      ) pt;";                                                       
        $result4 = \Yii::$app->db1->createCommand($sql4)->queryAll();
        foreach ($result4 as $value4) {
        $rawData[]=[
               'id' => '',
               'pname' => $value4['pname'],
               'goal' => '',
               'oct' => $value4['Oct'],
               'nov' => $value4['Nov'],
               'dec' => $value4['Dece'],
               'jan' => $value4['Jan'],
               'feb' => $value4['Feb'],
               'mar' => $value4['Mar'],
               'apr' => $value4['Apr'],
               'may' => $value4['May'],
               'jun' => $value4['Jun'],
               'jul' => $value4['Jul'],
               'aug' => $value4['Aug'],
               'sep' => $value4['Sep'],
               'total' => $value4['total'], 
        ];               
        }      
        $sql5="SELECT  pname,total,Oct,Nov,Dece,Jan,Feb,Mar,Apr,May,Jun,Jul,Aug,Sep 
                    FROM (
			SELECT '3.Ac.Pancreatitis (ICD10=K851,K852,K853,K859) เสียชีวิต (ผลงาน)' AS pname,
                        COUNT(t3.an) total,
                        COUNT(IF(MONTH(t3.dchdate)=10,1,NULL)) AS Oct,
                        COUNT(IF(MONTH(t3.dchdate)=11,1,NULL)) AS Nov,
                        COUNT(IF(MONTH(t3.dchdate)=12,1,NULL)) AS Dece,
                        COUNT(IF(MONTH(t3.dchdate)=1,1,NULL)) AS Jan,
                        COUNT(IF(MONTH(t3.dchdate)=2,1,NULL)) AS Feb,
                        COUNT(IF(MONTH(t3.dchdate)=3,1,NULL)) AS Mar,
                        COUNT(IF(MONTH(t3.dchdate)=4,1,NULL)) AS Apr,
                        COUNT(IF(MONTH(t3.dchdate)=5,1,NULL)) AS May,
                        COUNT(IF(MONTH(t3.dchdate)=6,1,NULL)) AS Jun,
                        COUNT(IF(MONTH(t3.dchdate)=7,1,NULL)) AS Jul,
                        COUNT(IF(MONTH(t3.dchdate)=8,1,NULL)) AS Aug,
                        COUNT(IF(MONTH(t3.dchdate)=9,1,NULL)) AS Sep
                    FROM t3
                    WHERE t3.dchtype IN('08','09')
		    ) pt;";                                                       
        $result5 = \Yii::$app->db1->createCommand($sql5)->queryAll();
        foreach ($result5 as $value5) {
        $rawData[]=[
               'id' => '',
               'pname' => $value5['pname'],
               'goal' => '',
               'oct' => $value5['Oct'],
               'nov' => $value5['Nov'],
               'dec' => $value5['Dece'],
               'jan' => $value5['Jan'],
               'feb' => $value5['Feb'],
               'mar' => $value5['Mar'],
               'apr' => $value5['Apr'],
               'may' => $value5['May'],
               'jun' => $value5['Jun'],
               'jul' => $value5['Jul'],
               'aug' => $value5['Aug'],
               'sep' => $value5['Sep'],
               'total' => $value5['total'], 
        ];               
        }      
        $sql6="SELECT  pname,total,Oct,Nov,Dece,Jan,Feb,Mar,Apr,May,Jun,Jul,Aug,Sep 
                    FROM (
			SELECT '3.Ac.Pancreatitis (ICD10=K851,K852,K853,K859) ทั้งหมด (ผลงาน)' AS pname,
                        COUNT(t3.an) total,
                        COUNT(IF(MONTH(t3.dchdate)=10,1,NULL)) AS Oct,
                        COUNT(IF(MONTH(t3.dchdate)=11,1,NULL)) AS Nov,
                        COUNT(IF(MONTH(t3.dchdate)=12,1,NULL)) AS Dece,
                        COUNT(IF(MONTH(t3.dchdate)=1,1,NULL)) AS Jan,
                        COUNT(IF(MONTH(t3.dchdate)=2,1,NULL)) AS Feb,
                        COUNT(IF(MONTH(t3.dchdate)=3,1,NULL)) AS Mar,
                        COUNT(IF(MONTH(t3.dchdate)=4,1,NULL)) AS Apr,
                        COUNT(IF(MONTH(t3.dchdate)=5,1,NULL)) AS May,
                        COUNT(IF(MONTH(t3.dchdate)=6,1,NULL)) AS Jun,
                        COUNT(IF(MONTH(t3.dchdate)=7,1,NULL)) AS Jul,
                        COUNT(IF(MONTH(t3.dchdate)=8,1,NULL)) AS Aug,
                        COUNT(IF(MONTH(t3.dchdate)=9,1,NULL)) AS Sep
                    FROM t3
		    ) pt;";                                                       
        $result6 = \Yii::$app->db1->createCommand($sql6)->queryAll();
        foreach ($result6 as $value6) {
        $rawData[]=[
               'id' => '',
               'pname' => $value6['pname'],
               'goal' => '',
               'oct' => $value6['Oct'],
               'nov' => $value6['Nov'],
               'dec' => $value6['Dece'],
               'jan' => $value6['Jan'],
               'feb' => $value6['Feb'],
               'mar' => $value6['Mar'],
               'apr' => $value6['Apr'],
               'may' => $value6['May'],
               'jun' => $value6['Jun'],
               'jul' => $value6['Jul'],
               'aug' => $value6['Aug'],
               'sep' => $value6['Sep'],
               'total' => $value6['total'], 
        ];               
        }      

        $sql7="SELECT  pname,total,Oct,Nov,Dece,Jan,Feb,Mar,Apr,May,Jun,Jul,Aug,Sep 
                    FROM (
			SELECT '4.Ac.Gut  Obstruction (ICD10=K561,K562,K563,K564,K565,K566) เสียชีวิต (ผลงาน)' AS pname,
                        COUNT(t4.an) total,
                        COUNT(IF(MONTH(t4.dchdate)=10,1,NULL)) AS Oct,
                        COUNT(IF(MONTH(t4.dchdate)=11,1,NULL)) AS Nov,
                        COUNT(IF(MONTH(t4.dchdate)=12,1,NULL)) AS Dece,
                        COUNT(IF(MONTH(t4.dchdate)=1,1,NULL)) AS Jan,
                        COUNT(IF(MONTH(t4.dchdate)=2,1,NULL)) AS Feb,
                        COUNT(IF(MONTH(t4.dchdate)=3,1,NULL)) AS Mar,
                        COUNT(IF(MONTH(t4.dchdate)=4,1,NULL)) AS Apr,
                        COUNT(IF(MONTH(t4.dchdate)=5,1,NULL)) AS May,
                        COUNT(IF(MONTH(t4.dchdate)=6,1,NULL)) AS Jun,
                        COUNT(IF(MONTH(t4.dchdate)=7,1,NULL)) AS Jul,
                        COUNT(IF(MONTH(t4.dchdate)=8,1,NULL)) AS Aug,
                        COUNT(IF(MONTH(t4.dchdate)=9,1,NULL)) AS Sep
                    FROM t4
                    WHERE t4.dchtype IN('08','09')
		    ) pt;";                                                       
        $result7 = \Yii::$app->db1->createCommand($sql7)->queryAll();
        foreach ($result7 as $value7) {
        $rawData[]=[
               'id' => '',
               'pname' => $value7['pname'],
               'goal' => '',
               'oct' => $value7['Oct'],
               'nov' => $value7['Nov'],
               'dec' => $value7['Dece'],
               'jan' => $value7['Jan'],
               'feb' => $value7['Feb'],
               'mar' => $value7['Mar'],
               'apr' => $value7['Apr'],
               'may' => $value7['May'],
               'jun' => $value7['Jun'],
               'jul' => $value7['Jul'],
               'aug' => $value7['Aug'],
               'sep' => $value7['Sep'],
               'total' => $value7['total'], 
        ];               
        }      
        $sql8="SELECT  pname,total,Oct,Nov,Dece,Jan,Feb,Mar,Apr,May,Jun,Jul,Aug,Sep 
                    FROM (
			SELECT '4.Ac.Gut  Obstruction (ICD10=K561,K562,K563,K564,K565,K566) ทั้งหมด (ผลงาน)' AS pname,
                        COUNT(t4.an) total,
                        COUNT(IF(MONTH(t4.dchdate)=10,1,NULL)) AS Oct,
                        COUNT(IF(MONTH(t4.dchdate)=11,1,NULL)) AS Nov,
                        COUNT(IF(MONTH(t4.dchdate)=12,1,NULL)) AS Dece,
                        COUNT(IF(MONTH(t4.dchdate)=1,1,NULL)) AS Jan,
                        COUNT(IF(MONTH(t4.dchdate)=2,1,NULL)) AS Feb,
                        COUNT(IF(MONTH(t4.dchdate)=3,1,NULL)) AS Mar,
                        COUNT(IF(MONTH(t4.dchdate)=4,1,NULL)) AS Apr,
                        COUNT(IF(MONTH(t4.dchdate)=5,1,NULL)) AS May,
                        COUNT(IF(MONTH(t4.dchdate)=6,1,NULL)) AS Jun,
                        COUNT(IF(MONTH(t4.dchdate)=7,1,NULL)) AS Jul,
                        COUNT(IF(MONTH(t4.dchdate)=8,1,NULL)) AS Aug,
                        COUNT(IF(MONTH(t4.dchdate)=9,1,NULL)) AS Sep
                    FROM t4
		    ) pt;";                                                       
        $result8 = \Yii::$app->db1->createCommand($sql8)->queryAll();
        foreach ($result8 as $value8) {
        $rawData[]=[
               'id' => '',
               'pname' => $value8['pname'],
               'goal' => '',
               'oct' => $value8['Oct'],
               'nov' => $value8['Nov'],
               'dec' => $value8['Dece'],
               'jan' => $value8['Jan'],
               'feb' => $value8['Feb'],
               'mar' => $value8['Mar'],
               'apr' => $value8['Apr'],
               'may' => $value8['May'],
               'jun' => $value8['Jun'],
               'jul' => $value8['Jul'],
               'aug' => $value8['Aug'],
               'sep' => $value8['Sep'],
               'total' => $value8['total'], 
        ];               
        }      
        
        $sql9="SELECT  pname,total,Oct,Nov,Dece,Jan,Feb,Mar,Apr,May,Jun,Jul,Aug,Sep 
                    FROM (
			SELECT '5.Peptic ulcer Perforate (ICD10=K251,K255,K261,K265,K271,K275) เสียชีวิต (ผลงาน)' AS pname,
                        COUNT(t5.an) total,
                        COUNT(IF(MONTH(t5.dchdate)=10,1,NULL)) AS Oct,
                        COUNT(IF(MONTH(t5.dchdate)=11,1,NULL)) AS Nov,
                        COUNT(IF(MONTH(t5.dchdate)=12,1,NULL)) AS Dece,
                        COUNT(IF(MONTH(t5.dchdate)=1,1,NULL)) AS Jan,
                        COUNT(IF(MONTH(t5.dchdate)=2,1,NULL)) AS Feb,
                        COUNT(IF(MONTH(t5.dchdate)=3,1,NULL)) AS Mar,
                        COUNT(IF(MONTH(t5.dchdate)=4,1,NULL)) AS Apr,
                        COUNT(IF(MONTH(t5.dchdate)=5,1,NULL)) AS May,
                        COUNT(IF(MONTH(t5.dchdate)=6,1,NULL)) AS Jun,
                        COUNT(IF(MONTH(t5.dchdate)=7,1,NULL)) AS Jul,
                        COUNT(IF(MONTH(t5.dchdate)=8,1,NULL)) AS Aug,
                        COUNT(IF(MONTH(t5.dchdate)=9,1,NULL)) AS Sep
                    FROM t5
                    WHERE t5.dchtype IN('08','09')
		    ) pt;";                                                       
        $result9 = \Yii::$app->db1->createCommand($sql9)->queryAll();
        foreach ($result9 as $value9) {
        $rawData[]=[
               'id' => '',
               'pname' => $value9['pname'],
               'goal' => '',
               'oct' => $value9['Oct'],
               'nov' => $value9['Nov'],
               'dec' => $value9['Dece'],
               'jan' => $value9['Jan'],
               'feb' => $value9['Feb'],
               'mar' => $value9['Mar'],
               'apr' => $value9['Apr'],
               'may' => $value9['May'],
               'jun' => $value9['Jun'],
               'jul' => $value9['Jul'],
               'aug' => $value9['Aug'],
               'sep' => $value9['Sep'],
               'total' => $value9['total'], 
        ];               
        }      
        $sql10="SELECT  pname,total,Oct,Nov,Dece,Jan,Feb,Mar,Apr,May,Jun,Jul,Aug,Sep 
                    FROM (
			SELECT '5.Peptic ulcer Perforate (ICD10=K251,K255,K261,K265,K271,K275) ทั้งหมด (ผลงาน)' AS pname,
                        COUNT(t5.an) total,
                        COUNT(IF(MONTH(t5.dchdate)=10,1,NULL)) AS Oct,
                        COUNT(IF(MONTH(t5.dchdate)=11,1,NULL)) AS Nov,
                        COUNT(IF(MONTH(t5.dchdate)=12,1,NULL)) AS Dece,
                        COUNT(IF(MONTH(t5.dchdate)=1,1,NULL)) AS Jan,
                        COUNT(IF(MONTH(t5.dchdate)=2,1,NULL)) AS Feb,
                        COUNT(IF(MONTH(t5.dchdate)=3,1,NULL)) AS Mar,
                        COUNT(IF(MONTH(t5.dchdate)=4,1,NULL)) AS Apr,
                        COUNT(IF(MONTH(t5.dchdate)=5,1,NULL)) AS May,
                        COUNT(IF(MONTH(t5.dchdate)=6,1,NULL)) AS Jun,
                        COUNT(IF(MONTH(t5.dchdate)=7,1,NULL)) AS Jul,
                        COUNT(IF(MONTH(t5.dchdate)=8,1,NULL)) AS Aug,
                        COUNT(IF(MONTH(t5.dchdate)=9,1,NULL)) AS Sep
                    FROM t5
		    ) pt;";                                                       
        $result10 = \Yii::$app->db1->createCommand($sql10)->queryAll();
        foreach ($result10 as $value10) {
        $rawData[]=[
               'id' => '',
               'pname' => $value10['pname'],
               'goal' => '',
               'oct' => $value10['Oct'],
               'nov' => $value10['Nov'],
               'dec' => $value10['Dece'],
               'jan' => $value10['Jan'],
               'feb' => $value10['Feb'],
               'mar' => $value10['Mar'],
               'apr' => $value10['Apr'],
               'may' => $value10['May'],
               'jun' => $value10['Jun'],
               'jul' => $value10['Jul'],
               'aug' => $value10['Aug'],
               'sep' => $value10['Sep'],
               'total' => $value10['total'], 
        ];               
        }      

        $dataProvider = new \yii\data\ArrayDataProvider([
            'allModels' => $rawData,
            'pagination' => [
                'pageSize' => 15,
                ],
        ]);  
        return $this -> render('/site/ipd-sur/pct/pct5_preview',
                    ['dataProvider' => $dataProvider,
                        'names' => $names,
                        'mText' => $this->mText, 
                        'date1' => $date1, 
                        'date2' => $date2,
                        'yrs' => $yrs]);          
    }
    
    public function actionPct6Index() {
        $model = new Formmodel();
        $names="ผลการดำเนินงานการให้บริการ PCT-ศัลยกรรม (จำนวนผู้ป่วยที่ภาวะขาดเลือดที่แขน หรือ ขา)"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;                   
              return $this->redirect(['pct6_preview','name'=>$names,'d1'=>$date1,'d2'=>$date2]);
        }
            return $this -> render('/site/ipd-sur/pct/pct6_index',['mText'=>$this->mText,'names'=>$names,'model' => $model]);
    }    
    public function actionPct6_preview($name,$d1,$d2) {
        $names=$name;
        $date1=$d1;$date2=$d2;    
        $sql="select  IF(MONTH(o.vstdate)>=10,YEAR(o.vstdate)+1 ,YEAR(o.vstdate))+543 AS yrs from ovstdiag o
                where o.vstdate between '{$date1}' and '{$date2}' group by yrs;";
        $result = \Yii::$app->db1->createCommand($sql)->queryAll();      
        foreach ($result as $value) {
               $yrs = $value['yrs'];                                              
        }
        
        
        \Yii::$app->db1->createCommand("DROP TABLE IF EXISTS t1;")->execute();
        $dt1="CREATE TEMPORARY TABLE t1 AS
                (
                SELECT i.vn,i.an,i.dchdate,i.dchtype
                FROM ipt i
                INNER JOIN iptdiag d ON i.an=d.an
                WHERE i.dchdate BETWEEN '{$date1}' AND '{$date2}'
                AND (d.icd10 BETWEEN 'I740' AND 'I749') OR (d.icd10='I702') 
                GROUP BY i.an
                );";
        $rt1 = \Yii::$app->db1->createCommand($dt1)->execute();      
        $rawData=[];
        $sql1="SELECT  pname,total,Oct,Nov,Dece,Jan,Feb,Mar,Apr,May,Jun,Jul,Aug,Sep 
                    FROM (
			SELECT 'จำนวนผู้ป่วยที่มีภาวะขาดเลือดที่แขน หรือขา และเสียชีวิต (ICD10=I740-I749 และ I702) เสียชีวิต (ผลงาน)' AS pname,
                        COUNT(t1.an) total,
                        COUNT(IF(MONTH(t1.dchdate)=10,1,NULL)) AS Oct,
                        COUNT(IF(MONTH(t1.dchdate)=11,1,NULL)) AS Nov,
                        COUNT(IF(MONTH(t1.dchdate)=12,1,NULL)) AS Dece,
                        COUNT(IF(MONTH(t1.dchdate)=1,1,NULL)) AS Jan,
                        COUNT(IF(MONTH(t1.dchdate)=2,1,NULL)) AS Feb,
                        COUNT(IF(MONTH(t1.dchdate)=3,1,NULL)) AS Mar,
                        COUNT(IF(MONTH(t1.dchdate)=4,1,NULL)) AS Apr,
                        COUNT(IF(MONTH(t1.dchdate)=5,1,NULL)) AS May,
                        COUNT(IF(MONTH(t1.dchdate)=6,1,NULL)) AS Jun,
                        COUNT(IF(MONTH(t1.dchdate)=7,1,NULL)) AS Jul,
                        COUNT(IF(MONTH(t1.dchdate)=8,1,NULL)) AS Aug,
                        COUNT(IF(MONTH(t1.dchdate)=9,1,NULL)) AS Sep
                    FROM t1 
                    WHERE t1.dchtype IN('08','09')
		      ) pt;";                                                       
        $result1 = \Yii::$app->db1->createCommand($sql1)->queryAll();
        foreach ($result1 as $value1) {
        $rawData[]=[
               'id' => '',
               'pname' => $value1['pname'],
               'goal' => '',
               'oct' => $value1['Oct'],
               'nov' => $value1['Nov'],
               'dec' => $value1['Dece'],
               'jan' => $value1['Jan'],
               'feb' => $value1['Feb'],
               'mar' => $value1['Mar'],
               'apr' => $value1['Apr'],
               'may' => $value1['May'],
               'jun' => $value1['Jun'],
               'jul' => $value1['Jul'],
               'aug' => $value1['Aug'],
               'sep' => $value1['Sep'],
               'total' => $value1['total'], 
        ];               
        }      
        $sql2="SELECT  pname,total,Oct,Nov,Dece,Jan,Feb,Mar,Apr,May,Jun,Jul,Aug,Sep 
                    FROM (
			SELECT 'จำนวนผู้ป่วยที่มีภาวะขาดเลือดที่แขน หรือขา และเสียชีวิต (ICD10=I740-I749 และ I702) ทั้งหมด (เป้าหมาย)' AS pname,
                        COUNT(t1.an) total,
                        COUNT(IF(MONTH(t1.dchdate)=10,1,NULL)) AS Oct,
                        COUNT(IF(MONTH(t1.dchdate)=11,1,NULL)) AS Nov,
                        COUNT(IF(MONTH(t1.dchdate)=12,1,NULL)) AS Dece,
                        COUNT(IF(MONTH(t1.dchdate)=1,1,NULL)) AS Jan,
                        COUNT(IF(MONTH(t1.dchdate)=2,1,NULL)) AS Feb,
                        COUNT(IF(MONTH(t1.dchdate)=3,1,NULL)) AS Mar,
                        COUNT(IF(MONTH(t1.dchdate)=4,1,NULL)) AS Apr,
                        COUNT(IF(MONTH(t1.dchdate)=5,1,NULL)) AS May,
                        COUNT(IF(MONTH(t1.dchdate)=6,1,NULL)) AS Jun,
                        COUNT(IF(MONTH(t1.dchdate)=7,1,NULL)) AS Jul,
                        COUNT(IF(MONTH(t1.dchdate)=8,1,NULL)) AS Aug,
                        COUNT(IF(MONTH(t1.dchdate)=9,1,NULL)) AS Sep
                    FROM t1 
		      ) pt;";                                                       
        $result2 = \Yii::$app->db1->createCommand($sql2)->queryAll();
        foreach ($result2 as $value2) {
        $rawData[]=[
               'id' => '',
               'pname' => $value2['pname'],
               'goal' => '',
               'oct' => $value2['Oct'],
               'nov' => $value2['Nov'],
               'dec' => $value2['Dece'],
               'jan' => $value2['Jan'],
               'feb' => $value2['Feb'],
               'mar' => $value2['Mar'],
               'apr' => $value2['Apr'],
               'may' => $value2['May'],
               'jun' => $value2['Jun'],
               'jul' => $value2['Jul'],
               'aug' => $value2['Aug'],
               'sep' => $value2['Sep'],
               'total' => $value2['total'], 
        ];               
        }      
        $sql4="SELECT  pname,total,Oct,Nov,Dece,Jan,Feb,Mar,Apr,May,Jun,Jul,Aug,Sep 
                    FROM (
			SELECT 'จำนวนผู้ป่วยขาดเลือดที่ แขน ขา ที่รับไว้รักษาต่อ (Refer In)' AS pname,
                        COUNT(t1.an) total,
                        COUNT(IF(MONTH(t1.dchdate)=10,1,NULL)) AS Oct,
                        COUNT(IF(MONTH(t1.dchdate)=11,1,NULL)) AS Nov,
                        COUNT(IF(MONTH(t1.dchdate)=12,1,NULL)) AS Dece,
                        COUNT(IF(MONTH(t1.dchdate)=1,1,NULL)) AS Jan,
                        COUNT(IF(MONTH(t1.dchdate)=2,1,NULL)) AS Feb,
                        COUNT(IF(MONTH(t1.dchdate)=3,1,NULL)) AS Mar,
                        COUNT(IF(MONTH(t1.dchdate)=4,1,NULL)) AS Apr,
                        COUNT(IF(MONTH(t1.dchdate)=5,1,NULL)) AS May,
                        COUNT(IF(MONTH(t1.dchdate)=6,1,NULL)) AS Jun,
                        COUNT(IF(MONTH(t1.dchdate)=7,1,NULL)) AS Jul,
                        COUNT(IF(MONTH(t1.dchdate)=8,1,NULL)) AS Aug,
                        COUNT(IF(MONTH(t1.dchdate)=9,1,NULL)) AS Sep
                    FROM t1 
                    INNER JOIN referin r ON t1.vn=r.vn
		    ) pt;";                                                       
        $result4 = \Yii::$app->db1->createCommand($sql4)->queryAll();
        foreach ($result4 as $value4) {
        $rawData[]=[
               'id' => '',
               'pname' => $value4['pname'],
               'goal' => '',
               'oct' => $value4['Oct'],
               'nov' => $value4['Nov'],
               'dec' => $value4['Dece'],
               'jan' => $value4['Jan'],
               'feb' => $value4['Feb'],
               'mar' => $value4['Mar'],
               'apr' => $value4['Apr'],
               'may' => $value4['May'],
               'jun' => $value4['Jun'],
               'jul' => $value4['Jul'],
               'aug' => $value4['Aug'],
               'sep' => $value4['Sep'],
               'total' => $value4['total'], 
        ];               
        }      
        $sql5="SELECT  pname,total,Oct,Nov,Dece,Jan,Feb,Mar,Apr,May,Jun,Jul,Aug,Sep 
                    FROM (
			SELECT 'จำนวนผู้ป่วย ขาดเลือดที่แขน ขา ที่ได้รับการส่งต่อ (Refer Out)' AS pname,
                        COUNT(t1.an) total,
                        COUNT(IF(MONTH(t1.dchdate)=10,1,NULL)) AS Oct,
                        COUNT(IF(MONTH(t1.dchdate)=11,1,NULL)) AS Nov,
                        COUNT(IF(MONTH(t1.dchdate)=12,1,NULL)) AS Dece,
                        COUNT(IF(MONTH(t1.dchdate)=1,1,NULL)) AS Jan,
                        COUNT(IF(MONTH(t1.dchdate)=2,1,NULL)) AS Feb,
                        COUNT(IF(MONTH(t1.dchdate)=3,1,NULL)) AS Mar,
                        COUNT(IF(MONTH(t1.dchdate)=4,1,NULL)) AS Apr,
                        COUNT(IF(MONTH(t1.dchdate)=5,1,NULL)) AS May,
                        COUNT(IF(MONTH(t1.dchdate)=6,1,NULL)) AS Jun,
                        COUNT(IF(MONTH(t1.dchdate)=7,1,NULL)) AS Jul,
                        COUNT(IF(MONTH(t1.dchdate)=8,1,NULL)) AS Aug,
                        COUNT(IF(MONTH(t1.dchdate)=9,1,NULL)) AS Sep
                    FROM t1 
                    WHERE t1.dchtype IN('04')
		    ) pt;";                                                       
        $result5 = \Yii::$app->db1->createCommand($sql5)->queryAll();
        foreach ($result5 as $value5) {
        $rawData[]=[
               'id' => '',
               'pname' => $value5['pname'],
               'goal' => '',
               'oct' => $value5['Oct'],
               'nov' => $value5['Nov'],
               'dec' => $value5['Dece'],
               'jan' => $value5['Jan'],
               'feb' => $value5['Feb'],
               'mar' => $value5['Mar'],
               'apr' => $value5['Apr'],
               'may' => $value5['May'],
               'jun' => $value5['Jun'],
               'jul' => $value5['Jul'],
               'aug' => $value5['Aug'],
               'sep' => $value5['Sep'],
               'total' => $value5['total'], 
        ];               
        }      

        $dataProvider = new \yii\data\ArrayDataProvider([
            'allModels' => $rawData,
            'pagination' => [
                'pageSize' => 15,
                ],
        ]);  
        return $this -> render('/site/ipd-sur/pct/pct6_preview',
                    ['dataProvider' => $dataProvider,
                        'names' => $names,
                        'mText' => $this->mText, 
                        'date1' => $date1, 
                        'date2' => $date2,
                        'yrs' => $yrs]);          
    }


    public function actionPct7Index() {
        $model = new Formmodel();
        $names=" จำนวนผู้ป่วยที่มีภาวะขาดเลือดที่ขา และถูกตัดขาตั้งแต่เหนือข้อเท้าขึ้นมา ในการนอนรพ.ครั้งนั้น  (ICD10=I740,I743,I745) และ (ICD9= 8413-8418)"; 
        if($model->load(Yii::$app->request->post())){
               $date1 = $model->date1;
               $date2 = $model->date2;                   
              return $this->redirect(['pct7_preview','name'=>$names,'d1'=>$date1,'d2'=>$date2]);
        }
            return $this -> render('/site/ipd-sur/pct/pct7_index',['mText'=>$this->mText,'names'=>$names,'model' => $model]);
    }    
    public function actionPct7_preview($name,$d1,$d2) {
        $names=$name;
        $date1=$d1;$date2=$d2;    
        $sql="select  IF(MONTH(o.vstdate)>=10,YEAR(o.vstdate)+1 ,YEAR(o.vstdate))+543 AS yrs from ovstdiag o
                where o.vstdate between '{$date1}' and '{$date2}' group by yrs;";
        $result = \Yii::$app->db1->createCommand($sql)->queryAll();      
        foreach ($result as $value) {
               $yrs = $value['yrs'];                                              
        }
        
        
        \Yii::$app->db1->createCommand("DROP TABLE IF EXISTS t1;")->execute();
        $dt1="CREATE TEMPORARY TABLE t1 AS
                (
                SELECT i.vn,i.an,i.dchdate,i.dchtype
                FROM ipt i
                INNER JOIN iptdiag d ON i.an=d.an
                WHERE i.dchdate BETWEEN '{$date1}' AND '{$date2}'
                AND d.icd10 IN('I740','I743','I745') 
                GROUP BY i.an
                );";
        $rt1 = \Yii::$app->db1->createCommand($dt1)->execute();      
        \Yii::$app->db1->createCommand("DROP TABLE IF EXISTS t2;")->execute();
        $dt2="CREATE TEMPORARY TABLE t2 AS
                (
                SELECT i.vn,i.an,i.dchdate,i.dchtype
                FROM ipt i
                INNER JOIN iptoprt o ON i.an=o.an
                WHERE i.dchdate BETWEEN '{$date1}' AND '{$date2}'
                AND o.icd9 BETWEEN 8413 AND 8418 
                GROUP BY i.an
                );";
        $rt2 = \Yii::$app->db1->createCommand($dt2)->execute();      
        
        $rawData=[];
        $sql1="SELECT  pname,total,Oct,Nov,Dece,Jan,Feb,Mar,Apr,May,Jun,Jul,Aug,Sep 
                    FROM (
			SELECT 'จำนวนผู้ป่วยที่มีภาวะขาดเลือดที่ขา และถูกตัดขาตั้งแต่เหนือข้อเท้าขึ้นมา (ICD10=I740,I743,I745) และ (ICD9= 8413-8418) (ผลงาน)' AS pname,
                        COUNT(t1.an) total,
                        COUNT(IF(MONTH(t1.dchdate)=10,1,NULL)) AS Oct,
                        COUNT(IF(MONTH(t1.dchdate)=11,1,NULL)) AS Nov,
                        COUNT(IF(MONTH(t1.dchdate)=12,1,NULL)) AS Dece,
                        COUNT(IF(MONTH(t1.dchdate)=1,1,NULL)) AS Jan,
                        COUNT(IF(MONTH(t1.dchdate)=2,1,NULL)) AS Feb,
                        COUNT(IF(MONTH(t1.dchdate)=3,1,NULL)) AS Mar,
                        COUNT(IF(MONTH(t1.dchdate)=4,1,NULL)) AS Apr,
                        COUNT(IF(MONTH(t1.dchdate)=5,1,NULL)) AS May,
                        COUNT(IF(MONTH(t1.dchdate)=6,1,NULL)) AS Jun,
                        COUNT(IF(MONTH(t1.dchdate)=7,1,NULL)) AS Jul,
                        COUNT(IF(MONTH(t1.dchdate)=8,1,NULL)) AS Aug,
                        COUNT(IF(MONTH(t1.dchdate)=9,1,NULL)) AS Sep
                    FROM t1 
			INNER JOIN t2 ON t1.an=t2.an 
		      ) pt;";                                                       
        $result1 = \Yii::$app->db1->createCommand($sql1)->queryAll();
        foreach ($result1 as $value1) {
        $rawData[]=[
               'id' => '',
               'pname' => $value1['pname'],
               'goal' => '',
               'oct' => $value1['Oct'],
               'nov' => $value1['Nov'],
               'dec' => $value1['Dece'],
               'jan' => $value1['Jan'],
               'feb' => $value1['Feb'],
               'mar' => $value1['Mar'],
               'apr' => $value1['Apr'],
               'may' => $value1['May'],
               'jun' => $value1['Jun'],
               'jul' => $value1['Jul'],
               'aug' => $value1['Aug'],
               'sep' => $value1['Sep'],
               'total' => $value1['total'], 
        ];               
        }      
        $sql2="SELECT  pname,total,Oct,Nov,Dece,Jan,Feb,Mar,Apr,May,Jun,Jul,Aug,Sep 
                    FROM (
			SELECT ' จำนวนผู้ป่วยที่ภาวะขาดเลือดที่ขา (ICD10=I740,I743,I745) ทั้งหมด (เป้าหมาย)' AS pname,
                        COUNT(t1.an) total,
                        COUNT(IF(MONTH(t1.dchdate)=10,1,NULL)) AS Oct,
                        COUNT(IF(MONTH(t1.dchdate)=11,1,NULL)) AS Nov,
                        COUNT(IF(MONTH(t1.dchdate)=12,1,NULL)) AS Dece,
                        COUNT(IF(MONTH(t1.dchdate)=1,1,NULL)) AS Jan,
                        COUNT(IF(MONTH(t1.dchdate)=2,1,NULL)) AS Feb,
                        COUNT(IF(MONTH(t1.dchdate)=3,1,NULL)) AS Mar,
                        COUNT(IF(MONTH(t1.dchdate)=4,1,NULL)) AS Apr,
                        COUNT(IF(MONTH(t1.dchdate)=5,1,NULL)) AS May,
                        COUNT(IF(MONTH(t1.dchdate)=6,1,NULL)) AS Jun,
                        COUNT(IF(MONTH(t1.dchdate)=7,1,NULL)) AS Jul,
                        COUNT(IF(MONTH(t1.dchdate)=8,1,NULL)) AS Aug,
                        COUNT(IF(MONTH(t1.dchdate)=9,1,NULL)) AS Sep
                    FROM t1 
		      ) pt;";                                                       
        $result2 = \Yii::$app->db1->createCommand($sql2)->queryAll();
        foreach ($result2 as $value2) {
        $rawData[]=[
               'id' => '',
               'pname' => $value2['pname'],
               'goal' => '',
               'oct' => $value2['Oct'],
               'nov' => $value2['Nov'],
               'dec' => $value2['Dece'],
               'jan' => $value2['Jan'],
               'feb' => $value2['Feb'],
               'mar' => $value2['Mar'],
               'apr' => $value2['Apr'],
               'may' => $value2['May'],
               'jun' => $value2['Jun'],
               'jul' => $value2['Jul'],
               'aug' => $value2['Aug'],
               'sep' => $value2['Sep'],
               'total' => $value2['total'], 
        ];               
        }      
        $sql4="SELECT  pname,total,Oct,Nov,Dece,Jan,Feb,Mar,Apr,May,Jun,Jul,Aug,Sep 
                    FROM (
			SELECT 'จำนวนผู้ป่วยที่ภาวะขาดเลือดที่ขา ที่รับไว้รักษาต่อ (Refer In)' AS pname,
                        COUNT(t1.an) total,
                        COUNT(IF(MONTH(t1.dchdate)=10,1,NULL)) AS Oct,
                        COUNT(IF(MONTH(t1.dchdate)=11,1,NULL)) AS Nov,
                        COUNT(IF(MONTH(t1.dchdate)=12,1,NULL)) AS Dece,
                        COUNT(IF(MONTH(t1.dchdate)=1,1,NULL)) AS Jan,
                        COUNT(IF(MONTH(t1.dchdate)=2,1,NULL)) AS Feb,
                        COUNT(IF(MONTH(t1.dchdate)=3,1,NULL)) AS Mar,
                        COUNT(IF(MONTH(t1.dchdate)=4,1,NULL)) AS Apr,
                        COUNT(IF(MONTH(t1.dchdate)=5,1,NULL)) AS May,
                        COUNT(IF(MONTH(t1.dchdate)=6,1,NULL)) AS Jun,
                        COUNT(IF(MONTH(t1.dchdate)=7,1,NULL)) AS Jul,
                        COUNT(IF(MONTH(t1.dchdate)=8,1,NULL)) AS Aug,
                        COUNT(IF(MONTH(t1.dchdate)=9,1,NULL)) AS Sep
                    FROM t1 
                    INNER JOIN referin r ON t1.vn=r.vn
		    ) pt;";                                                       
        $result4 = \Yii::$app->db1->createCommand($sql4)->queryAll();
        foreach ($result4 as $value4) {
        $rawData[]=[
               'id' => '',
               'pname' => $value4['pname'],
               'goal' => '',
               'oct' => $value4['Oct'],
               'nov' => $value4['Nov'],
               'dec' => $value4['Dece'],
               'jan' => $value4['Jan'],
               'feb' => $value4['Feb'],
               'mar' => $value4['Mar'],
               'apr' => $value4['Apr'],
               'may' => $value4['May'],
               'jun' => $value4['Jun'],
               'jul' => $value4['Jul'],
               'aug' => $value4['Aug'],
               'sep' => $value4['Sep'],
               'total' => $value4['total'], 
        ];               
        }      
        $sql5="SELECT  pname,total,Oct,Nov,Dece,Jan,Feb,Mar,Apr,May,Jun,Jul,Aug,Sep 
                    FROM (
			SELECT 'จำนวนผู้ป่วยที่ภาวะขาดเลือดที่ขา ที่ได้รับการส่งต่อ (Refer Out)' AS pname,
                        COUNT(t1.an) total,
                        COUNT(IF(MONTH(t1.dchdate)=10,1,NULL)) AS Oct,
                        COUNT(IF(MONTH(t1.dchdate)=11,1,NULL)) AS Nov,
                        COUNT(IF(MONTH(t1.dchdate)=12,1,NULL)) AS Dece,
                        COUNT(IF(MONTH(t1.dchdate)=1,1,NULL)) AS Jan,
                        COUNT(IF(MONTH(t1.dchdate)=2,1,NULL)) AS Feb,
                        COUNT(IF(MONTH(t1.dchdate)=3,1,NULL)) AS Mar,
                        COUNT(IF(MONTH(t1.dchdate)=4,1,NULL)) AS Apr,
                        COUNT(IF(MONTH(t1.dchdate)=5,1,NULL)) AS May,
                        COUNT(IF(MONTH(t1.dchdate)=6,1,NULL)) AS Jun,
                        COUNT(IF(MONTH(t1.dchdate)=7,1,NULL)) AS Jul,
                        COUNT(IF(MONTH(t1.dchdate)=8,1,NULL)) AS Aug,
                        COUNT(IF(MONTH(t1.dchdate)=9,1,NULL)) AS Sep
                    FROM t1 
                    WHERE t1.dchtype IN('04')
		    ) pt;";                                                       
        $result5 = \Yii::$app->db1->createCommand($sql5)->queryAll();
        foreach ($result5 as $value5) {
        $rawData[]=[
               'id' => '',
               'pname' => $value5['pname'],
               'goal' => '',
               'oct' => $value5['Oct'],
               'nov' => $value5['Nov'],
               'dec' => $value5['Dece'],
               'jan' => $value5['Jan'],
               'feb' => $value5['Feb'],
               'mar' => $value5['Mar'],
               'apr' => $value5['Apr'],
               'may' => $value5['May'],
               'jun' => $value5['Jun'],
               'jul' => $value5['Jul'],
               'aug' => $value5['Aug'],
               'sep' => $value5['Sep'],
               'total' => $value5['total'], 
        ];               
        }      

        $dataProvider = new \yii\data\ArrayDataProvider([
            'allModels' => $rawData,
            'pagination' => [
                'pageSize' => 15,
                ],
        ]);  
        return $this -> render('/site/ipd-sur/pct/pct7_preview',
                    ['dataProvider' => $dataProvider,
                        'names' => $names,
                        'mText' => $this->mText, 
                        'date1' => $date1, 
                        'date2' => $date2,
                        'yrs' => $yrs]);          
    }

}