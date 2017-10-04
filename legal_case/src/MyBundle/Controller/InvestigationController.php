<?php

namespace MyBundle\Controller;

use MyBundle\Entity\Investigation;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Investigation controller.
 *
 * @Route("investigation")
 */
class InvestigationController extends Controller
{
    /**
     * Lists all investigation entities.
     *
     * @Route("/", name="investigation_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $investigations = $em->getRepository('MyBundle:Investigation')->findAll();

        return $this->render('investigation/index.html.twig', array(
            'investigations' => $investigations,
        ));
    }

    /**
     * Creates a new investigation entity.
     *
     * @Route("/new", name="investigation_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $investigation = new Investigation();
        $form = $this->createForm('MyBundle\Form\InvestigationType', $investigation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($investigation);
            $em->flush();

            return $this->redirectToRoute('investigation_show', array('id' => $investigation->getId()));
        }

        return $this->render('investigation/new.html.twig', array(
            'investigation' => $investigation,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a investigation entity.
     *
     * @Route("/{id}", name="investigation_show")
     * @Method("GET")
     */
    public function showAction(Investigation $investigation)
    {
        $deleteForm = $this->createDeleteForm($investigation);

        return $this->render('investigation/show.html.twig', array(
            'investigation' => $investigation,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing investigation entity.
     *
     * @Route("/{id}/edit", name="investigation_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Investigation $investigation)
    {
        $deleteForm = $this->createDeleteForm($investigation);
        $editForm = $this->createForm('MyBundle\Form\InvestigationType', $investigation);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('investigation_edit', array('id' => $investigation->getId()));
        }

        return $this->render('investigation/edit.html.twig', array(
            'investigation' => $investigation,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a investigation entity.
     *
     * @Route("/{id}", name="investigation_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Investigation $investigation)
    {
        $form = $this->createDeleteForm($investigation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($investigation);
            $em->flush();
        }

        return $this->redirectToRoute('investigation_index');
    }

    /**
     * Creates a form to delete a investigation entity.
     *
     * @param Investigation $investigation The investigation entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Investigation $investigation)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('investigation_delete', array('id' => $investigation->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
