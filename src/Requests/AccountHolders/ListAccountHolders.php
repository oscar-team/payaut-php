<?php
namespace OscarTeam\Payaut\Requests\AccountHolders;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class ListAccountHolders extends Request
{
    protected Method $method = Method::GET;

    public function __construct(protected array $queryParams = [])
    {
    }

    public function resolveEndpoint(): string
    {
        return '/v1/accountholders';
    }

    protected function defaultQuery(): array
    {
        return $this->queryParams;
    }
}