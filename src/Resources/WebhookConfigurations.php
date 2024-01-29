<?php

namespace OscarTeam\Payaut\Resources;

use OscarTeam\Payaut\BaseResource;
use OscarTeam\Payaut\Requests\Webhooks\CreateWebhookConfiguration;
use OscarTeam\Payaut\Requests\Webhooks\GetWebhookConfiguration;
use OscarTeam\Payaut\Requests\Webhooks\UpdateWebhookConfiguration;
use OscarTeam\Payaut\Requests\Webhooks\ListWebhookConfigurations;
use Saloon\Http\Response;

class WebhookConfigurations extends BaseResource
{
    public function create(array $requestData): Response
    {
        return $this->connector->send(new CreateWebhookConfiguration($requestData));
    }

    public function update(string $configurationId, array $requestData): Response
    {
        return $this->connector->send(new UpdateWebhookConfiguration($configurationId, $requestData));
    }

    public function get(string $configurationId): Response
    {
        return $this->connector->send(new GetWebhookConfiguration($configurationId));
    }

    public function list(): Response
    {
        return $this->connector->send(new ListWebhookConfigurations());
    }
}