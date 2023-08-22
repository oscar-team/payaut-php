<?php

namespace OscarTeam\Payaut\Requests\PayoutConfig;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class DeleteAccountHolderConfiguration extends Request
{
    protected Method $method = Method::DELETE;

    public function __construct(protected string $virtualAccountCode)
    {
    }

    public function resolveEndpoint(): string
    {
        return "/v2/fund/payout-config/account/{$this->virtualAccountCode}";
    }
}