<?php

namespace MyBundle\Controller;

use MyBundle\Entity\NaturalPerson;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Naturalperson controller.
 *
 * @Route("naturalperson")
 */
class NaturalPersonController extends Controller
{
    /**
     * Lists all naturalPerson entities.
     *
     * @Route("/", name="naturalperson_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $naturalPeople = $em->getRepository('MyBundle:NaturalPerson')->findAll();

        return $this->render('naturalperson/index.html.twig', array(
            'naturalPeople' => $naturalPeople,
        ));
    }

    /**
     * Creates a new naturalPerson entity.
     *
     * @Route("/new", name="naturalperson_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $naturalPerson = new Naturalperson();
        $form = $this->createForm('MyBundle\Form\NaturalPersonType', $naturalPerson);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($naturalPerson);
            $em->flush();

            return $this->redirectToRoute('naturalperson_show', array('id' => $naturalPerson->getId()));
        }

        return $this->render('naturalperson/new.html.twig', array(
            'naturalPerson' => $naturalPerson,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a naturalPerson entity.
     *
     * @Route("/{id}", name="naturalperson_show")
     * @Method("GET")
     */
    public function showAction(NaturalPerson $naturalPerson)
    {
        $deleteForm = $this->createDeleteForm($naturalPerson);

        return $this->render('naturalperson/show.html.twig', array(
            'naturalPerson' => $naturalPerson,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing naturalPerson entity.
     *
     * @Route("/{id}/edit", name="naturalperson_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, NaturalPerson $naturalPerson)
    {
        $deleteForm = $this->createDeleteForm($naturalPerson);
        $editForm = $this->createForm('MyBundle\Form\NaturalPersonType', $naturalPerson);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('naturalperson_edit', array('id' => $naturalPerson->getId()));
        }

        return $this->render('naturalperson/edit.html.twig', array(
            'naturalPerson' => $naturalPerson,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a naturalPerson entity.
     *
     * @Route("/{id}", name="naturalperson_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, NaturalPerson $naturalPerson)
    {
        $form = $this->createDeleteForm($naturalPerson);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($naturalPerson);
            $em->flush();
        }

        return $this->redirectToRoute('naturalperson_index');
    }

    /**
     * Creates a form to delete a naturalPerson entity.
     *
     * @param NaturalPerson $naturalPerson The naturalPerson entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(NaturalPerson $naturalPerson)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('naturalperson_delete', array('id' => $naturalPerson->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
