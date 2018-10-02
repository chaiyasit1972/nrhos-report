<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Nureport */

$this->title = 'Create Nureport';
$this->params['breadcrumbs'][] = ['label' => 'Nureports', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nureport-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
