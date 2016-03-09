<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\page\Page */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="page-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="col-md-9">
        <?=\yii\bootstrap\Tabs::widget([
            'items' => [
                [
                    'label' => 'Українська',
                    'content' => $this->render('uk-form', [
                        'form' => $form,
                        'model' => $model
                    ])
                ],
                [
                    'label' => 'English',
                    'content' => $this->render('en-form', [
                        'form' => $form,
                        'model' => $model
                    ])
                ]
            ]
        ])?>
    </div>

    <div class="col-md-3">
        <?=$form->field($model, 'slug')?>
        <?=$form->field($model, 'category_id')->dropDownList(\yii\helpers\ArrayHelper::map(
            \app\models\record\Category::find()->asArray()->all(), 'id', 'title'
        ))?>

        <div>
            <?=Html::submitButton('Зберегти', [
                'class' => 'btn btn-success'
            ])?>
        </div>
    </div>


    <?php ActiveForm::end(); ?>

</div>
