<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use AppBundle\Entity\Diary;

/**
 * @Route("/diary")
 */
class DiaryController extends Controller
{
  
  /**
   * @Route("/", defaults={ "page": 1}, name="diary_index")
   */
  public function indexAction($page)
  {
    $diaries = $this->getDoctrine()->getRepository(Diary::class)->findLatest($page);
    return $this->render("diary/index.html.twig", ['diaries' => $diaries]);
  }

}

