<?php

/* @var $this yii\web\View */
use \yii\helpers\Url;

$this->title = Yii::t('main', 'The rddt application');
?>
<div class="site-index">

    <div class="jumbotron">
        <h1><?=Yii::t('main', 'Welcome');?></h1>

        <p class="lead"><?=Yii::t('main', 'You are able to check the rddt test application.');?></p>

        <p><a class="btn btn-lg btn-success" href="<?=Url::to('/site/topic');?>"><?=Yii::t('main', 'Create your topic');?></a></p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2><?=Yii::t('main', 'Topics list');?></h2>

                <p><?=Yii::t('main', 'Here you can see all topics and vote for them');?></p>

                <p><a class="btn btn-default" href="<?=Url::to(['/site/list'])?>"><?=Yii::t('main', 'Topics list');?> &raquo;</a></p>
            </div>
        </div>

    </div>
</div>
