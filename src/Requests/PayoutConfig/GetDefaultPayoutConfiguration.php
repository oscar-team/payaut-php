<?php

namespace OscarTeam\Payaut\Requests\PayoutConfig;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetDefaultPayoutConfiguration extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/v2/fund/payout-config/default';
    }
}