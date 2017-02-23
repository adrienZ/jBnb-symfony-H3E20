<?php
namespace AppBundle\Services;
use Symfony\Component\Validator\Constraints\DateTime;

class CurlReuest
{
    public function get(string $path)
    {
      return $path;
    }
}
