<?php

namespace OscarTeam\Payaut\Requests\PayoutConfig;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

class UpdateAccountHolderConfiguration extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PATCH;

    public function __construct(protected string $virtualAccountCode, protected array $requestData)
    {
    }

    public function resolveEndpoint(): string
    {
        return "/v2/fund/payout-config/account/{$this->virtualAccountCode}";
    }

    protected function defaultBody(): array
    {
        return $this->requestData;
    }
}