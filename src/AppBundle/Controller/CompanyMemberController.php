<?php

namespace AppBundle\Controller;

use AppBundle\Entity\CompanyMember;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Companymember controller.
 *
 * @Route("user/companymember")
 */
class CompanyMemberController extends Controller
{
    /**
     * Lists all companyMember entities.
     *
     * @Route("/", name="user_companymember_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $companyMembers = $em->getRepository('AppBundle:CompanyMember')->findAll();


        return $this->render('companymember/index.html.twig', array(
            'companyMembers' => $companyMembers,
        ));
    }

    /**
     * Creates a new companyMember entity.
     *
     * @Route("/new", name="user_companymember_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $companyMember = new Companymember();
        $form = $this->createForm('AppBundle\Form\CompanyMemberType', $companyMember);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($companyMember);
            $em->flush();

            return $this->redirectToRoute('user_companymember_show', array('id' => $companyMember->getId()));
        }

        return $this->render('companymember/new.html.twig', array(
            'companyMember' => $companyMember,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a companyMember entity.
     *
     * @Route("/{id}", name="user_companymember_show")
     * @Method("GET")
     */
    public function showAction(CompanyMember $companyMember)
    {
        $deleteForm = $this->createDeleteForm($companyMember);

        return $this->render('companymember/show.html.twig', array(
            'companyMember' => $companyMember,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing companyMember entity.
     *
     * @Route("/{id}/edit", name="user_companymember_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, CompanyMember $companyMember)
    {
        $deleteForm = $this->createDeleteForm($companyMember);
        $editForm = $this->createForm('AppBundle\Form\CompanyMemberType', $companyMember);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('user_companymember_edit', array('id' => $companyMember->getId()));
        }

        return $this->render('companymember/edit.html.twig', array(
            'companyMember' => $companyMember,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a companyMember entity.
     *
     * @Route("/{id}", name="user_companymember_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, CompanyMember $companyMember)
    {
        $form = $this->createDeleteForm($companyMember);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($companyMember);
            $em->flush();
        }

        return $this->redirectToRoute('user_companymember_index');
    }

    /**
     * Creates a form to delete a companyMember entity.
     *
     * @param CompanyMember $companyMember The companyMember entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(CompanyMember $companyMember)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('user_companymember_delete', array('id' => $companyMember->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
