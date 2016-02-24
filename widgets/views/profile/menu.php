<b><?=$user->info->sur_name?> <?=$user->info->first_name?></b>

<ul>
    <li><?= \yii\bootstrap\Html::a(Yii::t('common', 'Sign Out'), ['/site/logout'], [
            'data' => [
                'method' => 'post'
            ]
        ]) ?></li>
</ul>