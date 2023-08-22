<?php

namespace OscarTeam\Payaut\Requests\Reporting;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class ListReports extends Request
{
    protected Method $method = Method::GET;

    /**
     * @param string<'marketplace-sellers'|'marketplace-payments'|'marketplace-settlement'|'seller-settlement'> $report
     * @param array{page: ?int, limit: ?int, account: ?string, from: ?string, to: ?string} $queryParams
     */
    public function __construct(protected string $report, protected array $queryParams = [])
    {
    }

    public function resolveEndpoint(): string
    {
        return "/v2/reports/{$this->report}";
    }

    public function defaultQuery(): array
    {
        return $this->queryParams;
    }
}