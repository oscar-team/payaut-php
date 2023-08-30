<?php

namespace OscarTeam\Payaut\Requests\Webhooks;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class ListWebhookConfigurations extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/v2/notification";
    }
}