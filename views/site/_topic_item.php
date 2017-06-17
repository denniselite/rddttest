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
<div class="row">
    <p>
        <?= Yii::t('main', 'User'); ?> <b><?= Html::encode($model->author); ?></b> <?= Yii::t('main', 'wrote'); ?>:
        <?= Html::encode($model->body); ?>
    </p>
    <p><?= Yii::t('main', 'rating'); ?>: <b><?= Html::encode($model->rating); ?></b>
        <?= Html::a(Yii::t('main', 'voteUp'), Url::toRoute(['site/topic', 'id' => $model->id, 'vote' => 'up'])); ?>
        / <?= Html::a(Yii::t('main', 'voteDown'), Url::toRoute(['site/topic', 'id' => $model->id, 'vote' => 'down'])); ?>
    </p>
</div>