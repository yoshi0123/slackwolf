<?php namespace Slackwolf\Game\Command;
/*
use Exception;
use Slack\Channel;
use Slack\ChannelInterface;
use Slackwolf\Game\Formatter\GameStatusFormatter;
use Slackwolf\Game\Game;
*/
/**
 * Defines the WeatherCommand class.
 */
class WeatherCommand extends Command
{

    /**
     * {@inheritdoc}
    */
    public function fire()
    {
        $client = $this->client;

        if ( ! $this->gameManager->hasGame($this->channel)) {
            $client->getChannelGroupOrDMByID($this->channel)
               ->then(function (ChannelInterface $channel) use ($client) {
                   $client->send(":warning: このコマンドはゲームが進行しているチャンネルでのみ利用できます。", $channel);
               });
            return;
        }
        if ($weather != null){

          if($weather == 1){
            $this->gameManager->sendMessageToChannel($this->game, ":rain_cloud: しとしとと雨が降り注ぐ。冷やかな雨はあなたの体までも冷やしていくようだ。" );          
          }

          // Cloudy
          else if($weather == 2){
            $this->gameManager->sendMessageToChannel($this->game, ":cloud: The cloud embrace the sky and cover the sun letting only a few glimmer of light");   
          }

          // Sunny
          else{
            $this->gameManager->sendMessageToChannel($this->game, ":sunny: 暖かな太陽。その目が眩むほどの光に包まれた私は自分がまだ生きているということに心から感謝した。"); 
          }

        }

        else{
          $this->gameManager->sendMessageToChannel($this->game,"ゲーム中ではありません"); 
        }
    }
}
