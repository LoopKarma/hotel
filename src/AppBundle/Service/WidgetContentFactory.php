<?php

namespace AppBundle\Service;

use AppBundle\DTO\Content;

/**
 * Class WidgetContentFactory
 */
class WidgetContentFactory
{
    /**
     * @param string $hotelName
     * @param string $rating
     *
     * @return Content
     */
    public static function createWidgetContent(string $hotelName, string $rating): Content
    {
        return (new Content())
            ->setHotel($hotelName)
            ->setRating($rating)
            ;
    }
}
