<?php

namespace App\Helpers;

use App\Models\ChatMessage;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;

class Message
{
    public  static function send($to, $message){
        $client = new Client();
        
        $form_params = [
            'api_token' => '7afe0a191f7fec047682a6c972f6fbaace31522621',
            'api_secret' => 'shafiqahmed91',
            'to' => $to,
            'from' => 'SMS Alert',
            'message' => $message
        ];

        $url = 'https://lifetimesms.com/plain';

        $result = $client->get($url, ['query' => $form_params]);
        $data = $result->getBody();
        echo  $data;

    }
    public static function unreadMessages()
    {
        $messages = ChatMessage::where('chat_messages.user_id','!=',Auth::user()->id)
        ->where('chat_messages.status','Unread')
        ->select('chat_messages.*')
        ->join('chats', 'chat_messages.chat_id', 'chats.id')
        ->whereNotNull('chats.other_user_id')
        ->where('chats.user_id',Auth::user()->id)
        ->orWhere('chats.other_user_id',Auth::user()->id)
        ->get();
        return $messages;
    }

}
