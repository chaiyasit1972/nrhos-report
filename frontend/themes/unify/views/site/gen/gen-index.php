<?php

use yii\helpers\Html;
use yii\jui\DatePicker;
use kartik\select2\Select2;
use kartik\widgets\ActiveForm;
use kartik\checkbox\CheckboxX;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

use common\models\SoRecv;
use common\models\Hospcode;
$sorecv = new SoRecv();
$hospcode = new Hospcode();
?>
<head>
    <style type="text/css">
        .indent{ 
                    /*padding-left: 1.0em;*/
                    padding-top: 1.8em;
                 }
    </style>
</head>
<div class="breadcrumbs">
    <div class="container">
        <h3 class="pull-left"><?=$mText;?></h3>
        <ul class="pull-right breadcrumb">
            <li><?=Html::a('Home',['/site/index']);?></li>
            <li><?=Html::a($sText,['/gen/index']);;?></li>
            <li><?=$dText;?></li>
            <li class="active"><?=$gText;?></li>
        </ul>
    </div>
</div>




<div class="container content">
    <div class="row">
        <div class="col-md-12">
            <?php
            $form = ActiveForm::begin([
                        'id' => 'login-form-inline',
                        'type' => ActiveForm::TYPE_INLINE,
                        'options' => [                           
                            'class' => 'sky-form',
                           // 'target' => '_blank'
                        ],
                        'formConfig' => [
                            'labelSpan' => 1,
                            'deviceSize' => ActiveForm::SIZE_SMALL,
                        ]
            ]);
            ?>     
        <div class="panel panel-light-green margin-bottom-5">            
            <div class="panel-heading">
                <h3><?= $names; ?></h3>
            </div><label class="label"></label>
            <div class="panel">
                <div class="panel-body">
                    <div class="col-md-5 text-right">
                        <div class="form-group">
                        <?=
                        $form->field($hospcode, 'hospcode')->dropDownList($data, [
                            'name' => 'pcode',
                            'prompt' => '============  เลือกสถานบริการ  ============',
                            //'class' => 'select2',
                            //'required'=>'true',
                            'onchange' => '
                                    $.get( "' . Url::toRoute('dependent/selectcup') . '", { pcode: $(this).val() } )
                                        .done(function( data ) {
                                            $( "#' . Html::getInputId($sorecv, 'hospsub') . '" ).html( data );
                                        }
                                    );
                                '
                        ])->label('เลือกสถานบริการ');
                        ?>
                        </div>
                    </div>
                    <div class="col col-md-5 text-right">
                        <div class="form-group">
                        <?=
                        $form->field($sorecv, 'hospsub')->dropDownList([], [
                            'name' => 'hospsub',
                            //'class' => 'select2',
                            'prompt' => '============ เลือกหมู่บ้าน/ชุมชน ============'
                                ]
                        )->label('เลือกหมู่บ้าน/ชุมชน');
                        ?>
                        </div>
                    </div>
                    <div class="col-md-2 text-right">
                    <?php echo Html::submitButton('Previews', ['class' => 'btn-u btn-u-green']); ?>
                    </div>
                </div>     
            </div>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />