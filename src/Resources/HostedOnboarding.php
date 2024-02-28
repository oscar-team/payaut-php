<?php

namespace OscarTeam\Payaut\Resources;

use Saloon\Http\BaseResource;
use OscarTeam\Payaut\Requests\HostedOnboarding\GenerateHostedOnboardingUrl;
use Saloon\Http\Response;

class HostedOnboarding extends BaseResource
{
    public function generateUrl(string $accountHolderCode, array $queryParams = []): Response
    {
        return $this->connector->send(new GenerateHostedOnboardingUrl($accountHolderCode, $queryParams));
    }
}