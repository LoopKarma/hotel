<?php

namespace Tests\AppBundle\Service;

use PHPUnit\Framework\TestCase;
use AppBundle\Service\RatingFormatterService;

class RatingFormatterServiceTest extends TestCase
{
    /**
     * @test
     * @dataProvider ratingProvider
     */
    public function formatRating(float $rating, string $expectedResult)
    {
        $service = new RatingFormatterService();
        $this->assertEquals($expectedResult, $service->formatRating($rating));
    }

    /**
     * @return array
     */
    public function ratingProvider(): array
    {
        return [
            [70.6, '71%'],
            [70.4, '70%'],
            [0, '0%'],
        ];
    }
}
