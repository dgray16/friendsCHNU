<?php
$this->title = \app\components\TitleHelper::getTitle(Yii::t('common', 'Graduates'));
?>

<?=\yii\widgets\ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => 'item'
])?>