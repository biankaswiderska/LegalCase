<?php

namespace MyBundle\Controller;

use MyBundle\Entity\CourtOrder;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Courtorder controller.
 *
 * @Route("courtorder")
 */
class CourtOrderController extends Controller
{
    /**
     * Lists all courtOrder entities.
     *
     * @Route("/", name="courtorder_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $courtOrders = $em->getRepository('MyBundle:CourtOrder')->findAll();

        return $this->render('courtorder/index.html.twig', array(
            'courtOrders' => $courtOrders,
        ));
    }

    /**
     * Creates a new courtOrder entity.
     *
     * @Route("/new", name="courtorder_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $courtOrder = new Courtorder();
        $form = $this->createForm('MyBundle\Form\CourtOrderType', $courtOrder);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($courtOrder);
            $em->flush();

            return $this->redirectToRoute('courtorder_show', array('id' => $courtOrder->getId()));
        }

        return $this->render('courtorder/new.html.twig', array(
            'courtOrder' => $courtOrder,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a courtOrder entity.
     *
     * @Route("/{id}", name="courtorder_show")
     * @Method("GET")
     */
    public function showAction(CourtOrder $courtOrder)
    {
        $deleteForm = $this->createDeleteForm($courtOrder);

        return $this->render('courtorder/show.html.twig', array(
            'courtOrder' => $courtOrder,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing courtOrder entity.
     *
     * @Route("/{id}/edit", name="courtorder_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, CourtOrder $courtOrder)
    {
        $deleteForm = $this->createDeleteForm($courtOrder);
        $editForm = $this->createForm('MyBundle\Form\CourtOrderType', $courtOrder);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('courtorder_edit', array('id' => $courtOrder->getId()));
        }

        return $this->render('courtorder/edit.html.twig', array(
            'courtOrder' => $courtOrder,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a courtOrder entity.
     *
     * @Route("/{id}", name="courtorder_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, CourtOrder $courtOrder)
    {
        $form = $this->createDeleteForm($courtOrder);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($courtOrder);
            $em->flush();
        }

        return $this->redirectToRoute('courtorder_index');
    }

    /**
     * Creates a form to delete a courtOrder entity.
     *
     * @param CourtOrder $courtOrder The courtOrder entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(CourtOrder $courtOrder)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('courtorder_delete', array('id' => $courtOrder->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
