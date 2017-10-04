<?php

namespace MyBundle\Controller;

use MyBundle\Entity\LegalCode;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Legalcode controller.
 *
 * @Route("legalcode")
 */
class LegalCodeController extends Controller
{
    /**
     * Lists all legalCode entities.
     *
     * @Route("/", name="legalcode_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $legalCodes = $em->getRepository('MyBundle:LegalCode')->findAll();

        return $this->render('legalcode/index.html.twig', array(
            'legalCodes' => $legalCodes,
        ));
    }

    /**
     * Creates a new legalCode entity.
     *
     * @Route("/new", name="legalcode_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $legalCode = new Legalcode();
        $form = $this->createForm('MyBundle\Form\LegalCodeType', $legalCode);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($legalCode);
            $em->flush();

            return $this->redirectToRoute('legalcode_show', array('id' => $legalCode->getId()));
        }

        return $this->render('legalcode/new.html.twig', array(
            'legalCode' => $legalCode,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a legalCode entity.
     *
     * @Route("/{id}", name="legalcode_show")
     * @Method("GET")
     */
    public function showAction(LegalCode $legalCode)
    {
        $deleteForm = $this->createDeleteForm($legalCode);

        return $this->render('legalcode/show.html.twig', array(
            'legalCode' => $legalCode,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing legalCode entity.
     *
     * @Route("/{id}/edit", name="legalcode_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, LegalCode $legalCode)
    {
        $deleteForm = $this->createDeleteForm($legalCode);
        $editForm = $this->createForm('MyBundle\Form\LegalCodeType', $legalCode);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('legalcode_edit', array('id' => $legalCode->getId()));
        }

        return $this->render('legalcode/edit.html.twig', array(
            'legalCode' => $legalCode,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a legalCode entity.
     *
     * @Route("/{id}", name="legalcode_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, LegalCode $legalCode)
    {
        $form = $this->createDeleteForm($legalCode);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($legalCode);
            $em->flush();
        }

        return $this->redirectToRoute('legalcode_index');
    }

    /**
     * Creates a form to delete a legalCode entity.
     *
     * @param LegalCode $legalCode The legalCode entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(LegalCode $legalCode)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('legalcode_delete', array('id' => $legalCode->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
