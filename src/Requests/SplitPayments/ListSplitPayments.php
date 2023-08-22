<?php

namespace OscarTeam\Payaut\Requests\SplitPayments;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class ListSplitPayments extends Request
{
    protected Method $method = Method::GET;

    /**
     * @param array{_asc: ?bool, _from: ?string, _orderBy: ?string, _pageNumber: ?int, _pageSize: ?int, _to: string} $queryParams
     */
    public function __construct(protected array $queryParams = [])
    {
    }

    public function resolveEndpoint(): string
    {
        return "/v1/fund/split-payments";
    }

    public function defaultQuery(): array
    {
        return $this->queryParams;
    }
}