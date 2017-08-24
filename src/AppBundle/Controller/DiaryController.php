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
     * @Route("/new", name="diary_new")
     * */  
    public function newAction(Request $request)
    {
        $diary = new Diary();
        $form = $this->createForm(DiaryType::class, $diary);
        $form->handleRequest($request);
        if ($form->isSubmitted() & $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($diary);
            $em->flush($diary);
            $this->addFlash('success', 'diary.added_successfully');
            return $this->redirectToRoute('diary_index');
        }
        return $this->render('diary/new.html.twig', ['diary' => $diary, 'form' => $form->createView()]);
    }
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
   * @Route("/{id}/edit", name="diary_edit")
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
      $this->addFlash('success', 'diary.updated_successfully');
    }
    $deleteForm = $this->createDeleteForm($diary);
    return $this->render(
      'diary/edit.html.twig', 
      [
        'diary' => $diary, 
        'edit_form' =>  $editForm->createView(), 
        'delete_form' => $deleteForm->createView()
      ]
    );
  }

  /**
   * @Route("/{id}", name="diary_delete")
   * @Method("DELETE")
   */
  public function deleteAction(Diary $diary, Request $request)
  {
    $form = $this->createDeleteForm($diary);
    $form->handleRequest($request);
    if ($form->isSubmitted() && $form->isValid()) {
      $em = $this->getDoctrine()->getManager();
      $em->remove($diary);
      $em->flush();
      $this->addFlash('success', 'diary.deleted_successfully');
    }
    return $this->redirectToRoute('diary_index');
  }

  public function createDeleteForm(Diary $diary)
  {
    return $this->createFormBuilder()
      ->setAction($this->generateUrl('diary_delete', ['id' => $diary->getId()]))
      ->setMethod('DELETE')
      ->getForm();
  }
}

