<?php

namespace StringSearch;


class RegexQueryBuilder extends BaseQueryBuilder
{
    public function findSubstring(string $regex): SearchBuilderInterface
    {
        function file_lines($filename) {
            $file = fopen($filename, 'r');          
            while (!feof($file)) 
            {
                $buffer = fgets($file);
                yield $buffer;
            }             
            fclose($file);
        }     

        $index = 0;
        foreach (file_lines($this->_fileName) as $line) {
            $matches = [];
            if (!$this->correctRegexp($what)) {
                throw new Exception("what must be valid regexp, $what given");
            }
            if (preg_match($regex, $line, $matches, PREG_OFFSET_CAPTURE) === 1) {
                $this->_posititon->setIndex($matches[0]);
                $this->_posititon->setRow($matches[1]);
                return $this;
            }            
            $index++; 
        }

        return $this;
    }
    
    /**
     * Проверка регулярного выражения
     *
     * @param $regexp
     * @return false|int
     */
    private function correctRegexp($regexp)
    {
        return preg_match('/\/.+\//', $regexp);
    }

}
