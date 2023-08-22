<?php

namespace OscarTeam\Payaut\Requests\Balance;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class ListDivisionInformation extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/v2/merchants/divisionInfos";
    }
}