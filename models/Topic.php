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
    public $rating = 0;

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function setAuthor($author)
    {
        $this->author = $author;
        return $this;
    }

    /**
     * @param $body
     * @return Topic
     */
    public function setBody($body)
    {
        $this->body = $body;
        return $this;
    }

    public function setRating($rating)
    {
        $this->rating = $rating;
        return $this;
    }
}