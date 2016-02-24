<ul>
    <li><?= \yii\bootstrap\Html::a(Yii::t('common', 'Sign Out'), ['/site/logout'], [
            'data' => [
                'method' => 'post'
            ]
        ]) ?></li>
</ul>