<?php
namespace OscarTeam\Payaut\Requests\Accounts;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetAccount extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected readonly string $accountHolderCode,
        protected readonly string $virtualAccountCode,
        protected array $queryParams = []
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/v1/accountholders/{$this->accountHolderCode}/accounts/{$this->virtualAccountCode}";
    }

    public function defaultQuery(): array
    {
        return $this->queryParams;
    }
}