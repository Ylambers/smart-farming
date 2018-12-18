<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Ranking;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Ranking controller.
 *
 * @Route("/user/ranking")
 */
class RankingController extends Controller
{
    /**
     * Lists all ranking entities.
     *
     * @Route("/", name="ranking_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $rankings = $em->getRepository('AppBundle:Ranking')->findAll();

        return $this->render('ranking/index.html.twig', array(
            'rankings' => $rankings,
        ));
    }

    /**
     * Creates a new ranking entity.
     *
     * @Route("/new", name="ranking_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $ranking = new Ranking();
        $form = $this->createForm('AppBundle\Form\RankingType', $ranking);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($ranking);
            $em->flush();

            return $this->redirectToRoute('ranking_show', array('id' => $ranking->getId()));
        }

        return $this->render('ranking/new.html.twig', array(
            'ranking' => $ranking,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ranking entity.
     *
     * @Route("/{id}", name="ranking_show")
     * @Method("GET")
     */
    public function showAction(Ranking $ranking)
    {
        $deleteForm = $this->createDeleteForm($ranking);

        return $this->render('ranking/show.html.twig', array(
            'ranking' => $ranking,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ranking entity.
     *
     * @Route("/{id}/edit", name="ranking_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Ranking $ranking)
    {
        $deleteForm = $this->createDeleteForm($ranking);
        $editForm = $this->createForm('AppBundle\Form\RankingType', $ranking);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('ranking_edit', array('id' => $ranking->getId()));
        }

        return $this->render('ranking/edit.html.twig', array(
            'ranking' => $ranking,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ranking entity.
     *
     * @Route("/{id}", name="ranking_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Ranking $ranking)
    {
        $form = $this->createDeleteForm($ranking);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($ranking);
            $em->flush();
        }

        return $this->redirectToRoute('ranking_index');
    }

    /**
     * Creates a form to delete a ranking entity.
     *
     * @param Ranking $ranking The ranking entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Ranking $ranking)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('ranking_delete', array('id' => $ranking->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
