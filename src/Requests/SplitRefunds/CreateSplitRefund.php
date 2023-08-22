<?php

namespace OscarTeam\Payaut\Requests\SplitPayments;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

class CreateSplitRefund extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    /**
     * @param array{code: ?string, description: ?string, extProcessedAt: ?string, extRef: string, items: array<int, array{accountCode: string, amount: int, code: ?string, description: ?string, extRef: string, originalExtRef: ?string, items: ?array<int, array{accountCode: ?string, amount: int, code: ?string, description: ?string, extRef: string, originalExtRef: ?string, label: ?string, type: string}>, label: ?string, type: string}>, pspMutationExtRef: string, totalAmount: ?int} $requestData
     */
    public function __construct(protected array $requestData)
    {
    }

    public function resolveEndpoint(): string
    {
        return "/v1/fund/split-refunds";
    }

    public function defaultBody(): array
    {
        return $this->requestData;
    }
}