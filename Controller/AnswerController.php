<?php

namespace Egulias\QuizBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller,
    Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class AnswerController extends Controller
{
    /**
     * Answers listing
     * @Route("/quizes/answers", name="egulias_quiz_answers")
     */
    public function answerListAction()
    {
        $em = $this->get('doctrine.orm.entity_manager');
        $answers = $em->getRepository('EguliasQuizBundle:Answer')->findAll();

        return $this->render('EguliasQuizBundle:Answer:index.html.twig', array('answers' => $answers));
    }

    /**
     * Answers listing
     * @Route("/quiz/{id}/answers", name="egulias_selected_quiz_answers", requirements={"id"="\d+"})
     */
    public function quizAnswerListAction($id)
    {
        $em = $this->get('doctrine.orm.entity_manager');
        $answers = $em->getRepository('EguliasQuizBundle:Answer')->findByQuiz($id);

        return $this->render('EguliasQuizBundle:Answer:index.html.twig', array('answers' => $answers));
    }
}
