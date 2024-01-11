<?php

namespace OscarTeam\Payaut\Requests\SplitRefunds;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetSplitRefund extends Request
{
    protected Method $method = Method::GET;

    public function __construct(protected string $code)
    {
    }

    public function resolveEndpoint(): string
    {
        return "/v1/fund/split-refunds/{$this->code}";
    }
}