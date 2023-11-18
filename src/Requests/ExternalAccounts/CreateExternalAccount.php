<?php
namespace OscarTeam\Payaut\Requests\ExternalAccounts;

use Saloon\Contracts\Body\BodyRepository;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

class CreateExternalAccount extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(protected string $accountHolderCode, protected array $requestData)
    {
    }

    public function resolveEndpoint(): string
    {
        return "/v1/accountholders/{$this->accountHolderCode}/externalaccounts";
    }

    protected function defaultBody(): array
    {
        return $this->requestData;
    }
}