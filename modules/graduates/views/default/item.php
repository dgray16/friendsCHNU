<?php
/**
 * @var \app\models\user\User $model
 */
?>

<div class="col-md-6">
    <div class="card">
        <canvas class="header-bg" width="250" height="70" id="header-blur"></canvas>
        <div class="avatar">
            <img src="<?=$model->avatarUrl?>" alt="" />
        </div>
        <div class="content">
            <p><?=$model->info->sur_name?> <?=$model->info->first_name?></p>
            <p>
                <?=\yii\helpers\Html::a(Yii::t('common','Profile'), [
                    '/profile/view',
                    'id' => $model->id
                ], [
                    'class' => 'btn btn-success'
                ])?>
            </p>
        </div>
    </div>
</div>
