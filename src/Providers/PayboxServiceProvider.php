<?php

namespace JulienMru\PayboxGateway\Providers;

use Illuminate\Support\ServiceProvider;

class PayboxServiceProvider extends ServiceProvider
{
    /**
     * Register service provider.
     */
    public function register()
    {
        // merge module config if it's not published or some entries are missing 
        $this->mergeConfigFrom($this->configFile(), 'paybox');

        // publish configuration file
        $this->publishes([
            $this->configFile() => $this->app['path.config'] . DIRECTORY_SEPARATOR . 'paybox.php',
        ], 'config');

        $this->publishes([
            realpath(__DIR__ . '/../../views') => $this->app['path.base'] . DIRECTORY_SEPARATOR
                . 'resources' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . 'paybox',
        ], 'views');
    }

    /**
     * Get module config file.
     *
     * @return string
     */
    protected function configFile()
    {
        return realpath(__DIR__ . '/../../config/paybox.php');
    }
}
