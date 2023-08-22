<?php

namespace OscarTeam\Payaut\Requests\CancelSplit;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

class CancelSplit extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(protected string $code)
    {
    }

    public function resolveEndpoint(): string
    {
        return "/v2/fund/cancel/split/{$this->code}";
    }
}