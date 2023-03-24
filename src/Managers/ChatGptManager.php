<?php
namespace Devsfort\ChatGpt\Managers;
use Devsfort\ChatGpt\Managers\BaseManager;
use Devsfort\ChatGpt\Models\GptLog;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ChatGptManager extends BaseManager {
    
    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => config('chat-gpt.base_uri','https://api.chatgpt.com/') ,
            'headers' => [
                'Authorization' => 'Bearer ' . config('chat-gpt.api_key','')
            ]
        ]);
    }


    public static function getResults(Request $request)
    {
        $response = $this->client->request('POST', 'conversation/', [
            'form_params' => [
                'message' => $request->message
            ]
        ]);

        $response = json_decode($response->getBody(), true);
        GptLog::create([
            'request' => json_encode($request->all()),
            'response' => json_encode($response),
            'ip' => BaseManager::getUserIp()
        ]);
        return $response['response'];
    }
    

}