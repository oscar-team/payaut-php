<?php

namespace OscarTeam\Payaut\Requests\Balance;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

class TransferBalance extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    /**
     * @param array{fromAccountCode: string, toAccountCode: string, amount: int<0,64>, currency: ?string<'EUR'|'USD'|'AUD'|'GBP'|'JPY'|'SGD'|'CAD'|'NZD'>, idempotencyKey: string, type: string<'INVOICE'|'USAGE_FEE'|'CORRECTION'|'CHARGEBACK'|'VAT'|'WALLET'>, description: ?string} $requestData
     */
    public function __construct(protected array $requestData)
    {
    }

    public function resolveEndpoint(): string
    {
        return "/v2/fund/balance/transfer";
    }

    protected function defaultBody(): array
    {
        return $this->requestData;
    }
}