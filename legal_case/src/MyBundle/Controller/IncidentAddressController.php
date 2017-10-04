<?php

namespace MyBundle\Controller;

use MyBundle\Entity\IncidentAddress;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Incidentaddress controller.
 *
 * @Route("incidentaddress")
 */
class IncidentAddressController extends Controller
{
    /**
     * Lists all incidentAddress entities.
     *
     * @Route("/", name="incidentaddress_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $incidentAddresses = $em->getRepository('MyBundle:IncidentAddress')->findAll();

        return $this->render('incidentaddress/index.html.twig', array(
            'incidentAddresses' => $incidentAddresses,
        ));
    }

    /**
     * Creates a new incidentAddress entity.
     *
     * @Route("/new", name="incidentaddress_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $incidentAddress = new Incidentaddress();
        $form = $this->createForm('MyBundle\Form\IncidentAddressType', $incidentAddress);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($incidentAddress);
            $em->flush();

            return $this->redirectToRoute('incidentaddress_show', array('id' => $incidentAddress->getId()));
        }

        return $this->render('incidentaddress/new.html.twig', array(
            'incidentAddress' => $incidentAddress,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a incidentAddress entity.
     *
     * @Route("/{id}", name="incidentaddress_show")
     * @Method("GET")
     */
    public function showAction(IncidentAddress $incidentAddress)
    {
        $deleteForm = $this->createDeleteForm($incidentAddress);

        return $this->render('incidentaddress/show.html.twig', array(
            'incidentAddress' => $incidentAddress,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing incidentAddress entity.
     *
     * @Route("/{id}/edit", name="incidentaddress_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, IncidentAddress $incidentAddress)
    {
        $deleteForm = $this->createDeleteForm($incidentAddress);
        $editForm = $this->createForm('MyBundle\Form\IncidentAddressType', $incidentAddress);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('incidentaddress_edit', array('id' => $incidentAddress->getId()));
        }

        return $this->render('incidentaddress/edit.html.twig', array(
            'incidentAddress' => $incidentAddress,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a incidentAddress entity.
     *
     * @Route("/{id}", name="incidentaddress_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, IncidentAddress $incidentAddress)
    {
        $form = $this->createDeleteForm($incidentAddress);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($incidentAddress);
            $em->flush();
        }

        return $this->redirectToRoute('incidentaddress_index');
    }

    /**
     * Creates a form to delete a incidentAddress entity.
     *
     * @param IncidentAddress $incidentAddress The incidentAddress entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(IncidentAddress $incidentAddress)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('incidentaddress_delete', array('id' => $incidentAddress->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
