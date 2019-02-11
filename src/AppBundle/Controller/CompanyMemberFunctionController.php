<?php

namespace AppBundle\Controller;

use AppBundle\Entity\CompanyMemberFunction;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Companymemberfunction controller.
 *
 * @Route("user/companymemberfunction")
 */
class CompanyMemberFunctionController extends Controller
{
    /**
     * Lists all companyMemberFunction entities.
     *
     * @Route("/", name="user_companymemberfunction_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $companyMemberFunctions = $em->getRepository('AppBundle:CompanyMemberFunction')->findAll();

        return $this->render('companymemberfunction/index.html.twig', array(
            'companyMemberFunctions' => $companyMemberFunctions,
        ));
    }

    /**
     * Creates a new companyMemberFunction entity.
     *
     * @Route("/new", name="user_companymemberfunction_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $companyMemberFunction = new Companymemberfunction();
        $form = $this->createForm('AppBundle\Form\CompanyMemberFunctionType', $companyMemberFunction);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($companyMemberFunction);
            $em->flush();

            return $this->redirectToRoute('user_companymemberfunction_show', array('id' => $companyMemberFunction->getId()));
        }

        return $this->render('companymemberfunction/new.html.twig', array(
            'companyMemberFunction' => $companyMemberFunction,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a companyMemberFunction entity.
     *
     * @Route("/{id}", name="user_companymemberfunction_show")
     * @Method("GET")
     */
    public function showAction(CompanyMemberFunction $companyMemberFunction)
    {
        $deleteForm = $this->createDeleteForm($companyMemberFunction);

        return $this->render('companymemberfunction/show.html.twig', array(
            'companyMemberFunction' => $companyMemberFunction,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing companyMemberFunction entity.
     *
     * @Route("/{id}/edit", name="user_companymemberfunction_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, CompanyMemberFunction $companyMemberFunction)
    {
        $deleteForm = $this->createDeleteForm($companyMemberFunction);
        $editForm = $this->createForm('AppBundle\Form\CompanyMemberFunctionType', $companyMemberFunction);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('user_companymemberfunction_edit', array('id' => $companyMemberFunction->getId()));
        }

        return $this->render('companymemberfunction/edit.html.twig', array(
            'companyMemberFunction' => $companyMemberFunction,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a companyMemberFunction entity.
     *
     * @Route("/{id}", name="user_companymemberfunction_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, CompanyMemberFunction $companyMemberFunction)
    {
        $form = $this->createDeleteForm($companyMemberFunction);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($companyMemberFunction);
            $em->flush();
        }

        return $this->redirectToRoute('user_companymemberfunction_index');
    }

    /**
     * Creates a form to delete a companyMemberFunction entity.
     *
     * @param CompanyMemberFunction $companyMemberFunction The companyMemberFunction entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(CompanyMemberFunction $companyMemberFunction)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('user_companymemberfunction_delete', array('id' => $companyMemberFunction->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
