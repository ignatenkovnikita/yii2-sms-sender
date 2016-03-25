<?php
/**
 * Created by PhpStorm.
 * User: Ignatenkov Nikita
 * Site: http://ignatenkovnikita.ru/
 * Date: 24.03.2016
 * Time: 15:17
 */

namespace ignatenkovnikita\smssender;


use yii\base\Component;

class ClientSmsSender extends Component
{
    /** @var  \SoapClient $_client */
    private $_client;
    /** @var array $credentials */
    public $credentials;
    /** @var  string $gate */
    public $gate;
    /** @var  string */
    public $sender;

    public function init()
    {
        parent::init();
        $this->_client = new \SoapClient($this->gate, ["trace" => 1, "exceptions" => 0]);
    }


    public function send($phone, $message)
    {
        $params = [
            'generator' => $this->credentials,
            'shortPhone' => $this->sender,
            'clientPhone' => $phone,
            'message' => $message,
        ];

        $result = $this->_client->sendOutboundMessage($params);
        return $result->return;
    }

    // todo test this method
    public function state($messageId){
        $params = [
            'generator' => $this->credentials,
            'MessageID'     => $messageId,

        ];

        $result = $this->_client->getDeliveryState($params);
        return $result;
    }

}