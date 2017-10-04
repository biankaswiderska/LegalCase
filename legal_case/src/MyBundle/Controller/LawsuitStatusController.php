<?php

namespace MyBundle\Controller;

use MyBundle\Entity\LawsuitStatus;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Lawsuitstatus controller.
 *
 * @Route("lawsuitstatus")
 */
class LawsuitStatusController extends Controller
{
    /**
     * Lists all lawsuitStatus entities.
     *
     * @Route("/", name="lawsuitstatus_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $lawsuitStatuses = $em->getRepository('MyBundle:LawsuitStatus')->findAll();

        return $this->render('lawsuitstatus/index.html.twig', array(
            'lawsuitStatuses' => $lawsuitStatuses,
        ));
    }

    /**
     * Creates a new lawsuitStatus entity.
     *
     * @Route("/new", name="lawsuitstatus_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $lawsuitStatus = new Lawsuitstatus();
        $form = $this->createForm('MyBundle\Form\LawsuitStatusType', $lawsuitStatus);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($lawsuitStatus);
            $em->flush();

            return $this->redirectToRoute('lawsuitstatus_show', array('id' => $lawsuitStatus->getId()));
        }

        return $this->render('lawsuitstatus/new.html.twig', array(
            'lawsuitStatus' => $lawsuitStatus,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a lawsuitStatus entity.
     *
     * @Route("/{id}", name="lawsuitstatus_show")
     * @Method("GET")
     */
    public function showAction(LawsuitStatus $lawsuitStatus)
    {
        $deleteForm = $this->createDeleteForm($lawsuitStatus);

        return $this->render('lawsuitstatus/show.html.twig', array(
            'lawsuitStatus' => $lawsuitStatus,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing lawsuitStatus entity.
     *
     * @Route("/{id}/edit", name="lawsuitstatus_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, LawsuitStatus $lawsuitStatus)
    {
        $deleteForm = $this->createDeleteForm($lawsuitStatus);
        $editForm = $this->createForm('MyBundle\Form\LawsuitStatusType', $lawsuitStatus);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('lawsuitstatus_edit', array('id' => $lawsuitStatus->getId()));
        }

        return $this->render('lawsuitstatus/edit.html.twig', array(
            'lawsuitStatus' => $lawsuitStatus,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a lawsuitStatus entity.
     *
     * @Route("/{id}", name="lawsuitstatus_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, LawsuitStatus $lawsuitStatus)
    {
        $form = $this->createDeleteForm($lawsuitStatus);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($lawsuitStatus);
            $em->flush();
        }

        return $this->redirectToRoute('lawsuitstatus_index');
    }

    /**
     * Creates a form to delete a lawsuitStatus entity.
     *
     * @param LawsuitStatus $lawsuitStatus The lawsuitStatus entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(LawsuitStatus $lawsuitStatus)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('lawsuitstatus_delete', array('id' => $lawsuitStatus->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
