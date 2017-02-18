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
     * @Route("/")
     * @Method({"GET"})
     *
     * @return string
     */
    public function showAction()
    {
         // Get entity manager
         $em = $this->getDoctrine()->getManager();

        // if no filters return all
        if(!empty($_GET)) {
          $filters = $_GET['filters'];
          $filters = (array) json_decode($filters);

          $request = $em->getRepository('AppBundle:Rooms')
          ->findBy( $filters)
          ;
        }
        else
          $request = $em->getRepository('AppBundle:Rooms')
          ->findAll()
          ;



        // no data
        if(!isset($request)){
          return new Response(json_encode([
            "empty" => true
          ]));
        }

        // return private data of Rooms Entity
        $rooms = [];
        foreach ($request as $room){
            $rooms[] = [
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
            ];
        }
        return new Response(json_encode($rooms));

    }

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
