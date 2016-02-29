<div class="row">
    <div class="card left-align">
        <canvas class="header-bg" width="250" height="70" id="header-blur"></canvas>
        <div class="avatar">
            <div class="row">
                <div class="col-md-4">
                    <img style="background-image: url(<?=$profile->avatarUrl?>)"/>
                </div>

                <div class="col-md-8">
                    <div class="col-md-8">
                        <h4>
                            <?=$profile->info->sur_name?> <?=$profile->info->first_name?> <?=$profile->info->last_name?>
                        </h4>
                    </div>
                    <div class="col-md-4 right">
                        <?=\yii\bootstrap\Html::a(Yii::t('common','Write message'), [
                            '/message' , 'id' => $profile->id
                        ], [
                            'class' => 'btn btn-primary'
                        ])?>
                    </div>

                </div>
            </div>
        </div>
        <div class="content">
            <div class="col-md-12">
                <?=\yii\widgets\DetailView::widget([
                    'model' => $profile,
                    'attributes' => [
                        'email:email',
                        'info.telephone',
                        'info.birth_day:date',
                        'info.entry_year',
                        'info.graduation_year',
                        'info.description',
                    ]
                ])?>
            </div>
        </div>
    </div>
</div>