<?php

namespace Faden\FadenMessageModule\Facades;

use Illuminate\Support\Facades\Facade;

class FadenMessageModule extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'fadenmessagemodule';
    }
}
