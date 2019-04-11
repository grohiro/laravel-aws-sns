<?php
namespace Grohiro\Laravel\AwsSns;

use Aws\Sns\SnsClient;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Log;

/**
 * AWS SNS Channel
 */
class AwsSnsChannel
{
  /**
   * @var \Aws\Sns\SnsClient
   */
  protected $client;

  /**
   * @param \Aws\Sns\SnsClient
   */
  public function __construct(SnsClient $client)
  {
    $this->client = $client;
  }

  /**
   * @param \Illuminate\Notifications\Notifiable $notifiable
   * @param \Illuminate\Notifications\Notification $notification
   * @throws \Exception
   */
  public function send($notifiable, Notification $notification)
  {
    $args = [
      "SMSType" => "Transational",
      "Message" => "Hello, world!",
      "PhoneNumber" => $notifiable->getSmsPhoneNumber(),
    ];

    $result = $this->client->publish($args);
    Log::debug($result);
  }
}
