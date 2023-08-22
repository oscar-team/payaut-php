<?php
namespace OscarTeam\Payaut\Requests\AccountHolders;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class DeleteAccountHolder extends Request
{
    protected Method $method = Method::DELETE;

    public function __construct(protected readonly string $accountHolderCode)
    {
    }

    public function resolveEndpoint(): string
    {
        return '/v1/accountholders/' . $this->accountHolderCode;
    }
}