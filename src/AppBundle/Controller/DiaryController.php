<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Request;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

use AppBundle\Entity\Diary;
use AppBundle\Form\DiaryType;

/**
 * @Route("/diary")
 */
class DiaryController extends Controller
{
  
  /**
   * @Route("/", defaults={ "page": 1}, name="diary_index")
   * @Method("GET")
   */
  public function indexAction($page)
  {
    $diaries = $this->getDoctrine()->getRepository(Diary::class)->findLatest($page);
    return $this->render('diary/index.html.twig', ['diaries' => $diaries]);
  }

  /**
   * @Route("/{id}/edit")
   * @Method({"GET", "POST"})
   */
  public function editAction(Diary $diary, Request $request)
  {
    $em = $this->getDoctrine()->getManager();
    $editForm = $this->createForm(DiaryType::class, $diary);
    $editForm->handleRequest($request);
    if ($editForm->isSubmitted() && $editForm->isValid())
    {
      $em->flush();
      $this->addFlash('success', 'diary.update_successfully');
    }
    return $this->render('diary/edit.html.twig', ['diary' => $diary, 'edit_form' =>  $editForm->createView()]);
  }
}

