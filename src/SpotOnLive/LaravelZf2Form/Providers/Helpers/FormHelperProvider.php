<?php

/**
 * Zend Framework 2.0 forms for Laravel 5.1
 *
 * @license MIT
 * @package SpotOnLive\LaravelZf2Form
 */

namespace SpotOnLive\Navigation\Providers\Helpers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\Application;
use SpotOnLive\LaravelZf2Form\Helpers\FormHelper;

class FormHelperProvider extends ServiceProvider
{
    /**
     * Register form helper
     */
    public function register()
    {
        $this->app->bind('SpotOnLive\LaravelZf2Form\Helpers\FormHelper', function (Application $application) {
            return new FormHelper();
        });
    }
}
