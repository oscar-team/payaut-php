<?php

namespace OscarTeam\Payaut\Resources;

use Saloon\Http\BaseResource;
use OscarTeam\Payaut\Requests\Reporting\ListReports;
use OscarTeam\Payaut\Requests\Reporting\RequestReports;
use Saloon\Http\Response;

class Reporting extends BaseResource
{
    public function getReport(string $report, array $queryParams = []): Response
    {
        return $this->connector->send(new ListReports($report, $queryParams));
    }

    public function getReportForSpecificAccount(string $report, array $requestData): Response
    {
        return $this->connector->send(new RequestReports($report, $requestData));
    }
}