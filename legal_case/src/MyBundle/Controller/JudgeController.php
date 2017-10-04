<?php

namespace MyBundle\Controller;

use MyBundle\Entity\Judge;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Judge controller.
 *
 * @Route("judge")
 */
class JudgeController extends Controller
{
    /**
     * Lists all judge entities.
     *
     * @Route("/", name="judge_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $judges = $em->getRepository('MyBundle:Judge')->findAll();

        return $this->render('judge/index.html.twig', array(
            'judges' => $judges,
        ));
    }

    /**
     * Creates a new judge entity.
     *
     * @Route("/new", name="judge_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $judge = new Judge();
        $form = $this->createForm('MyBundle\Form\JudgeType', $judge);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($judge);
            $em->flush();

            return $this->redirectToRoute('judge_show', array('id' => $judge->getId()));
        }

        return $this->render('judge/new.html.twig', array(
            'judge' => $judge,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a judge entity.
     *
     * @Route("/{id}", name="judge_show")
     * @Method("GET")
     */
    public function showAction(Judge $judge)
    {
        $deleteForm = $this->createDeleteForm($judge);

        return $this->render('judge/show.html.twig', array(
            'judge' => $judge,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing judge entity.
     *
     * @Route("/{id}/edit", name="judge_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Judge $judge)
    {
        $deleteForm = $this->createDeleteForm($judge);
        $editForm = $this->createForm('MyBundle\Form\JudgeType', $judge);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('judge_edit', array('id' => $judge->getId()));
        }

        return $this->render('judge/edit.html.twig', array(
            'judge' => $judge,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a judge entity.
     *
     * @Route("/{id}", name="judge_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Judge $judge)
    {
        $form = $this->createDeleteForm($judge);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($judge);
            $em->flush();
        }

        return $this->redirectToRoute('judge_index');
    }

    /**
     * Creates a form to delete a judge entity.
     *
     * @param Judge $judge The judge entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Judge $judge)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('judge_delete', array('id' => $judge->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
