<?php
namespace OscarTeam\Payaut\Requests\AccountHolders;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class SelectActiveExternalAccount extends Request
{
    protected Method $method = Method::PATCH;

    public function __construct(
        protected readonly string $accountHolderCode,
        protected readonly string $externalAccountCode
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/v1/accountholders/{$this->accountHolderCode}/externalaccounts/{$this->externalAccountCode}/select";
    }
}