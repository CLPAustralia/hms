<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Diary
 *
 * @ORM\Table(name="diary")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DiaryRepository")
 */
class Diary
{

  const NUM_ITEMS = 10;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="diaryDate", type="datetime")
     */
    private $diaryDate;

    /**
     * @var string
     *
     * @ORM\Column(name="weather", type="string", length=255)
     */
    private $weather;

    /**
     * @var string
     *
     * @ORM\Column(name="author", type="string", length=255)
     */
    private $author;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="string", length=255)
     */
    private $content;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set diaryDate
     *
     * @param \DateTime $diaryDate
     *
     * @return Diary
     */
    public function setDiaryDate($diaryDate)
    {
        $this->diaryDate = $diaryDate;

        return $this;
    }

    /**
     * Get diaryDate
     *
     * @return \DateTime
     */
    public function getDiaryDate()
    {
        return $this->diaryDate;
    }

    /**
     * Set weather
     *
     * @param string $weather
     *
     * @return Diary
     */
    public function setWeather($weather)
    {
        $this->weather = $weather;

        return $this;
    }

    /**
     * Get weather
     *
     * @return string
     */
    public function getWeather()
    {
        return $this->weather;
    }

    /**
     * Set author
     *
     * @param string $author
     *
     * @return Diary
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return string
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set content
     *
     * @param string $content
     *
     * @return Diary
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }
}

