<?php declare(strict_types=1);

namespace ThiagoAlvesPHP;

use Statickidz\GoogleTranslate;

class Translator
{
    const PT = 'pt';
    const EN = 'en';

    /** @var GoogleTranslate */
    private $translator;

    public function __construct(GoogleTranslate $translator)
    {
        $this->translator = $translator;
    }

    public function translate(string $target, string $text): string
    {
        $source = $this->getSourceFor($target);
        return $this->translator->translate($source, $target, $text);
    }

    private function getSourceFor(string $target): string
    {
        switch ($target) {
            case self::PT:
                return self::EN;

            case self::EN:
            default:
                return self::PT;
        }
    }
}