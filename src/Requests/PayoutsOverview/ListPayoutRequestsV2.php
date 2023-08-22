<?php

namespace OscarTeam\Payaut\Requests\PayoutsOverview;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class ListPayoutRequestsV2 extends Request
{
    protected Method $method = Method::GET;

    /**
     * @param array{page: ?int<0,32>, limit: ?int<0,32>, sort: ?string, direction: ?string<'asc'|'desc'>, query: ?string, status: ?string<'PENDING'|'IN_PROGRESS'|'PROCESSED'|'FAILED'>, from: ?string, to: ?string} $queryParams
     */
    public function __construct(protected array $queryParams = [])
    {
    }

    public function resolveEndpoint(): string
    {
        return "/v2/payouts";
    }

    public function defaultQuery(): array
    {
        return $this->queryParams;
    }
}