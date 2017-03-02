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
