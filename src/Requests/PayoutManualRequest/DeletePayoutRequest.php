<?php

namespace OscarTeam\Payaut\Requests\PayoutManualRequest;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

class DeletePayoutRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::DELETE;

    public function __construct(protected string $code)
    {
    }

    public function resolveEndpoint(): string
    {
        return "/v2/fund/payout-requests/{$this->code}";
    }
}