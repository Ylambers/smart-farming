<?php

namespace AppBundle\Controller;

use AppBundle\Controller\Services\ServicesController;
use AppBundle\Entity\Answer;
use AppBundle\Entity\Topic;
use AppBundle\Entity\Rating;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Question controller.
 *
 * @Route("/user/topic")
 */
class TopicController extends ServicesController
{
    /**
     * Lists all question entities.
     *
     * @Route("/", name="topic_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $questions = $em->getRepository('AppBundle:Topic')->findAll();
        $category = $em->getRepository('AppBundle:Category')->findAll();

        foreach ($questions as $question) {
            $question->setVotes($this->getQuestionVotes($question));
        }

        return $this->render('question/index.html.twig', array(
            'category' => $category,
            'questions' => $questions,
        ));
    }

    /**
     * Lists all question entities.
     *
     * @Route("/search/{id}", name="question_search_on_key")
     * @Method("GET")
     */
    public function searchQuestionAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $questions = $em->getRepository('Topic')->findBy(['category' => $id]);
        $category = $em->getRepository('AppBundle:Category')->findAll();

        foreach ($questions as $question) {
            $question->setVotes($this->getQuestionVotes($question));
        }

        return $this->render('question/index.html.twig', array(
            'category' => $category,
            'questions' => $questions,
        ));
    }


    /**
     * Creates a new question entity.
     *
     * @Route("/new", name="topic_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $category = $em->getRepository('AppBundle:Category')->findMainCategory();
        $sub = $em->getRepository('AppBundle:Category')->findSubCategory(1);



        $question = new Topic();
        $form = $this->createForm('AppBundle\Form\QuestionType', $question);
        $form->handleRequest($request);

        $question->setUser($this->getUser());
        $question->setDatePosted(new \DateTime());

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($question);
            $em->flush();

            return $this->redirectToRoute('question_show', array('id' => $question->getId()));
        }

        return $this->render('question/new.html.twig', array(
            'question' => $question,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a question entity.
     *
     * @Route("/{id}", name="question_show")
     *
     */
    public function showAction(Request $request, Topic $question)
    {
        $em = $this->getDoctrine()->getManager();
        $givenAnswers = $em->getRepository('AppBundle:Answer')->findBy(['question' => $question]);

        foreach ($givenAnswers as $givenAnswer) {
            $givenAnswer->setVotes($this->getAnswerVotes($givenAnswer));
        }

        $answer = new Answer();

        $answerForm = $this->createForm("AppBundle\Form\AnswerType" , $answer);
        $answer->setUser($this->getUser());
        $answer->setDatePosted(new \DateTime());
        $answer->setQuestion($question);
        $question->setVotes($this->getQuestionVotes($question));

        $answerForm->handleRequest($request);
        if($answerForm->isSubmitted() && $answerForm->isValid())
        {
            $em->persist($answer);
            $em->flush();

            $referer = $request->headers->get('referer'); // redirect to last page
            return $this->redirect($referer);
        }
        return $this->render('question/show.html.twig', array(
            'givenAnswers' => $givenAnswers,
            'question' => $question,
            'answerForm' => $answerForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing question entity.
     *
     * @Route("/{id}/edit", name="question_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Topic $question)
    {
        $editForm = $this->createForm('AppBundle\Form\QuestionType', $question);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {

            $question->setDateEdited(new \DateTime());

            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('question_edit', array('id' => $question->getId()));
        }

        return $this->render('question/edit.html.twig', array(
            'question' => $question,
            'edit_form' => $editForm->createView(),
        ));
    }


    /**
     *
     * @Route("up_vote/answer/{answer}/{vote}}", name="up_vote_answer")
     * @Method({"GET", "POST"})
     */
    public function upvoteAnswerAction(Request $request,$answer, $vote)
    {
        $em = $this->getDoctrine()->getManager();
        $objAnswer = $em->getRepository('AppBundle:Answer')->findOneBy(['id' => $answer]);

        $rating = new Rating();

        $rating->setVote($vote);
        $rating->setAnswer($objAnswer);
        $rating->setUser($this->getUser());

        $em->persist($rating);
        $em->flush();

        $referer = $request->headers->get('referer'); // redirect to last page
        return $this->redirect($referer);
    }

    /**
     *
     * @Route("up_vote/question/{question}/{vote}}", name="up_vote_question")
     * @Method({"GET", "POST"})
     */
    public function upvoteQuestionAction(Request $request,$question, $vote)
    {
        $em = $this->getDoctrine()->getManager();
        $objQuestion= $em->getRepository('Topic')->findOneBy(['id' => $question]);

        $rating = new Rating();
        $rating->setVote($vote);
        $rating->setUser($this->getUser());
        $rating->setQuestion($objQuestion);

        $em->persist($rating);
        $em->flush();

        $referer = $request->headers->get('referer'); // redirect to last page
        return $this->redirect($referer);
    }

}
