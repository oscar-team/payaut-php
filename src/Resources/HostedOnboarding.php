<?php

namespace OscarTeam\Payaut\Resources;

use OscarTeam\Payaut\BaseResource;
use OscarTeam\Payaut\Requests\HostedOnboarding\GenerateHostedOnboardingUrl;
use Saloon\Contracts\Response;

class HostedOnboarding extends BaseResource
{
    public function generateUrl(string $accountHolderCode, array $queryParams = []): Response
    {
        return $this->connector->send(new GenerateHostedOnboardingUrl($accountHolderCode, $queryParams));
    }
}