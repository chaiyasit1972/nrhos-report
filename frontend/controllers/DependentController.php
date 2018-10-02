<?php
/**
 * Dependent controller use as ajax request
 *
 * @package EduSec.modules.report.controllers
 */

namespace frontend\controllers;
use yii\helpers\Html;
use Yii;
use yii\helpers\ArrayHelper;

use common\models\SoRecv;

class DependentController extends \yii\web\Controller
{
	/* for stuinforeport get batch of selected course */


        public function actionSelectcup($pcode)
	{
                //    $rows = \common\models\SoRecv::find()->where(['hospsub' => $pcode])->all();                    
            $sql1 = "select '00' as moo_id, '----------------------- เลือกทั้งหมด ------------------------'  as moo_name 
                     union all select moo_id, moo_name from so_recv where hospsub = '{$pcode}';";
            try {
                    $rows = \Yii::$app->db1->createCommand($sql1)->queryAll(); 
                } catch (\yii\db\Exception $e) {
                    throw new \yii\web\ConflictHttpException('sql error');
                    }                              
            //echo "<option value=''>" .'-------------------- ทุก หมู่บ้าน/ชุมชน. --------------------'. "</option>";
            foreach ($rows as $value) {
                echo "<option value=' " . $value['moo_id']. "  '>" . ' ' . $value['moo_name'] . "</option>";
            }	                   
     

    	}

	// get student section based on batch selection -------------------

	public function actionCupsection($pcode)
	{
		$rows = SoRecv::find()->where(['hospsub' => $pcode])->all();

		echo "<option value=''>" .'--- ทุก รพ.สต. --'. "</option>";
	 
		if(count($rows) > 0){
		    foreach($rows as $row){
		        echo "<option value='$row->hospsub'>$row->moo_name</option>";
		    }
		}
		else{
		    echo "";
		}
 
    	}


}
