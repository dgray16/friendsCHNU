<?php
/* @var $this yii\web\View */
/* @var $model app\models\page\Page */
/* @var $form yii\widgets\ActiveForm */
use dosamigos\tinymce\TinyMce;
?>

<?=$form->field($model, 'title_en')?>
<?=$form->field($model, 'content_en')->widget(TinyMce::className(), [
    'options' => ['rows' => 16],
    'language' => 'uk',
    'clientOptions' => [
        'plugins' => [
            "advlist autolink lists link charmap print preview anchor",
            "searchreplace visualblocks code fullscreen",
            "insertdatetime media table contextmenu paste"
        ],
        'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
    ]
]);?>
