<?php

namespace MyBundle\Controller;

use MyBundle\Entity\JuridicalPerson;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Juridicalperson controller.
 *
 * @Route("juridicalperson")
 */
class JuridicalPersonController extends Controller
{
    /**
     * Lists all juridicalPerson entities.
     *
     * @Route("/", name="juridicalperson_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $juridicalPeople = $em->getRepository('MyBundle:JuridicalPerson')->findAll();

        return $this->render('juridicalperson/index.html.twig', array(
            'juridicalPeople' => $juridicalPeople,
        ));
    }

    /**
     * Creates a new juridicalPerson entity.
     *
     * @Route("/new", name="juridicalperson_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $juridicalPerson = new Juridicalperson();
        $form = $this->createForm('MyBundle\Form\JuridicalPersonType', $juridicalPerson);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($juridicalPerson);
            $em->flush();

            return $this->redirectToRoute('juridicalperson_show', array('id' => $juridicalPerson->getId()));
        }

        return $this->render('juridicalperson/new.html.twig', array(
            'juridicalPerson' => $juridicalPerson,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a juridicalPerson entity.
     *
     * @Route("/{id}", name="juridicalperson_show")
     * @Method("GET")
     */
    public function showAction(JuridicalPerson $juridicalPerson)
    {
        $deleteForm = $this->createDeleteForm($juridicalPerson);

        return $this->render('juridicalperson/show.html.twig', array(
            'juridicalPerson' => $juridicalPerson,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing juridicalPerson entity.
     *
     * @Route("/{id}/edit", name="juridicalperson_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, JuridicalPerson $juridicalPerson)
    {
        $deleteForm = $this->createDeleteForm($juridicalPerson);
        $editForm = $this->createForm('MyBundle\Form\JuridicalPersonType', $juridicalPerson);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('juridicalperson_edit', array('id' => $juridicalPerson->getId()));
        }

        return $this->render('juridicalperson/edit.html.twig', array(
            'juridicalPerson' => $juridicalPerson,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a juridicalPerson entity.
     *
     * @Route("/{id}", name="juridicalperson_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, JuridicalPerson $juridicalPerson)
    {
        $form = $this->createDeleteForm($juridicalPerson);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($juridicalPerson);
            $em->flush();
        }

        return $this->redirectToRoute('juridicalperson_index');
    }

    /**
     * Creates a form to delete a juridicalPerson entity.
     *
     * @param JuridicalPerson $juridicalPerson The juridicalPerson entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(JuridicalPerson $juridicalPerson)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('juridicalperson_delete', array('id' => $juridicalPerson->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
