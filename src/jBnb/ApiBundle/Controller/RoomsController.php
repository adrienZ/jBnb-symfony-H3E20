<?php

namespace jBnb\ApiBundle\Controller;

use AppBundle\Entity\Rooms;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Response;
/**
 * @Route("/rooms")
 */
class RoomsController extends Controller
{
    /**
     * @Route("/{id}")
     * @Method({"GET","HEAD"})
     */
    public function showByIdAction(Rooms $rooms)
    {
        return new Response(json_encode($rooms));
    }
}
