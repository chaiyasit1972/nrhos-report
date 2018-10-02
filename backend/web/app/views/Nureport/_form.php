<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Nureport */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nureport-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'station')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rcontroller')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rdate')->textInput() ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
