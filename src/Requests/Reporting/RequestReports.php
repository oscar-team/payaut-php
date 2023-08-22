<?php

namespace OscarTeam\Payaut\Requests\Reporting;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

class RequestReports extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    /**
     * @param string<'marketplace-sellers'|'marketplace-payments'|'marketplace-settlement'|'seller-settlement'> $report
     * @param array{account: ?string, from: ?string, to: ?string} $requestData
     */
    public function __construct(protected string $report, protected array $requestData)
    {
    }

    public function resolveEndpoint(): string
    {
        return "/v2/reports/{$this->report}";
    }

    public function defaultBody(): array
    {
        return $this->requestData;
    }
}