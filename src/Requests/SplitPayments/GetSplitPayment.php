<?php

namespace OscarTeam\Payaut\Requests\SplitPayments;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetSplitPayment extends Request
{
    protected Method $method = Method::GET;

    public function __construct(protected string $code)
    {
    }

    public function resolveEndpoint(): string
    {
        return "/v1/fund/split-payments/{$this->code}";
    }
}