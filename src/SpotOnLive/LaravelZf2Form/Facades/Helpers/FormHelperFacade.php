<?php

namespace SpotOnLive\LaravelZf2Form\Facades\Helpers;

use Illuminate\Support\Facades\Facade;

class FormHelperFacade extends Facade
{
    /**
     * Name of the binding container
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'SpotOnLive\LaravelZf2Form\Helpers\FormHelper';
    }
}
