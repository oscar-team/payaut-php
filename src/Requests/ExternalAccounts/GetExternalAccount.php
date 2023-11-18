<?php
namespace OscarTeam\Payaut\Requests\ExternalAccounts;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetExternalAccount extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected readonly string $accountHolderCode,
        protected readonly string $externalAccountCode,
        protected array $queryParams = []
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/v1/accountholders/{$this->accountHolderCode}/externalaccounts/{$this->externalAccountCode}";
    }

    protected function defaultQuery(): array
    {
        return $this->queryParams;
    }
}