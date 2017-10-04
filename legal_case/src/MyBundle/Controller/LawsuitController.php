<?php

namespace MyBundle\Controller;

use MyBundle\Entity\Lawsuit;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Lawsuit controller.
 *
 * @Route("lawsuit")
 */
class LawsuitController extends Controller
{
    /**
     * Lists all lawsuit entities.
     *
     * @Route("/", name="lawsuit_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $lawsuits = $em->getRepository('MyBundle:Lawsuit')->findAll();

        return $this->render('lawsuit/index.html.twig', array(
            'lawsuits' => $lawsuits,
        ));
    }

    /**
     * Creates a new lawsuit entity.
     *
     * @Route("/new", name="lawsuit_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $lawsuit = new Lawsuit();
        $form = $this->createForm('MyBundle\Form\LawsuitType', $lawsuit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($lawsuit);
            $em->flush();

            return $this->redirectToRoute('lawsuit_show', array('id' => $lawsuit->getId()));
        }

        return $this->render('lawsuit/new.html.twig', array(
            'lawsuit' => $lawsuit,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a lawsuit entity.
     *
     * @Route("/{id}", name="lawsuit_show")
     * @Method("GET")
     */
    public function showAction(Lawsuit $lawsuit)
    {
        $deleteForm = $this->createDeleteForm($lawsuit);

        return $this->render('lawsuit/show.html.twig', array(
            'lawsuit' => $lawsuit,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing lawsuit entity.
     *
     * @Route("/{id}/edit", name="lawsuit_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Lawsuit $lawsuit)
    {
        $deleteForm = $this->createDeleteForm($lawsuit);
        $editForm = $this->createForm('MyBundle\Form\LawsuitType', $lawsuit);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('lawsuit_edit', array('id' => $lawsuit->getId()));
        }

        return $this->render('lawsuit/edit.html.twig', array(
            'lawsuit' => $lawsuit,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a lawsuit entity.
     *
     * @Route("/{id}", name="lawsuit_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Lawsuit $lawsuit)
    {
        $form = $this->createDeleteForm($lawsuit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($lawsuit);
            $em->flush();
        }

        return $this->redirectToRoute('lawsuit_index');
    }

    /**
     * Creates a form to delete a lawsuit entity.
     *
     * @param Lawsuit $lawsuit The lawsuit entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Lawsuit $lawsuit)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('lawsuit_delete', array('id' => $lawsuit->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
