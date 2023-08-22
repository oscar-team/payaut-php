<?php

namespace OscarTeam\Payaut\Requests\Balance;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetBalance extends Request
{
    protected Method $method = Method::GET;

    public function __construct(protected string $code)
    {
    }

    public function resolveEndpoint(): string
    {
        return "/v1/fund/balance/{$this->code}";
    }
}