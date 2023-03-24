<?php

namespace Devsfort\ChatGpt;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use PhpParser\Node\Scalar\MagicConst\Dir;

class ChatGptServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        app()->bind('ChatGpt', function () {
            return new ChatGpt();
        });

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutes();
        // Publishes
        $this->setPublishes();
    }

    /**
     * Publishing the files that the user may override.
     *
     * @return void
     */
    protected function setPublishes()
    {
        // Config
        $this->publishes([
            __DIR__ . '/config/chat-gpt.php' => config_path('chat-gpt.php')
        ], 'chatgpt-config');
    }
    /**
     * Group the routes and set up configurations to load them.
     *
     * @return void
     */
    protected function loadRoutes()
    {
        Route::group($this->routesConfigurations(), function () {
            $this->loadRoutesFrom(__DIR__ . '/routes/api.php');
        });
    }

    /**
     * Routes configurations.
     *
     * @return array
     */
    private function routesConfigurations()
    {
        return [
            'prefix' => config('chat-gpt.path'),
            'namespace' =>  config('chat-gpt.namespace'),
            'middleware' => ['api'],
        ];
    }
}