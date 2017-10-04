<?php

namespace MyBundle\Controller;

use MyBundle\Entity\Clause;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Clause controller.
 *
 * @Route("clause")
 */
class ClauseController extends Controller
{
    /**
     * Lists all clause entities.
     *
     * @Route("/", name="clause_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $clauses = $em->getRepository('MyBundle:Clause')->findAll();

        return $this->render('clause/index.html.twig', array(
            'clauses' => $clauses,
        ));
    }

    /**
     * Creates a new clause entity.
     *
     * @Route("/new", name="clause_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $clause = new Clause();
        $form = $this->createForm('MyBundle\Form\ClauseType', $clause);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($clause);
            $em->flush();

            return $this->redirectToRoute('clause_show', array('id' => $clause->getId()));
        }

        return $this->render('clause/new.html.twig', array(
            'clause' => $clause,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a clause entity.
     *
     * @Route("/{id}", name="clause_show")
     * @Method("GET")
     */
    public function showAction(Clause $clause)
    {
        $deleteForm = $this->createDeleteForm($clause);

        return $this->render('clause/show.html.twig', array(
            'clause' => $clause,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing clause entity.
     *
     * @Route("/{id}/edit", name="clause_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Clause $clause)
    {
        $deleteForm = $this->createDeleteForm($clause);
        $editForm = $this->createForm('MyBundle\Form\ClauseType', $clause);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('clause_edit', array('id' => $clause->getId()));
        }

        return $this->render('clause/edit.html.twig', array(
            'clause' => $clause,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a clause entity.
     *
     * @Route("/{id}", name="clause_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Clause $clause)
    {
        $form = $this->createDeleteForm($clause);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($clause);
            $em->flush();
        }

        return $this->redirectToRoute('clause_index');
    }

    /**
     * Creates a form to delete a clause entity.
     *
     * @param Clause $clause The clause entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Clause $clause)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('clause_delete', array('id' => $clause->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
