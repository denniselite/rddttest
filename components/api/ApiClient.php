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
    const ACTION_TOPIC = 'topic';

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
            ->setUrl($this->getApiUrl(static::ACTION_TOPIC))
            ->setData([
                'author' => $topic->author,
                'body' => $topic->body
            ])
            ->send();
        if ($response->isOk) {
            $topicId = $response->data['id'];
            return $topicId;
        } else {
            throw new ErrorException(sprintf('Can not save topic, response code: %d, message: %s', $response->getStatusCode(), $response->getContent()));
        }
    }

    /**
     * Endpoint API URL getter
     * @param string $action
     * @return string
     */
    private function getApiUrl($action)
    {
        return sprintf('%s/%s/%s', $this->host, $this->version, $action);
    }
}