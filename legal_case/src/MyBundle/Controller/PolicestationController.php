<?php

namespace MyBundle\Controller;

use MyBundle\Entity\Policestation;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Policestation controller.
 *
 * @Route("policestation")
 */
class PolicestationController extends Controller
{
    /**
     * Lists all policestation entities.
     *
     * @Route("/", name="policestation_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $policestations = $em->getRepository('MyBundle:Policestation')->findAll();

        return $this->render('policestation/index.html.twig', array(
            'policestations' => $policestations,
        ));
    }

    /**
     * Creates a new policestation entity.
     *
     * @Route("/new", name="policestation_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $policestation = new Policestation();
        $form = $this->createForm('MyBundle\Form\PolicestationType', $policestation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($policestation);
            $em->flush();

            return $this->redirectToRoute('policestation_show', array('id' => $policestation->getId()));
        }

        return $this->render('policestation/new.html.twig', array(
            'policestation' => $policestation,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a policestation entity.
     *
     * @Route("/{id}", name="policestation_show")
     * @Method("GET")
     */
    public function showAction(Policestation $policestation)
    {
        $deleteForm = $this->createDeleteForm($policestation);

        return $this->render('policestation/show.html.twig', array(
            'policestation' => $policestation,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing policestation entity.
     *
     * @Route("/{id}/edit", name="policestation_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Policestation $policestation)
    {
        $deleteForm = $this->createDeleteForm($policestation);
        $editForm = $this->createForm('MyBundle\Form\PolicestationType', $policestation);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('policestation_edit', array('id' => $policestation->getId()));
        }

        return $this->render('policestation/edit.html.twig', array(
            'policestation' => $policestation,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a policestation entity.
     *
     * @Route("/{id}", name="policestation_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Policestation $policestation)
    {
        $form = $this->createDeleteForm($policestation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($policestation);
            $em->flush();
        }

        return $this->redirectToRoute('policestation_index');
    }

    /**
     * Creates a form to delete a policestation entity.
     *
     * @param Policestation $policestation The policestation entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Policestation $policestation)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('policestation_delete', array('id' => $policestation->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
