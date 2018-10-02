<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;
use kartik\select2\Select2;

//use backend\assets\AdminLteAsset;
//AppAsset::register($this);
//$asset      = AdminLteAsset::register($this);
//$baseUrl    = $asset->baseUrl;

/* @var $this yii\web\View */
/* @var $model backend\models\Nureport */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-group">

    <?php $form = ActiveForm::begin(); ?>
        <?php 
              $data =  [
                              'งานข้อมูลพื้นฐาน & ข้อมูลทั่วไป',    
                              'ข้อมูลระดับทีม - PCT สูติกรรม',
                              'ข้อมูลระดับทีม - PCT นรีเวชกรรม',
                              'ข้อมูลระดับทีม - PCT ศัลยกรรมทั่วไป',
                              'ข้อมูลระดับทีม - PCT ศัลยกรรมกระดูกและข้อ(ออร์โธปิดิกส์)',
                              'ข้อมูลระดับทีม - PCT อายุรกรรม',
                              'ข้อมูลระดับทีม - PCT กุมารเวชกรรม',
                              'ข้อมูลระดับทีม - PCT หู คอ จมูก',
                              'ข้อมูลระดับทีม - PCT จักษุ',
                              'ข้อมูลบริการสุขภาพปฐมภูมิ (PCC)',
                              'งานตัวชี้วัด KPI ',
                              'งานตัวชี้วัด Service Plan ',
                              'งานตัวชี้วัด QOF ',                  
                              'ข้อมูลระดับทีม - งานทีมงานคุณภาพ',                  
                              'งานห้องบัตร(เวชระเบียน)',
                              'งานผู้ป่วยนอก(9 แผนกหลัก)',
                              'งานอุบัติเหติเหตุและห้องฉุกเฉิน',
                              'งานเวชปฎิบัติและครอบครัว',
                              'งานสุขาภิบาลและป้องกันโรค',
                              'งานทันตกรรม',
                              'งานห้องตรวจตา(จักษุ)',
                              'งานเภสัชกรรม ห้องจ่ายยาผู้ป่วยนอก ',
                              'งานเภสัชกรรม ห้องจ่ายยาผู้ป่วยใน ',
                              'งานเภสัชกรรม งานผลิตยา',
                              'งาน Long Term Care(LTC)',
                              'งานอนามัยแม่และเด็ก',
                              'งานแพทย์แผนไทย',
                              'งานอาชีวะอนามัย ',
                              'งานสุขภาพจิต ',
                              'งานศูนย์ Admit ผู้ป่วย ',
                              'งานห้องชันสูตร(LAB)',
                              'งานวิสัญญี(Anesth)',
                              'งานกายภาพบำบัด(physical therapy)',
                              'งานสุขศึกษาและปรับเปลี่ยนพฤติกรรม',
                              'อาคาร 4 ชั้น 1 (ศัลยกรรมกระดูก) ',
                              'อาคาร 4 ชั้น 2 (ศัลยกรรมทั่วไป-หญิง)',     
                              'อาคาร 4 ชั้น 3 (ศัลยกรรมทั่วไป-ชาย)',
                              'อาคาร 4 ชั้น 4 (ห้องพิเศษ)',
                              'อาคาร 4 ชั้น 5 (พิเศษ)',
                              'หอผู้ป่วยหนัก (ICU)',
                              'อาคาร 5 ชั้น 1 (อายุรกรรม - ชาย)',
                              'อาคาร 5 ชั้น 2 (อายุรกรรม - หญิง)',
                              'อาคาร 5 ชั้น 3 (EENT)',
                              'อาคาร 5 ชั้น 4 (เคมีบำบัด)',
                              'อาคาร 5 ชั้น 5 (อายุรกรรม - ห้องพิเศษ)',
                              'อาคาร 5 ชั้น 6 (อายุรกรรม - ห้องพิเศษ)',
                              'อาคาร สกลฯชั้น 2 (กุมารเวชกรรม)',
                              'อาคาร สกลฯชั้น 3 (พิเศษ - กุมารเวชกรรม)',
                              'อาคาร สกลฯชั้น 4 (พิเศษ - กุมารเวชกรรม)',
                              'คลินิกผู้ป่วยโรคเรื้อรัง(NCD)',
                              'คลินิกโรคไต',
                              'คลินิกสุขภาพเด็กดี(บัญชี 3,4)',
                              'คลินิกหญิงตั้งครรภ์(ANC)',
                              'คลินิกยาต้านผู้ป่วยโรคเรื้อรัง(ARV)',
                              'คลินิกผู้ป่วยโรคเรื้อรัง(COPD)',
                              'คลินิกผู้ป่วยโรคเรื้อรัง(Asthma)',
                              'คลินิกผู้ป่วยโรคเรื้อรัง(TB)',
                              'คลินิกผู้ป่วยโรคเรื้อรัง(Warfarin)',
                              'งานประกันสุขภาพ',                          
                              ];
              $listData = array_combine($data, $data);
        ?>
    <?= $form->field($model, 'station',[ 'options' => ['style' => 'width: 450px']])->dropDownList($listData,
               ['prompt'=>'Select ................ '],   
               ['class' => 'form-control select2']
            )
    ?>
    
  

    <?= $form->field($model, 'rname',[ 'options' => ['style' => 'width: 1000px']])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rcontroller',[ 'options' => ['style' => 'width: 450px']])->textInput(['maxlength' => true]) ?>
    
    <label>วันที่ :</label>
    <?php  echo DatePicker::widget([
                                                'model' => $model,
                                                'attribute' => 'rdate',
						'name' => 'rdate',
						'id' => 'datepicker',
                                                'language' => 'th',
                                                'dateFormat' => 'yyyy-MM-dd',
                                                'options' => [
                                                    'style' => 'width:120px;height:36px;text-align:center;',
                                                    'placeholder' => '    /  /  ',  
                                                    'class' => 'form-control state-success'
                                              ],          
]); 
    
    ?>

    <?= $form->field($model, 'status',[ 'options' => ['style' => 'width: 250px']])->dropDownList(
               ['1' => 'New','2' => 'Update'],['prompt'=>' Select ........... '],
               ['class' =>'form-control select2 select2-hidden-accessible']
            
            ) ?>
    <?= $form->field($model, 'ext',[ 'options' => ['style' => 'width: 1000px']])->textInput(['maxlength' => true]) ?>
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
