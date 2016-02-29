<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
\pjhl\multilanguage\assets\ChangeLanguageAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <div class="container">
        <div class="header-image"
             style="background: url('/images/<?= \app\components\LanguageHelper::getLanguage() ?>.header.jpg')"></div>

        <div class="row">
            <?php
            NavBar::begin([
                'options' => [
                    'class' => 'navbar-default',
                ],
            ]);
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-left'],
                'items' => \app\components\NavHelper::buildMenuItems()
            ]);
            NavBar::end();
            ?>
        </div>

        <div class="col-md-9">
            <?= $content ?>
        </div>

        <div class="col-md-3">
            <div>
                <a href="#" class="multilanguage-set" data-language="1">EN</a>
                <a href="#" class="multilanguage-set" data-language="2">UK</a>
            </div>

            <div>
                <?= \app\widgets\ProfileWidget::widget() ?>
            </div>
        </div>

        <div class="clearfix"></div>
        <div class="row">
            <footer class="footer">
                <div class="container">
                    <p class="pull-left">&copy; ЧНУ <?= date('Y') ?></p>

                    <p class="pull-right">
                        <?=Html::a(Yii::t('common', 'Developers'), ['/developers'])?>
                    </p>
                </div>
            </footer>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
