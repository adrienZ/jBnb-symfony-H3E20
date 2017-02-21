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
        $erros = [];

        // Get entity manager && create the SQL query
        $repository = $this->getDoctrine()->getRepository('AppBundle:Rooms');

        // createQueryBuilder() automatically selects FROM AppBundle:Rooms
        // and aliases it to "r"
        $query = $repository->createQueryBuilder('r');

        // filters send in url as stringiyfied object
        $filters = (isset($_GET["filters"])) ? $_GET['filters'] : "{}";
        $filters = (array) json_decode($filters);

        // FILTER BY PRICE
        if( isset($filters['price'])){

            $price = $filters['price'];

            // check that there is to arguments
            if(count($price) !== 2 ) {
                $erros["priceMissingArguments"] = 'The price must be an array of 2 arguments';
                return new Response(json_encode([ "errors" => $erros]));
            }

            // argument 1 is valid
            if (isset($price[0]) && is_integer($price[0]) && $price[0] >= 0){
              $query->where('r.price >= ' . $price[0]);
            }
            else {
                $erros["priceMinim"] = 'The minimum price must be a positive numeric';
                return new Response(json_encode([ "errors" => $erros]));
            }

            // argument 2 is valid
            if (isset($price[1]) && is_integer($price[1])){
                $query->where('r.price <= ' . $price[1]);
            }
            else {
              $erros["priceMinim"] = 'The maximum price must be a positive numeric';
              return new Response(json_encode([ "errors" => $erros]));
            }

            // arguments are logic
            if( $price[0] > $price[1]){
                $erros["priceLogic"] = 'The minimum price must lower than the maximum';
                return new Response(json_encode([ "errors" => $erros]));
            }
        }


        // default limit
        !isset($filters['limit']) && $filters['limit'] = 5;
        $query->setMaxResults( $filters['limit'] );
        // the room has been set visible by the host
        $query->where('r.statut = 1');

        //echo "<pre>"; print_r($filters); echo "</pre>";
        $request =  $query->getQuery()->getResult();

        // no data
        if((count($request) === 0)) {
          $erros["noResult"] = "no results";
          return new Response(json_encode([ "errors" => $erros]));
        }

        // return private data of Rooms Entity
        $rooms = [];
        foreach ($request as $room){
            $rooms[] = [
                "id"=> $room->getId(),
                "title"=> $room->getTitle(),
                "LDK"=> $room->getLDK(),
                "host"=> [
                  "id" => $room->getHost()->getid(),
                  "firstname" => $room->getHost()->getFirstname(),
                  "lasttname" => $room->getHost()->getLastname(),
                ],
                "localisation"=> $room->getLocalisation(),
                "price"=> $room->getPrice(),
                "surface"=> $room->getSurface(),
                "type"=> [
                  "id" => $room->getType()->getid(),
                  "name" => $room->getType()->getName(),
                ],
                "statut"=> $room->getStatut(),
                "currency"=> [
                  "id" => $room->getCurrency()->getid(),
                  "name" => $room->getCurrency()->getName(),
                ]
            ];
        }
        return new Response(json_encode($rooms));

    }

    /**
     * @Route("/{roomId}")
     * @Method({"GET"})
     * @param int
     * @return string
     */
    public function showByIdAction(int $roomId)
    {
        $erros = [];

        // find room by id with the RoomsRepository
        $em = $this->getDoctrine()->getManager();
        $room = $this->getDoctrine()
             ->getRepository('AppBundle:Rooms')
             ->find($roomId);

        // if no rooms
        if(!isset($room)) {
            $erros["noResult"] = "no result found for id : " . $roomId;

            return new Response(json_encode([ "errors" => $erros]));
        }


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
