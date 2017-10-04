<?php

namespace MyBundle\Controller;

use MyBundle\Entity\Incident;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Incident controller.
 *
 * @Route("incident")
 */
class IncidentController extends Controller
{
    /**
     * Lists all incident entities.
     *
     * @Route("/", name="incident_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $incidents = $em->getRepository('MyBundle:Incident')->findAll();

        return $this->render('incident/index.html.twig', array(
            'incidents' => $incidents,
        ));
    }

    /**
     * Creates a new incident entity.
     *
     * @Route("/new", name="incident_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $incident = new Incident();
        $form = $this->createForm('MyBundle\Form\IncidentType', $incident);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($incident);
            $em->flush();

            return $this->redirectToRoute('incident_show', array('id' => $incident->getId()));
        }

        return $this->render('incident/new.html.twig', array(
            'incident' => $incident,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a incident entity.
     *
     * @Route("/{id}", name="incident_show")
     * @Method("GET")
     */
    public function showAction(Incident $incident)
    {
        $deleteForm = $this->createDeleteForm($incident);

        return $this->render('incident/show.html.twig', array(
            'incident' => $incident,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing incident entity.
     *
     * @Route("/{id}/edit", name="incident_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Incident $incident)
    {
        $deleteForm = $this->createDeleteForm($incident);
        $editForm = $this->createForm('MyBundle\Form\IncidentType', $incident);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('incident_edit', array('id' => $incident->getId()));
        }

        return $this->render('incident/edit.html.twig', array(
            'incident' => $incident,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a incident entity.
     *
     * @Route("/{id}", name="incident_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Incident $incident)
    {
        $form = $this->createDeleteForm($incident);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($incident);
            $em->flush();
        }

        return $this->redirectToRoute('incident_index');
    }

    /**
     * Creates a form to delete a incident entity.
     *
     * @param Incident $incident The incident entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Incident $incident)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('incident_delete', array('id' => $incident->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
