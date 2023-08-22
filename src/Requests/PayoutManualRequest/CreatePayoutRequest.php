<?php

namespace OscarTeam\Payaut\Requests\PayoutManualRequest;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

class CreatePayoutRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(protected array $requestData)
    {
    }

    public function resolveEndpoint(): string
    {
        return "/v2/fund/payout-requests";
    }

    protected function defaultBody(): array
    {
        return $this->requestData;
    }
}