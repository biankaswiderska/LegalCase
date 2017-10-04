<?php

namespace MyBundle\Controller;

use MyBundle\Entity\InvestigationStatus;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Investigationstatus controller.
 *
 * @Route("investigationstatus")
 */
class InvestigationStatusController extends Controller
{
    /**
     * Lists all investigationStatus entities.
     *
     * @Route("/", name="investigationstatus_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $investigationStatuses = $em->getRepository('MyBundle:InvestigationStatus')->findAll();

        return $this->render('investigationstatus/index.html.twig', array(
            'investigationStatuses' => $investigationStatuses,
        ));
    }

    /**
     * Creates a new investigationStatus entity.
     *
     * @Route("/new", name="investigationstatus_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $investigationStatus = new Investigationstatus();
        $form = $this->createForm('MyBundle\Form\InvestigationStatusType', $investigationStatus);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($investigationStatus);
            $em->flush();

            return $this->redirectToRoute('investigationstatus_show', array('id' => $investigationStatus->getId()));
        }

        return $this->render('investigationstatus/new.html.twig', array(
            'investigationStatus' => $investigationStatus,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a investigationStatus entity.
     *
     * @Route("/{id}", name="investigationstatus_show")
     * @Method("GET")
     */
    public function showAction(InvestigationStatus $investigationStatus)
    {
        $deleteForm = $this->createDeleteForm($investigationStatus);

        return $this->render('investigationstatus/show.html.twig', array(
            'investigationStatus' => $investigationStatus,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing investigationStatus entity.
     *
     * @Route("/{id}/edit", name="investigationstatus_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, InvestigationStatus $investigationStatus)
    {
        $deleteForm = $this->createDeleteForm($investigationStatus);
        $editForm = $this->createForm('MyBundle\Form\InvestigationStatusType', $investigationStatus);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('investigationstatus_edit', array('id' => $investigationStatus->getId()));
        }

        return $this->render('investigationstatus/edit.html.twig', array(
            'investigationStatus' => $investigationStatus,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a investigationStatus entity.
     *
     * @Route("/{id}", name="investigationstatus_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, InvestigationStatus $investigationStatus)
    {
        $form = $this->createDeleteForm($investigationStatus);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($investigationStatus);
            $em->flush();
        }

        return $this->redirectToRoute('investigationstatus_index');
    }

    /**
     * Creates a form to delete a investigationStatus entity.
     *
     * @param InvestigationStatus $investigationStatus The investigationStatus entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(InvestigationStatus $investigationStatus)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('investigationstatus_delete', array('id' => $investigationStatus->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
