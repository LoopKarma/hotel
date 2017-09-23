<?php

namespace AppBundle\Service;

/**
 * Class ReviewFormatterService
 */
class RatingFormatterService
{
    /**
     * @param float $rating
     *
     * @return string
     */
    public function formatRating(float $rating): string
    {
        return sprintf("%d%%", round($rating));
    }
}
