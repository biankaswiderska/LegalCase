<?php

namespace MyBundle\Controller;

use MyBundle\Entity\LawFirm;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Lawfirm controller.
 *
 * @Route("lawfirm")
 */
class LawFirmController extends Controller
{
    /**
     * Lists all lawFirm entities.
     *
     * @Route("/", name="lawfirm_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $lawFirms = $em->getRepository('MyBundle:LawFirm')->findAll();

        return $this->render('lawfirm/index.html.twig', array(
            'lawFirms' => $lawFirms,
        ));
    }

    /**
     * Creates a new lawFirm entity.
     *
     * @Route("/new", name="lawfirm_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $lawFirm = new Lawfirm();
        $form = $this->createForm('MyBundle\Form\LawFirmType', $lawFirm);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($lawFirm);
            $em->flush();

            return $this->redirectToRoute('lawfirm_show', array('id' => $lawFirm->getId()));
        }

        return $this->render('lawfirm/new.html.twig', array(
            'lawFirm' => $lawFirm,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a lawFirm entity.
     *
     * @Route("/{id}", name="lawfirm_show")
     * @Method("GET")
     */
    public function showAction(LawFirm $lawFirm)
    {
        $deleteForm = $this->createDeleteForm($lawFirm);

        return $this->render('lawfirm/show.html.twig', array(
            'lawFirm' => $lawFirm,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing lawFirm entity.
     *
     * @Route("/{id}/edit", name="lawfirm_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, LawFirm $lawFirm)
    {
        $deleteForm = $this->createDeleteForm($lawFirm);
        $editForm = $this->createForm('MyBundle\Form\LawFirmType', $lawFirm);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('lawfirm_edit', array('id' => $lawFirm->getId()));
        }

        return $this->render('lawfirm/edit.html.twig', array(
            'lawFirm' => $lawFirm,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a lawFirm entity.
     *
     * @Route("/{id}", name="lawfirm_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, LawFirm $lawFirm)
    {
        $form = $this->createDeleteForm($lawFirm);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($lawFirm);
            $em->flush();
        }

        return $this->redirectToRoute('lawfirm_index');
    }

    /**
     * Creates a form to delete a lawFirm entity.
     *
     * @param LawFirm $lawFirm The lawFirm entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(LawFirm $lawFirm)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('lawfirm_delete', array('id' => $lawFirm->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
