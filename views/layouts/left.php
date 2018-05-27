<?php
use yii\widgets\ActiveForm;
?>
<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user11.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?php
                    if(empty(Yii::$app->user->isGuest)){
                        echo Yii::$app->user->identity->username;
                    }else{
                        echo '未登录';
                    }
                    ?>
                </p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <?php $form = ActiveForm::begin(['action' => ['survey-info/indexl'],'method'=>'get','options'=>['enctype'=>'multipart/form-data','class' => 'sidebar-form']]); ?>
        <div class="input-group">
            <input type="text" name="name" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
        <?php ActiveForm::end(); ?>
        <!--<form action="survey-info/indexl.html" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="name" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>-->
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    //['label' => 'Menu Yii2', 'options' => ['class' => 'header']],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                ],
            ]
        ) ?>
        <?php

        use mdm\admin\components\MenuHelper;


        $callback = function($menu){
            $data = json_decode($menu['data'], true);
            $items = $menu['children'];
            $return = [
                'label' => $menu['name'],
                'url' => [$menu['route']],
            ];
            //处理我们的配置
            if ($data) {
                //visible
                isset($data['visible']) && $return['visible'] = $data['visible'];
                //icon
                isset($data['icon']) && $data['icon'] && $return['icon'] = $data['icon'];
                //other attribute e.g. class...
                $return['options'] = $data;
            }
            //没配置图标的显示默认图标，默认图标大家可以自己随便修改
            (!isset($return['icon']) || !$return['icon']) && $return['icon'] = 'circle-o';
            $items && $return['items'] = $items;

            return $return;
        };

        //这里我们对一开始写的菜单menu进行了优化
        echo dmstr\widgets\Menu::widget( [
            'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
            'items' => MenuHelper::getAssignedMenu(Yii::$app->user->id, null, $callback),
        ] );
        ?>
    </section>

</aside>
