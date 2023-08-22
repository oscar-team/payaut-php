<?php

namespace OscarTeam\Payaut\Requests\Transactions;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetTransactions extends Request
{
    protected Method $method = Method::GET;

    public function __construct(protected array $queryParams = [])
    {
    }

    public function resolveEndpoint(): string
    {
        return "/v2/transactions";
    }

    public function defaultQuery(): array
    {
        return $this->queryParams;
    }
}