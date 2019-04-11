<?php

namespace Grohiro\Laravel\AwsSns;

use Illuminate\Support\ServiceProvider as LaravelServiceProvider;
use Aws\Sns\SnsClient;

class ServiceProvider extends LaravelServiceProvider
{
  public function boot()
  {
    \App::bind(SnsClient::class, function ($app) {
      $config = config('app.aws.sns');
      return new SnsClient($config);
    });
  }
}
