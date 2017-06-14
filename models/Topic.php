<?php
/**
 * Created by PhpStorm.
 * User: Denniselite
 * Date: 14/06/2017
 * Time: 07:29
 */

namespace app\models;
use yii\base\Model;

class Topic extends Model
{
    /**
     * Topic ID
     * @var int
     */
    public $id;
    /**
     * Author of the topic
     * @var string
     */
    public $author;

    /**
     * Topic's body
     * @var string
     */
    public $body;

    /**
     * Current rating of topic
     * @var int
     */
    protected $_rating = 0;

    /**
     * Current rating getter
     * @return int
     */
    public function getRating()
    {
        return $this->_rating;
    }

    /**
     * Vote up of topic
     * @return $this
     */
    public function setVoteUp()
    {
        $this->_rating++;
        return $this;
    }

    /**
     * Vote down of topic ration
     * @return $this
     */
    public function setVoteDown()
    {
        $this->_rating++;
        return $this;
    }
}