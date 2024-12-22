<?php

namespace ImageUpload;

use Illuminate\Support\ServiceProvider;

class ImageUploadServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Publish config file
        $this->publishes([
            __DIR__ . '/../config/imageupload.php' => config_path('imageupload.php'),
        ], 'config');

        // Publish views
        $this->loadViewsFrom(__DIR__ . '/views', 'imageupload');

        // Register routes
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
    }

    public function register()
    {
        // Merge config
        $this->mergeConfigFrom(__DIR__ . '/../config/imageupload.php', 'imageupload');
    }
}
