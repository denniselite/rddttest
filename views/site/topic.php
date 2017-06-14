<?php
/**
 * Created by PhpStorm.
 * User: Denniselite
 * Date: 14/06/2017
 * Time: 06:32
 *
 * @var \app\models\TopicForm $model
 */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = \Yii::t('main', 'Topic');
$this->params['breadcrumbs'][] = $this->title;

?>
<h1><?= Html::encode($this->title) ?></h1>

<?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

<div class="alert alert-success">
    <?=Yii::t('main', 'Your topic was successfully added');?>
</div>

<?php else: ?>
    <div class="row">
        <div class="col-lg-5">

            <?php $form = ActiveForm::begin(['id' => 'topic-form']); ?>

            <?= $form->field($model, 'author')->textInput(['autofocus' => true]) ?>

            <?= $form->field($model, 'body')->textarea(['rows' => 3]) ?>

            <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
            ]) ?>

            <div class="form-group">
                <?= Html::submitButton('Create', ['class' => 'btn btn-primary', 'name' => 'add-topic-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
<?php endif; ?>
