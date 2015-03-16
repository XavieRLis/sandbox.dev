<?php
namespace Xavierlis\CoreBundle\Listener;

use Gedmo\Sluggable\SluggableListener as BaseSluggableListener;
use Gedmo\Sluggable\Util\Urlizer;

class SluggableListener extends BaseSluggableListener
{
    public function __construct(){
        $this->setTransliterator(array($this, 'transliterate'));
    }

    public function transliterate($text, $separator = '-')
    {
        $convertTable = array(
            'а' => 'a',  'б' => 'b',   'в' => 'v',  'г' => 'g',  'д' => 'd',
            'е' => 'e',  'ё' => 'e',   'ж' => 'zh', 'з' => 'z',  'и' => 'i',
            'й' => 'j',  'к' => 'k',   'л' => 'l',  'м' => 'm',  'н' => 'n',
            'о' => 'o',  'п' => 'p',   'р' => 'r',  'с' => 's',  'т' => 't',
            'у' => 'u',  'ф' => 'f',   'х' => 'h',  'ц' => 'ts', 'ч' => 'ch',
            'ш' => 'sh', 'щ' => 'sch', 'ь' => '',   'ы' => 'y',  'ъ' => '',
            'э' => 'e',  'ю' => 'yu',  'я' => 'ya'
        );
        $text = strtr(trim(mb_strtolower($text, 'UTF-8')), $convertTable);
        return Urlizer::urlize($text, $separator);
    }
}