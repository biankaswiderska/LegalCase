<?php

namespace MyBundle\Controller;

use MyBundle\Entity\Lawyer;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Lawyer controller.
 *
 * @Route("lawyer")
 */
class LawyerController extends Controller
{
    /**
     * Lists all lawyer entities.
     *
     * @Route("/", name="lawyer_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $lawyers = $em->getRepository('MyBundle:Lawyer')->findAll();

        return $this->render('lawyer/index.html.twig', array(
            'lawyers' => $lawyers,
        ));
    }

    /**
     * Creates a new lawyer entity.
     *
     * @Route("/new", name="lawyer_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $lawyer = new Lawyer();
        $form = $this->createForm('MyBundle\Form\LawyerType', $lawyer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($lawyer);
            $em->flush();

            return $this->redirectToRoute('lawyer_show', array('id' => $lawyer->getId()));
        }

        return $this->render('lawyer/new.html.twig', array(
            'lawyer' => $lawyer,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a lawyer entity.
     *
     * @Route("/{id}", name="lawyer_show")
     * @Method("GET")
     */
    public function showAction(Lawyer $lawyer)
    {
        $deleteForm = $this->createDeleteForm($lawyer);

        return $this->render('lawyer/show.html.twig', array(
            'lawyer' => $lawyer,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing lawyer entity.
     *
     * @Route("/{id}/edit", name="lawyer_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Lawyer $lawyer)
    {
        $deleteForm = $this->createDeleteForm($lawyer);
        $editForm = $this->createForm('MyBundle\Form\LawyerType', $lawyer);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('lawyer_edit', array('id' => $lawyer->getId()));
        }

        return $this->render('lawyer/edit.html.twig', array(
            'lawyer' => $lawyer,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a lawyer entity.
     *
     * @Route("/{id}", name="lawyer_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Lawyer $lawyer)
    {
        $form = $this->createDeleteForm($lawyer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($lawyer);
            $em->flush();
        }

        return $this->redirectToRoute('lawyer_index');
    }

    /**
     * Creates a form to delete a lawyer entity.
     *
     * @param Lawyer $lawyer The lawyer entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Lawyer $lawyer)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('lawyer_delete', array('id' => $lawyer->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
