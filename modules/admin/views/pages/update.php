<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\page\Page */

$this->title = 'Редагування торінки';
$this->params['breadcrumbs'][] = ['label' => 'Сторінки', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Редагування';
?>
<div class="page-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
