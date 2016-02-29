<div class="card">
    <canvas class="header-bg" width="250" height="70" id="header-blur"></canvas>
    <div class="avatar">
        <img style="background-image: url(<?=$user->avatarUrl?>)"/>
    </div>
    <div class="content">
        <p><?= $user->info->sur_name ?> <?= $user->info->first_name ?></p>

        <div>
            <ul class="collection">
                <li class="collection-item">
                    <?= \yii\bootstrap\Html::a(Yii::t('common', 'Profile'), ['/profile']) ?>
                </li>

                <li><?= \yii\bootstrap\Html::a(Yii::t('common', 'Sign Out'), ['/site/logout'], [
                        'data' => [
                            'method' => 'post'
                        ]
                    ]) ?></li>
            </ul>
        </div>
    </div>
</div>