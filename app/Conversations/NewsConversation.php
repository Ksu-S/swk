<?php

namespace App\Conversations;

use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;

class NewsConversation extends Conversation
{
    /**
     * Start the conversation.
     *
     * @return mixed
     */
    public function run()
    {
        $this->worldnews();
    }

    private function worldnews()
    {
        $xml = simplexml_load_file('https://news.google.com/rss/topics/CAAqJggKIiBDQkFTRWdvSUwyMHZNRGx1YlY4U0FtVnVHZ0pWVXlnQVAB?hl=en-US&gl=US&ceid=US%3Aen');
        $i = 0;
         foreach ($xml->channel->item as $item) {
        $i++;
        if($i > 10){
                break;
        }
        $reply .="\xE2\x9E\xA1".$item->title."\nDate: ".$item->pubDate."(<a href='".$item->link."'>Read more</a>)\n\n";
    }
    $this->say(['chat_id' => $chat_id, 'parse_mode' => 'HTML', 'disable_web_page_preview' => true, 'text' => $reply]);
    
    }

}