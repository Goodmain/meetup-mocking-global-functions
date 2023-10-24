<?php

namespace App\Tests;

use App\Services\SearchService;
use App\Services\StatisticsService;
use phpmock\phpunit\PHPMock;

class NamespaceTest extends TestCase
{
    use PHPMock;

    public function testTopResult()
    {
        $mock = $this->getFunctionMock('App\Services', 'max');
        $mock->expects($this->once())->willReturn(2);

        $values = [3, 2, 6, 0, 9, 3, 1];

        $searchService = new SearchService();

        $this->assertEquals(2, $searchService->getTopResult($values));

        $statisticsService = new StatisticsService();

        $this->assertEquals(9, $statisticsService->getTopResult($values));
    }
}
