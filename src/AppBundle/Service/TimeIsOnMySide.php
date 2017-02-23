<?php
namespace AppBundle\Services;
use Symfony\Component\Validator\Constraints\DateTime;

class TimeIsOnMySide
{
    public function getAge(\DateTime $dateTime)
    {
        $interval = $dateTime->diff(new \DateTime('now'));
        return $interval->y;
    }
}
