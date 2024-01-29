<?php

namespace OscarTeam\Payaut\Resources;

use OscarTeam\Payaut\BaseResource;
use OscarTeam\Payaut\Requests\CancelSplit\CancelSplit;
use OscarTeam\Payaut\Requests\SplitPayments\CreateSplitPayment;
use OscarTeam\Payaut\Requests\SplitPayments\GetSplitPayment;
use OscarTeam\Payaut\Requests\SplitPayments\ListSplitPayments;
use Saloon\Http\Response;

class SplitPayments extends BaseResource
{
    public function list(array $queryParams = []): Response
    {
        return $this->connector->send(new ListSplitPayments($queryParams));
    }

    public function create(array $requestData): Response
    {
        return $this->connector->send(new CreateSplitPayment($requestData));
    }

    public function get(string $code): Response
    {
        return $this->connector->send(new GetSplitPayment($code));
    }

    public function refunds(): SplitRefunds
    {
        return new SplitRefunds($this->connector);
    }

    public function cancel(string $code): Response
    {
        return $this->connector->send(new CancelSplit($code));
    }
}