<?php

namespace OscarTeam\Payaut;

use Saloon\Http\Connector;

class BaseResource
{
    public function __construct(protected Connector $connector)
    {
    }
}