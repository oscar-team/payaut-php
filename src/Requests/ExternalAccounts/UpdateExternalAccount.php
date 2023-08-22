<?php
namespace OscarTeam\Payaut\Requests\AccountHolders;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

class UpdateExternalAccount extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PATCH;

    public function __construct(
        protected readonly string $accountHolderCode,
        protected readonly string $externalAccountCode,
        protected array $requestBody
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/v1/accountholders/{$this->accountHolderCode}/externalaccounts/{$this->externalAccountCode}";
    }

    protected function defaultBody(): array
    {
        return $this->requestBody;
    }
}