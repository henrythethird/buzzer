<?php

namespace AppBundle\Twig\Extension;

class WordwrapExtension extends \Twig_Extension
{
    public function getFilters()
    {
        return [
            new \Twig_SimpleFilter('wordwrap', [$this, 'wordwrap']),
            new \Twig_SimpleFilter('repeat', [$this, 'repeat']),
        ];
    }

    /**
     * @param string $text
     * @param int $charCount
     * @return string
     */
    public function wordwrap($text, $charCount = 42)
    {
        return wordwrap($text, $charCount);
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
