<?php
/**
 * Created by PhpStorm.
 * User: Denniselite
 * Date: 14/06/2017
 * Time: 06:24
 */

namespace app\models;

class TopicForm extends Topic
{
    /**
     * Captcha verification string
     * @var string
     */
    public $verifyCode;

    public function rules()
    {
        return array_merge([
                [['author', 'body'], 'required'],
                ['body', 'string', 'max' => 255],
                // verifyCode needs to be entered correctly
                ['verifyCode', 'captcha'],
        ],
            parent::rules()
        );
    }

    /**
     * Customized attribute labels
     * @return array
     */
    public function attributeLabels()
    {
        return [
            'verifyCode' => \Yii::t('main', 'Verification Code'),
        ];
    }
}