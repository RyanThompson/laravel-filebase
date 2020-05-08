<?php

namespace RyanThompson\Filebase;

use Illuminate\Support\ServiceProvider;

/**
 * FileBaseServiceProvider class.
 *
 * @link   http://pyrocms.com/
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class FileBaseServiceProvider extends ServiceProvider
{

    /**
     * Register the service provider.
     */
    public function register()
    {

        // Add database driver.
        $this->app->resolving('db', function ($db) {
            $db->extend('filebase', function ($config, $name) {
                return new FilebaseConnection($config, $name);
            });
        });

        // Add connector for queue support.
        // $this->app->resolving('queue', function ($queue) {
        //     $queue->addConnector('filebase', function () {
        //         return new FilebaseConnector($this->app['db']);
        //     });
        // });
    }
}
