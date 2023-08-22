<?php
namespace OscarTeam\Payaut\Requests\AccountHolders;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetAccountHolder extends Request
{
    protected Method $method = Method::GET;

    public function __construct(protected readonly string $accountHolderCode, protected array $queryParams = [])
    {
    }

    public function resolveEndpoint(): string
    {
        return '/v1/accountholders/' . $this->accountHolderCode;
    }

    protected function defaultQuery(): array
    {
        return $this->queryParams;
    }
}