<?php

namespace AppBundle\Controller;

use AppBundle\Entity\CompanyFunction;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Companyfunction controller.
 *
 * @Route("companyfunction")
 */
class CompanyFunctionController extends Controller
{
    /**
     * Lists all companyFunction entities.
     *
     * @Route("/", name="companyfunction_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $companyFunctions = $em->getRepository('AppBundle:CompanyFunction')->findAll();

        return $this->render('companyfunction/index.html.twig', array(
            'companyFunctions' => $companyFunctions,
        ));
    }

    /**
     * Creates a new companyFunction entity.
     *
     * @Route("/new", name="companyfunction_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $companyFunction = new Companyfunction();
        $form = $this->createForm('AppBundle\Form\CompanyFunctionType', $companyFunction);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($companyFunction);
            $em->flush();

            return $this->redirectToRoute('companyfunction_show', array('id' => $companyFunction->getId()));
        }

        return $this->render('companyfunction/new.html.twig', array(
            'companyFunction' => $companyFunction,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a companyFunction entity.
     *
     * @Route("/{id}", name="companyfunction_show")
     * @Method("GET")
     */
    public function showAction(CompanyFunction $companyFunction)
    {
        $deleteForm = $this->createDeleteForm($companyFunction);

        return $this->render('companyfunction/show.html.twig', array(
            'companyFunction' => $companyFunction,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing companyFunction entity.
     *
     * @Route("/{id}/edit", name="companyfunction_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, CompanyFunction $companyFunction)
    {
        $deleteForm = $this->createDeleteForm($companyFunction);
        $editForm = $this->createForm('AppBundle\Form\CompanyFunctionType', $companyFunction);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('companyfunction_edit', array('id' => $companyFunction->getId()));
        }

        return $this->render('companyfunction/edit.html.twig', array(
            'companyFunction' => $companyFunction,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a companyFunction entity.
     *
     * @Route("/{id}", name="companyfunction_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, CompanyFunction $companyFunction)
    {
        $form = $this->createDeleteForm($companyFunction);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($companyFunction);
            $em->flush();
        }

        return $this->redirectToRoute('companyfunction_index');
    }

    /**
     * Creates a form to delete a companyFunction entity.
     *
     * @param CompanyFunction $companyFunction The companyFunction entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(CompanyFunction $companyFunction)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('companyfunction_delete', array('id' => $companyFunction->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
