<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Rooms;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Room controller.
 *
 * @Route("me")
 */
class RoomsController extends Controller
{
    /**
     * Lists all room entities.
     *
     * @Route("/", name="rooms_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $rooms = $em->getRepository('AppBundle:Rooms')->findAll();

        return $this->render('rooms/index.html.twig', array(
            'rooms' => $rooms,
        ));
    }

    /**
     * Creates a new room entity.
     *
     * @Route("/new", name="rooms_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $room = new Room();
        $form = $this->createForm('AppBundle\Form\RoomsType', $room);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($room);
            $em->flush($room);

            return $this->redirectToRoute('rooms_show', array('id' => $room->getId()));
        }

        return $this->render('rooms/new.html.twig', array(
            'room' => $room,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a room entity.
     *
     * @Route("/{id}", name="rooms_show")
     * @Method("GET")
     */
    public function showAction(Rooms $room)
    {
        $deleteForm = $this->createDeleteForm($room);

        return $this->render('rooms/show.html.twig', array(
            'room' => $room,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing room entity.
     *
     * @Route("/{id}/edit", name="rooms_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Rooms $room)
    {
        $deleteForm = $this->createDeleteForm($room);
        $editForm = $this->createForm('AppBundle\Form\RoomsType', $room);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('rooms_edit', array('id' => $room->getId()));
        }

        return $this->render('rooms/edit.html.twig', array(
            'room' => $room,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a room entity.
     *
     * @Route("/{id}", name="rooms_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Rooms $room)
    {
        $form = $this->createDeleteForm($room);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($room);
            $em->flush($room);
        }

        return $this->redirectToRoute('rooms_index');
    }

    /**
     * Creates a form to delete a room entity.
     *
     * @param Rooms $room The room entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Rooms $room)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('rooms_delete', array('id' => $room->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
