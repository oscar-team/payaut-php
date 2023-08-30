<?php

namespace OscarTeam\Payaut\Requests\Webhooks;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

class UpdateWebhookConfiguration extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;

    /**
     * @param array{url: string, isActivated: ?boolean, type: string<'WEBHOOK_KYC_UPDATE'|'WEBHOOK_PAYOUT_UPDATE'>} $requestData
     */
    public function __construct(protected string $configurationId, protected array $requestData)
    {
    }

    public function resolveEndpoint(): string
    {
        return "/v2/notification/{$this->configurationId}";
    }

    public function defaultBody(): array
    {
        return $this->requestData;
    }
}