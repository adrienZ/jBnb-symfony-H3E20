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
     * @Method({"GET"})
     *
     * @return string
     */
    public function showByIdAction(Rooms $room)
    {
        return new Response(json_encode([
            "id"=> $room->getId(),
            "title"=> $room->getTitle(),
            "LDK"=> $room->getLDK(),
            "host_id"=> $room->getHostId(),
            "localisation"=> $room->getLocalisation(),
            "price"=> $room->getPrice(),
            "surface"=> $room->getSurface(),
            "type_id"=> $room->getTypeId(),
            "statut"=> $room->getStatut(),
            "devise_id"=> $room->getDeviseId(),
        ]));
    }
}
