<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use frontend\assets\FontAwesomeAsset;
use yii\bootstrap\Modal;

AppAsset::register($this);
FontAwesomeAsset::register($this);
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
    <?php
    NavBar::begin([
        'brandLabel' => "Yii 2 Build <i class='fa fa-plug'></i>",
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => 'Home', 'url' => ['/site/index']],
        ['label' => 'About', 'url' => ['/site/about']],
        ['label' => 'Contact', 'url' => ['/site/contact']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems[] = [
            'label' => 'Profile',
            'url' => ['/profile/view']
        ];

        $menuItems[] = [
            'label' => 'Books',
            'url' => ['/book/index']
        ];

        $menuItems[] = [
            'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
            'url' => ['/site/logout'],
            'linkOptions' => ['data-method' => 'post']
        ];
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
    <?php
        Modal::begin([
            'headerOptions' => ['id' => 'modal-header'],
            'id' => 'modal',
            'options' => ['class' => 'slide'],
            'clientOptions' => ['backdrop' => 'static', 'keyboard' => FALSE]
        ]);
        echo "<div id='modal-body'></div>";
        Modal::end();
    ?>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
<script type="text/javascript">
    $(document).ready(function()
    {
        $('.viewModal').click(function (event) {
            event.preventDefault();
            var modalContainer = $('#modal');
            var url = $(this).attr("href");
            $.ajax({
                url: url,
                type: "GET",
                data: {},
                success: function (data) {
                    $('#modal-body').html(data);
                    modalContainer.modal({show: true});
                }
            });
        });

        $('img').click(function(event) {
            event.preventDefault();
            var modalContainer = $('#modal');
            var id = $(this).parent().parent().children().first().next().text();
            var url = 'http://rgk-solution.ru/index.php?r=book/show&id=' + id;
            //var url = 'book/show&id=' + id;
            console.log(url);
            $.ajax({
                url: url,
                type: "GET",
                data: {},
                success: function (data) {
                    $('#modal-body').html(data);
                    modalContainer.modal({show: true});
                }
            });
        });
    })
</script>
</body>
</html>
<?php $this->endPage() ?>
