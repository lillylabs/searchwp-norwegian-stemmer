<?php

require('src/NorwegianStemmer.php');

class NorwegianStemmerUnitTest extends PHPUnit_Framework_TestCase
{
    public function testStemming()
    {
        $handle = fopen("test/fixtures.txt", "r");
        if ($handle) {
            while (($line = fgets($handle)) !== false) {
                $words = preg_split('/\s+/', trim($line));
                $this->assertEquals($words[1], NorwegianStemmer::Stem($words[0]));
            }
        } else {
            echo 'Error opening the file';
            return -1;
        }

        fclose($handle);
    }
}

?>
