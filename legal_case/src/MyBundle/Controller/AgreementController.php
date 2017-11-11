<?php

namespace MyBundle\Controller;

use MyBundle\Entity\Agreement;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Agreement controller.
 *
 * @Route("agreement")
 */
class AgreementController extends Controller
{
    /**
     * Lists all agreement entities.
     *
     * @Route("/", name="agreement_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $agreements = $em->getRepository('MyBundle:Agreement')->findAll();

        return $this->render('agreement/index.html.twig', array(
            'agreements' => $agreements,
        ));
    }

    /**
     * Creates a new agreement entity.
     *
     * @Route("/new", name="agreement_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $agreement = new Agreement();
        $form = $this->createForm('MyBundle\Form\AgreementType', $agreement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($agreement);
            $em->flush();

            return $this->redirectToRoute('agreement_show', array('id' => $agreement->getId()));
        }

        return $this->render('agreement/new.html.twig', array(
            'agreement' => $agreement,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a agreement entity.
     *
     * @Route("/{id}", name="agreement_show")
     * @Method("GET")
     */
    public function showAction(Agreement $agreement)
    {
        $deleteForm = $this->createDeleteForm($agreement);

        return $this->render('agreement/show.html.twig', array(
            'agreement' => $agreement,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing agreement entity.
     *
     * @Route("/{id}/edit", name="agreement_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Agreement $agreement)
    {
        $deleteForm = $this->createDeleteForm($agreement);
        $editForm = $this->createForm('MyBundle\Form\AgreementType', $agreement);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('agreement_edit', array('id' => $agreement->getId()));
        }

        return $this->render('agreement/edit.html.twig', array(
            'agreement' => $agreement,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a agreement entity.
     *
     * @Route("/{id}", name="agreement_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Agreement $agreement)
    {
        $form = $this->createDeleteForm($agreement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($agreement);
            $em->flush();
        }

        return $this->redirectToRoute('agreement_index');
    }

    /**
     * Creates a form to delete a agreement entity.
     *
     * @param Agreement $agreement The agreement entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Agreement $agreement)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('agreement_delete', array('id' => $agreement->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
