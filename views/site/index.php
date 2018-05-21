<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'My Yii Application';
?>
<style type="text/css">
    .bg {
        background: url(../../web/imgs/1.jpg) no-repeat center;
        background-size: contain;
    }

</style>
<div class="site-index">

    <div class="jumbotron">
        <h1>Congratulations!</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
    </div>

    <div class="body-content">
        <div class="row">
        <?php
        $lm = Html::Getlm();
        foreach ($lm as $key => $value) {//获取栏目名称
            ?>

                <div class="col-lg-4">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th><?php echo $value; ?></th>
                        </tr>
                        </thead>
                        <tbody>


                            <?php
                            foreach ($data[$key] as $v) {//获取主页问卷数据
                                echo "<tr><td>";
                                echo Html::a($v->SurveyName, ['useranswer/index', 'id' => $v->SurveyInfoId]);
                                echo "</tr></td>";
                            }
                            ?>


                        <tr>
                        <td><?= Html::a('更多问卷', ['survey-info/indexs' ,'id' => $key], ['class' => 'btn btn-success']) ?></td>
                        </tr>
                        </tbody>
                    </table>
                </div>

            <?php
        }
        ?>
        </div>
    </div>


</div>
