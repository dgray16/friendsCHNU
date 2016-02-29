<?php
use dosamigos\datepicker\DatePicker;

$this->title = \app\components\TitleHelper::getTitle(Yii::t('common', 'Search'));
?>

<?php $form = \yii\widgets\ActiveForm::begin([
    'method' => 'get',
    'action' => [
        'search'
    ]
])?>

<?=$form->field($model, 'name')?>
<?=$form->field($model, 'birth_day')->widget(
    DatePicker::className(), [
    'clientOptions' => [
        'autoclose' => true,
        'format' => 'yyyy-m-d'
    ]
]);?>

<div>
    <?=\yii\bootstrap\Html::submitButton(Yii::t('common', 'Search'), [
        'class' => 'btn btn-primary'
    ])?>
</div>

<?php \yii\widgets\ActiveForm::end()?>


<div>
    <?php if (isset($dataProvider)):?>
        <?=\yii\widgets\ListView::widget([
            'dataProvider' => $dataProvider,
            'itemView' => '@app/modules/graduates/views/default/item'
        ])?>
    <?php endif?>
</div>