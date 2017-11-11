<?php

namespace MyBundle\Controller;

use MyBundle\Entity\Policeofficer;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Policeofficer controller.
 *
 * @Route("policeofficer")
 */
class PoliceofficerController extends Controller
{
    /**
     * Lists all policeofficer entities.
     *
     * @Route("/", name="policeofficer_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $policeofficers = $em->getRepository('MyBundle:Policeofficer')->findAll();

        return $this->render('policeofficer/index.html.twig', array(
            'policeofficers' => $policeofficers,
        ));
    }

    /**
     * Creates a new policeofficer entity.
     *
     * @Route("/new", name="policeofficer_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $policeofficer = new Policeofficer();
        $form = $this->createForm('MyBundle\Form\PoliceofficerType', $policeofficer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($policeofficer);
            $em->flush();

            return $this->redirectToRoute('policeofficer_show', array('id' => $policeofficer->getId()));
        }

        return $this->render('policeofficer/new.html.twig', array(
            'policeofficer' => $policeofficer,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a policeofficer entity.
     *
     * @Route("/{id}", name="policeofficer_show")
     * @Method("GET")
     */
    public function showAction(Policeofficer $policeofficer)
    {
        $deleteForm = $this->createDeleteForm($policeofficer);

        return $this->render('policeofficer/show.html.twig', array(
            'policeofficer' => $policeofficer,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing policeofficer entity.
     *
     * @Route("/{id}/edit", name="policeofficer_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Policeofficer $policeofficer)
    {
        $deleteForm = $this->createDeleteForm($policeofficer);
        $editForm = $this->createForm('MyBundle\Form\PoliceofficerType', $policeofficer);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('policeofficer_edit', array('id' => $policeofficer->getId()));
        }

        return $this->render('policeofficer/edit.html.twig', array(
            'policeofficer' => $policeofficer,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a policeofficer entity.
     *
     * @Route("/{id}", name="policeofficer_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Policeofficer $policeofficer)
    {
        $form = $this->createDeleteForm($policeofficer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($policeofficer);
            $em->flush();
        }

        return $this->redirectToRoute('policeofficer_index');
    }

    /**
     * Creates a form to delete a policeofficer entity.
     *
     * @param Policeofficer $policeofficer The policeofficer entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Policeofficer $policeofficer)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('policeofficer_delete', array('id' => $policeofficer->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
