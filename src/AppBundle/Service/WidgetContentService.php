<?php

namespace AppBundle\Service;

use AppBundle\DTO\Content;
use AppBundle\Repository\HotelRepository;

/**
 * Class WidgetContentService
 */
class WidgetContentService
{
    /**
     * @var HotelRepository
     */
    private $hotelRepository;
    /**
     * @var HotelRatingService
     */
    private $hotelRatingService;

    public function __construct(HotelRepository $hotelRepository, HotelRatingService $hotelRatingService)
    {
        $this->hotelRepository = $hotelRepository;
        $this->hotelRatingService = $hotelRatingService;
    }

    /**
     * @param $uuid
     *
     * @return Content
     */
    public function createWidgetContent($uuid)
    {
        $hotel = $this->hotelRepository->findByUuid($uuid);
        if ($hotel === null) {
            return null;
        }

        return WidgetContentFactory::createWidgetContent(
            $hotel->getName(),
            $this->hotelRatingService->getHotelRating($hotel)
        );
    }
}
