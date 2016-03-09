<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\page\Page */

$this->title = 'Нова сторінка';
$this->params['breadcrumbs'][] = ['label' => 'Сторінки', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
