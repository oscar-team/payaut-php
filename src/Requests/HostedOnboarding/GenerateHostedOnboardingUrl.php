<?php

namespace OscarTeam\Payaut\Requests\HostedOnboarding;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GenerateHostedOnboardingUrl extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected readonly string $accountHolderCode,
        protected array $queryParams = []
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/v2/onboarding/accountholder/{$this->accountHolderCode}/generate-url";
    }

    public function defaultQuery(): array
    {
        return $this->queryParams;
    }
}