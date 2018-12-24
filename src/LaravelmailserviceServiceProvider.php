<?php 
namespace Megaads\Laravelmailservice;

use Illuminate\Support\ServiceProvider;
use Megaads\Laravelmailservice\Services\EmailService;

class LaravelmailserviceServiceProvider extends ServiceProvider 
{
    public function boot() {}
    
    public function register() {
        $this->app->singleton('sendEmailService', function() {
            return new EmailService();
        });
    }
}