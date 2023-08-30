<?php

namespace OscarTeam\Payaut\Requests\Webhooks;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetWebhookConfiguration extends Request
{
    protected Method $method = Method::GET;

    public function __construct(protected string $configurationId)
    {
    }

    public function resolveEndpoint(): string
    {
        return "/v2/notification/{$this->configurationId}";
    }
}