<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
?>
<?php

$form = ActiveForm::begin([
    'options' => [
        'autocomplete' => "off",
        'enctype' => 'multipart/form-data'
    ],
    'enableClientValidation' => true,
])?>
    <div class="col-md-6">
        <div>
            <img src="<?=$user->avatarUrl?>" class="img-responsive">
        </div>
        
        <?=$form->field($user, 'avatar')->fileInput()?>
        <?=$form->field($user, 'email')?>
        <?=$form->field($user, 'password')->passwordInput()?>
    </div>

    <div class="col-md-6">
        <?=$form->field($user->info, 'first_name')?>
        <?=$form->field($user->info, 'last_name')?>
        <?=$form->field($user->info, 'sur_name')?>
        <?=$form->field($user->info, 'telephone')->widget(\yii\widgets\MaskedInput::className(), [
            'mask' => '38 (099)-99-99-999',
        ])?>
        <?=$form->field($user->info, 'birth_day')->widget(
            DatePicker::className(), [
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-m-d'
            ]
        ]);?>
        <?=$form->field($user->info, 'entry_year')?>
        <?=$form->field($user->info, 'graduation_year')?>
        <?=$form->field($user->info, 'description')->textarea()?>
    </div>

    <div class="clearfix"></div>

<?=Html::submitButton(Yii::t('common', Yii::t('common', 'Update')), [
    'class' => 'btn btn-success'
])?>
<?php ActiveForm::end()?>

