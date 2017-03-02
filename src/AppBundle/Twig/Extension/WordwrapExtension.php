<?php

namespace AppBundle\Twig\Extension;

class WordwrapExtension extends \Twig_Extension
{
    public function getFilters()
    {
        return [
            new \Twig_SimpleFilter('wordwrap', [$this, 'wordwrap'])
        ];
    }

    public function wordwrap($text, $charCount = 42)
    {
        return wordwrap($text, $charCount);
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'wordwrap';
    }
}
