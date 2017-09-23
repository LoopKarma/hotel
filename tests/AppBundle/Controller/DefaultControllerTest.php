<?php

namespace Tests\AppBundle\Controller;

use AppBundle\Entity\Hotel;
use AppBundle\Repository\HotelRepository;
use AppBundle\Repository\ReviewRepository;
use Prophecy\Prophecy\ObjectProphecy;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Class DefaultControllerTest
 */
class DefaultControllerTest extends WebTestCase
{
    /**
     * @test
     */
    public function widgetWrongUuid()
    {
        $client = static::createClient();

        $client->request('GET', '/widget/wrongname.js');

        $this->assertEquals(404, $client->getResponse()->getStatusCode());
    }

    /**
     * @test
     */
    public function widgetCorrectUuid()
    {
        $hotel = (new Hotel())->setId(1)->setUuid(1234)->setName('California');
        $hotelRepoMock = $this->getHotelRepoMock();
        $hotelRepoMock->findByUuid($hotel->getUuid())->willReturn($hotel);

        $reviewRepoMock = $this->getReviewRepoMock();
        $reviewRepoMock->getLastYearAverageHotelRating($hotel)->willReturn(50);

        $client = static::createClient();
        $client->getContainer()->set('hotel.repository', $hotelRepoMock->reveal());
        $client->getContainer()->set('review.repository', $reviewRepoMock->reveal());

        $crawler = $client->request('GET', '/widget/1234.js');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('California', $crawler->text());
        $this->assertContains('rating', $crawler->text());
    }

    /**
     * @return ObjectProphecy|HotelRepository
     */
    private function getHotelRepoMock()
    {
        $mock = $this->prophesize(HotelRepository::class);

        return $mock;
    }

    /**
     * @return ObjectProphecy|ReviewRepository
     */
    private function getReviewRepoMock()
    {
        $mock = $this->prophesize(ReviewRepository::class);

        return $mock;
    }
}
