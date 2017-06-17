<?php
/**
 * Created by PhpStorm.
 * User: Denniselite
 * Date: 14/06/2017
 * Time: 07:46
 */

namespace app\components\api;

use \yii\base\Component;
use yii\base\ErrorException;
use yii\httpclient\Client;
use app\models\Topic;

class ApiClient extends Component
{
    const ACTION_TOPIC = 'topics';

    public $host;

    public $version;

    private $_httpClient;

    public function __construct(array $config = [])
    {
        $this->_httpClient = new Client;
        parent::__construct($config);
    }

    /**
     * @param Topic $topic
     * @return mixed
     * @throws ErrorException
     */
    public function saveTopic(Topic $topic)
    {
        $response = $this->_httpClient->createRequest()
            ->setMethod('post')
            ->setFormat(Client::FORMAT_JSON)
            ->setUrl($this->getApiUrl(static::ACTION_TOPIC))
            ->setData([
                'author' => $topic->author,
                'body' => $topic->body
            ])
            ->send();
        if ($response->isOk) {
            return $response->data['id'];
        } else {
            throw new ErrorException(sprintf('Can not save topic, response code: %d, message: %s', $response->getStatusCode(), $response->getContent()));
        }
    }

    /**
     * @return array
     * @throws ErrorException
     */
    public function getTopics()
    {
        $response = $this->_httpClient->createRequest()
            ->setMethod('get')
            ->setFormat(Client::FORMAT_JSON)
            ->setUrl($this->getApiUrl(static::ACTION_TOPIC))
            ->send();
        if ($response->isOk) {
            $items = $response->data['items'];
            $topics = [];
            foreach ($items as $id => $item) {
                $topics[] = (new Topic)
                    ->setId($id)
                    ->setAuthor($item['author'])
                    ->setBody($item['body'])
                    ->setRating($item['rating']);
            }
            return $topics;
        } else {
            throw new ErrorException(sprintf('Can not save topic, response code: %d, message: %s', $response->getStatusCode(), $response->getContent()));
        }
    }


    /**
     * @param int $topicId
     * @param bool $isPositive
     * @return mixed
     * @throws ErrorException
     */
    public function voteForTopic($topicId, $isPositive)
    {
        $response = $this->_httpClient->createRequest()
            ->setMethod('put')
            ->setFormat(Client::FORMAT_JSON)
            ->setUrl($this->getApiUrl(static::ACTION_TOPIC) . '/' .$topicId)
            ->setData([
                'voteDirection' => $isPositive,
            ])
            ->send();
        if ($response->isOk) {
            return true;
        } else {
            throw new ErrorException(sprintf('Can not vote for topic, response code: %d, message: %s', $response->getStatusCode(), $response->getContent()));
        }
    }

    /**
     * Endpoint API URL getter
     * @param string $action
     * @return string
     */
    private function getApiUrl($action)
    {
        return sprintf('%s/%s', $this->host, $action);
    }
}