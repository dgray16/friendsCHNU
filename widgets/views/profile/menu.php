<b><?= $user->info->sur_name ?> <?= $user->info->first_name ?></b>
<div>
    <img src="<?=$user->avatarUrl?>" class="img-responsive">
</div>
<ul>
    <li>
        <?= \yii\bootstrap\Html::a(Yii::t('common', 'Profile'), ['/profile']) ?>
    </li>

    <li><?= \yii\bootstrap\Html::a(Yii::t('common', 'Sign Out'), ['/site/logout'], [
            'data' => [
                'method' => 'post'
            ]
        ]) ?></li>
</ul>