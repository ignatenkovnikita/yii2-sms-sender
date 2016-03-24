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
    protected $client = false;
    public $credentials;
    public $gate;
    public $sender;

    public function init()
    {
        parent::init();
        $this->client = new \SoapClient($this->gate, ["trace" => 1, "exceptions" => 0]);
    }


    public function send($phone, $message)
    {
        $params = [
            'generator' => $this->credentials,
            'shortPhone' => $this->sender,
            'clientPhone' => $phone,
            'message' => $message,
        ];

        $result = $this->client->sendOutboundMessage($params);
        return $result->return;
    }

    // todo test this method
    public function state($messageId){
        $params = [
            'generator' => $this->credentials,
            'messageId'     => $messageId,

        ];

        $result = $this->client->getDeliveryState($params);
        return $result;
    }

}