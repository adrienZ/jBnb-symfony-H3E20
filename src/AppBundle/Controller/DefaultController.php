<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Service\CurlRequest;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
      $em = $this->getDoctrine()->getManager();
      $recentRooms = $em->getRepository('AppBundle:Rooms')
      // Get the 3 last results
      ->findBy( [], [], 5);

      // get all the offers on the website
      $roomsCount = $em
          ->getRepository('AppBundle:Rooms')
          ->createQueryBuilder('AppBundle:Rooms')
          ->select('COUNT(AppBundle:Rooms)')
          ->getQuery()
          ->getSingleScalarResult();


        // replace this example code with whatever you need
        return $this->render('default/home.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
            'recentRooms' => $recentRooms,
            'roomsCount' => $roomsCount,
        ]);
    }

    /**
     * @Route("/room/{roomId}", name="room_page_product")
     */
    public function showRoomPageAction(string $roomId)
    {
      $em = $this->getDoctrine()->getManager();
      $curlRequest = $this->get('app.service.curl_request');

      dump( $curlRequest);
      die();
    }
}
