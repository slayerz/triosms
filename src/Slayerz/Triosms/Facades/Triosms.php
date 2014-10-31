<?php namespace Slayerz\Triosms\Facades;

use Illuminate\Support\Facades\Facade;

class Triosms extends Facade {

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() {
        return 'triosms';
    }

}