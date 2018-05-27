<?php
use yii\helpers\Html;
use yii\bootstrap\Modal;
use yii\helpers\Url;
// 异步请求的地址
$requestSignupUrl = Url::toRoute('userbackend/signup');
$requestlLoginUrl = Url::toRoute('site/login');
$js = <<<JS
// 创建操作
$('#signup').on('click', function () {
    $('.modal-title').html('注册用户');
    $.get('{$requestSignupUrl}',
        function (data) {
            // 弹窗的主题渲染页面
            $('.modal-body').html(data);
        }
    );
});
$('#login').on('click', function () {
    $('.modal-title').html('登陆-');
    $.get('{$requestlLoginUrl}',
        function (data) {
            // 弹窗的主题渲染页面
            $('.modal-body').html(data);
        }
    );
});
JS;
$this->registerJs($js);

    Modal::begin([
        'id' => 'operate-modal',
        'header' => '<h4 class="modal-title"></h4>',
    ]);
    Modal::end();


/* @var $this \yii\web\View */
/* @var $content string */
?>

<header class="main-header">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?= Html::a('<span class="logo-mini">APP</span><span class="logo-lg">' . Yii::$app->name . '</span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button" data-fgColor="#fff" >
            导航
        </a>

        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">

                <!-- Messages: style can be found in dropdown.less-->

                <!-- User Account: style can be found in dropdown.less -->

                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?= $directoryAsset ?>/img/user11.jpg" class="user-image" alt="User Image"/>
                        <span class="hidden-xs">
                            <?php
                                if(empty(Yii::$app->user->isGuest)){
                                    echo Yii::$app->user->identity->username;
                                }
                            ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="<?= $directoryAsset ?>/img/user11.jpg" class="img-circle"
                                 alt="User Image"/>

                            <p>
                                <?php
                                    if(empty(Yii::$app->user->isGuest)){
                                        echo Yii::$app->user->identity->username;
                                    }
                                ?>
                            </p>
                        </li>
                        <!-- Menu Body -->

                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <?php

                                if(Yii::$app->user->isGuest){
                                    echo Html::a(
                                        '注册',
                                        ['userbackend/signup'],
                                        ['class' => 'btn btn-default btn-flat',
                                            'id' => 'signup', // 按钮的id随意
                                            'data-toggle' => 'modal', // 固定写法
                                            'data-target' => '#operate-modal', // 等于modal begin中设定的参数id值
                                        ]
                                    );
                                }



                                ?>
                            </div>
                            <div class="pull-right">
                                <?=

                                Yii::$app->user->isGuest ? (
                                Html::a(
                                    '登陆',
                                    ['site/login'],
                                    ['class' => 'btn btn-default btn-flat',
                                        'id' => 'login', // 按钮的id随意
                                        'data-toggle' => 'modal', // 固定写法
                                        'data-target' => '#operate-modal', // 等于modal begin中设定的参数id值
                                    ]
                                )

                                ) : (Html::a(
                                    '退出',
                                    ['/site/logout'],
                                    ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
                                ));


                                ?>
                            </div>
                        </li>
                    </ul>
                </li>

                <!-- User Account: style can be found in dropdown.less -->
                <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>
            </ul>
        </div>
    </nav>
</header>
