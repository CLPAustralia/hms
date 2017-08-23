<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

use AppBundle\Entity\Diary;

class DiaryType extends AbstractType
{
  public function buildForm(FormBuilderInterface $builder, array $options)
  {
    $builder
      ->add('diaryDate', DateTimeType::class, ['label' => 'label.diary.date'])
      ->add('weather', null, ['label' => 'label.diary.weather'])
      ->add('title', null, ['label' => 'label.diary.title'])
      ->add('author', null, ['label' => 'label.diary.author'])
      ->add('content', null, ['label' => 'label.diary.content']);
  }

  public function configureOptions(OptionsResolver $resolver)
  {
    $resolver->setDefaults(['data_class' => Diary::class]);
  }
}
