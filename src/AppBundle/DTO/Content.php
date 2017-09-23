<?php

namespace AppBundle\DTO;

use JMS\Serializer\Annotation as JMS;

/**
 * Class Content
 */
class Content
{
    /**
     * @var string
     * @JMS\Type("string")
     */
    private $hotel;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $rating;

    /**
     * @return string
     */
    public function getHotel()
    {
        return $this->hotel;
    }

    /**
     * @param string $hotel
     *
     * @return $this
     */
    public function setHotel($hotel)
    {
        $this->hotel = $hotel;

        return $this;
    }

    /**
     * @return string
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * @param string $rating
     *
     * @return $this
     */
    public function setRating($rating)
    {
        $this->rating = $rating;

        return $this;
    }

}
