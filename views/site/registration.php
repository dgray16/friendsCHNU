<?php
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
    <?=$form->field($userInfo, 'telephone')?>
    <?=$form->field($userInfo, 'birth_day')?>
    <?=$form->field($userInfo, 'entry_year')?>
    <?=$form->field($userInfo, 'graduation_year')?>
    <?=$form->field($userInfo, 'description')->textarea()?>
</div>

<div class="clearfix"></div>

<?=Html::submitButton(Yii::t('common', Yii::t('common', 'Sign Up')))?>
<?php ActiveForm::end()?>