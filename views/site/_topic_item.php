<?php
/**
 * Created by PhpStorm.
 * User: Denniselite
 * Date: 17/06/2017
 * Time: 03:31
 *
 * @var \app\models\Topic $model
 */
use yii\helpers\Html;
use yii\helpers\Url;

?>
<div class="panel panel-default">
    <div class="panel-heading"><?= Yii::t('main', 'User'); ?> <b><?= Html::encode($model->author); ?></b> <?= Yii::t('main', 'wrote'); ?></div>
    <div class="panel-body">
        <?= Html::encode($model->body); ?>
    </div>
    <div class="panel-footer">
        <?= \Yii::t('main', 'rating'); ?>: <b><?= Html::encode($model->rating); ?></b>
           <?= Html::a(Yii::t('main', 'voteUp'), Url::toRoute(['site/topic', 'id' => $model->id, 'vote' => 'up']), ['class' => 'btn btn-primary btn-xs']); ?>
            / <?= Html::a(Yii::t('main', 'voteDown'), Url::toRoute(['site/topic', 'id' => $model->id, 'vote' => 'down']), ['class' => 'btn btn-default btn-xs']); ?>
    </div>
</div>