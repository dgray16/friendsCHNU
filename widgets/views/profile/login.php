<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<?php $form = ActiveForm::begin([
    'action' => ['/site/login'],
    'enableAjaxValidation' => true,
    'enableClientValidation' => true,
]) ?>
<?= $form->field($model, 'email') ?>
<?= $form->field($model, 'password')->passwordInput() ?>
<?= $form->field($model, 'rememberMe')->checkbox() ?>
<?= Html::submitButton(Yii::t('common', 'Sign In'), [
    'class' => 'btn btn-primary'
]) ?>
<?php ActiveForm::end() ?>

<div>
    <?=Html::a('Sign Up', ['/site/registration'])?>
</div>
