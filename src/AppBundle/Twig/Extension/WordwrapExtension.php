<?php

namespace AppBundle\Twig\Extension;

use AppBundle\Service\FortuneService;

class WordwrapExtension extends \Twig_Extension
{
    private $fortune;

    public function __construct(FortuneService $fortune)
    {
        $this->fortune = $fortune;
    }

    public function getFilters()
    {
        return [
            new \Twig_SimpleFilter('wordwrap', [$this, 'wordwrap']),
            new \Twig_SimpleFilter('repeat', [$this, 'repeat']),
            new \Twig_SimpleFilter('dateFormat', [$this, 'dateFormat']),
            new \Twig_SimpleFilter('datetimeFormat', [$this, 'datetimeFormat']),
            new \Twig_SimpleFilter('daysUntil', [$this, 'daysUntil']),
        ];
    }

    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('fortune', [$this, 'fortune'])
        ];
    }

    public function fortune()
    {
        return $this->fortune->generate();
    }

    public function daysUntil(\DateTime $date = null)
    {
        return $date ? $date->diff(new \DateTime('today'))->days + 1 : "";
    }

    public function datetimeFormat(\DateTime $date = null)
    {
        return $date ? $date->format('d.m.Y H:i:s') : "";
    }

    public function dateFormat(\DateTime $date = null)
    {
        return $date ? $date->format('D, d.m.Y') : "";
    }

    /**
     * @param string $text
     * @param int $charCount
     * @return string
     */
    public function wordwrap($text, $charCount = 42)
    {
        return wordwrap(str_replace("\t", "    ", $text), $charCount);
    }

    /**
     * @param string $text
     * @param int $multiplier
     * @return string
     */
    public function repeat($text, $multiplier)
    {
        return str_repeat($text, $multiplier);
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'wordwrap';
    }
}
