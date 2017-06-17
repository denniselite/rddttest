<?php
/**
 * Created by PhpStorm.
 * User: Denniselite
 * Date: 14/06/2017
 * Time: 06:32
 *
 * @var \yii\data\ArrayDataProvider $dataProvider
 */

use \yii\widgets\ListView;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = \Yii::t('main', 'List');
$this->params['breadcrumbs'][] = $this->title;

?>
<h1><?= Html::encode($this->title) ?></h1>

<?= ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => '_topic_item',
]) ?>