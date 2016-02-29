<?php
use dosamigos\datepicker\DatePicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = Yii::t('common', 'Sign Up');
?>

<?php $form = ActiveForm::begin([
    'enableAjaxValidation' => true,
    'enableClientValidation' => true,
])?>
<div class="col-md-6">
    <?=$form->field($user, 'email')?>
    <?=$form->field($user, 'password')->passwordInput()?>
    <?=$form->field($user, 'password_repeat')->passwordInput()?>
</div>

<div class="col-md-6">
    <?=$form->field($userInfo, 'first_name')?>
    <?=$form->field($userInfo, 'last_name')?>
    <?=$form->field($userInfo, 'sur_name')?>
    <?=$form->field($userInfo, 'telephone')->widget(\yii\widgets\MaskedInput::className(), [
        'mask' => '38 (099)-99-99-999',
    ])?>
    <?=$form->field($userInfo, 'birth_day')->widget(
        DatePicker::className(), [
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-m-d'
        ]
    ]);?>
    <?=$form->field($userInfo, 'entry_year')?>
    <?=$form->field($userInfo, 'graduation_year')?>
    <?=$form->field($userInfo, 'description')->textarea()?>
</div>

<div class="clearfix"></div>

<?=Html::submitButton(Yii::t('common', Yii::t('common', 'Sign Up')))?>
<?php ActiveForm::end()?>