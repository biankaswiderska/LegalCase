<?php

namespace MyBundle\Controller;

use MyBundle\Entity\Court;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Court controller.
 *
 * @Route("court")
 */
class CourtController extends Controller
{
    /**
     * Lists all court entities.
     *
     * @Route("/", name="court_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $courts = $em->getRepository('MyBundle:Court')->findAll();

        return $this->render('court/index.html.twig', array(
            'courts' => $courts,
        ));
    }

    /**
     * Creates a new court entity.
     *
     * @Route("/new", name="court_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $court = new Court();
        $form = $this->createForm('MyBundle\Form\CourtType', $court);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($court);
            $em->flush();

            return $this->redirectToRoute('court_show', array('id' => $court->getId()));
        }

        return $this->render('court/new.html.twig', array(
            'court' => $court,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a court entity.
     *
     * @Route("/{id}", name="court_show")
     * @Method("GET")
     */
    public function showAction(Court $court)
    {
        $deleteForm = $this->createDeleteForm($court);

        return $this->render('court/show.html.twig', array(
            'court' => $court,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing court entity.
     *
     * @Route("/{id}/edit", name="court_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Court $court)
    {
        $deleteForm = $this->createDeleteForm($court);
        $editForm = $this->createForm('MyBundle\Form\CourtType', $court);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('court_edit', array('id' => $court->getId()));
        }

        return $this->render('court/edit.html.twig', array(
            'court' => $court,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a court entity.
     *
     * @Route("/{id}", name="court_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Court $court)
    {
        $form = $this->createDeleteForm($court);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($court);
            $em->flush();
        }

        return $this->redirectToRoute('court_index');
    }

    /**
     * Creates a form to delete a court entity.
     *
     * @param Court $court The court entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Court $court)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('court_delete', array('id' => $court->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
