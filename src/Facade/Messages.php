<?php 

namespace Eelcol\LaravelHelpers\Facade;

use Illuminate\Support\Facades\Facade;

class Messages extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'Messages'; }
}