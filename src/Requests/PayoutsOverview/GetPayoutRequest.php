<?php

namespace OscarTeam\Payaut\Requests\PayoutsOverview;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetPayoutRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(protected string $code)
    {
    }

    public function resolveEndpoint(): string
    {
        return "/v1/fund/payout-requests/{$this->code}";
    }
}