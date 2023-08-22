<?php

namespace OscarTeam\Payaut\Requests\PayoutConfig;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

class UpdateDefaultPayoutConfiguration extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PATCH;

    public function __construct(protected array $requestData)
    {
    }

    public function resolveEndpoint(): string
    {
        return '/v2/fund/payout-config/default';
    }

    protected function defaultBody(): array
    {
        return $this->requestData;
    }
}