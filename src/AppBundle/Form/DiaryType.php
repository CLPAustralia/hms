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
      ->add('diaryDate', DateTimeType::class, ['label' => 'label.diary_date'])
      ->add('weather', null, ['label' => 'label.weather'])
      ->add('title', null, ['label' => 'label.title'])
      ->add('author', null, ['label' => 'label.author'])
      ->add('content', null, ['label' => 'label.content']);
  }

  public function configureOptions(OptionsResolver $resolver)
  {
    $resolver->setDefaults(['data_class' => Diary::class]);
  }
}
