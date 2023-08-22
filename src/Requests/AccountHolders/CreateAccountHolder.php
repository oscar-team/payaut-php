<?php
namespace OscarTeam\Payaut\Requests\AccountHolders;

use Saloon\Contracts\Body\BodyRepository;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

class CreateAccountHolder extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(protected array $requestData)
    {
    }

    public function resolveEndpoint(): string
    {
        return '/v1/accountholders';
    }

    protected function defaultBody(): array
    {
        return $this->requestData;
    }
}