<?php

namespace AppBundle\Service;

use AppBundle\Entity\Hotel;
use AppBundle\Repository\ReviewRepository;

/**
 * Class HotelReviewService
 */
class HotelRatingService
{
    /**
     * @var ReviewRepository
     */
    private $reviewRepository;
    /**
     * @var RatingFormatterService
     */
    private $formatterService;

    /**
     * WidgetContentService constructor.
     *
     * @param ReviewRepository $reviewRepository
     */
    public function __construct(ReviewRepository $reviewRepository, RatingFormatterService $formatterService)
    {
        $this->reviewRepository = $reviewRepository;
        $this->formatterService = $formatterService;
    }

    /**
     * @param Hotel $hotel
     *
     * @return string
     */
    public function getHotelRating(Hotel $hotel): string
    {
        $averageRating = $this->reviewRepository->getLastYearAverageHotelRating($hotel);

        return $this->formatterService->formatRating($averageRating);
    }
}
