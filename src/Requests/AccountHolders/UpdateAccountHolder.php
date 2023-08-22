<?php
namespace OscarTeam\Payaut\Requests\AccountHolders;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

class UpdateAccountHolder extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PATCH;

    public function __construct(protected readonly string $accountHolderCode, protected array $requestBody)
    {
    }

    public function resolveEndpoint(): string
    {
        return '/v1/accountholders/' . $this->accountHolderCode;
    }

    protected function defaultBody(): array
    {
        return $this->requestBody;
    }
}