<?php

namespace StringSearch;

use StringSearch\Model\Position;

class BaseQueryBuilder implements SearchBuilderInterface
{
    protected $_posititon;

    private $_config;
    private $_search;
    private $_fileName;
   
    public function __construct()
    {
        $this->reset();
    }

    public function setSource(string $file): SearchBuilderInterface
    {        
        if (!file_exists($file)) {
            throw new \InvalidArgumentException();
        }

        $this->_fileName = $file;
        return $this;
    }

    public function findSubstring(string $search): SearchBuilderInterface
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
            $position = strpos($line, $search);
            if ($position !== false) {
                $this->_posititon->setIndex($position);
                $this->_posititon->setRow($index);
                return $this;
            } 

            $index++; 
        }

        return $this;
    }

    public function filter(array $param): SearchBuilderInterface
    {

        return $this;
    }

    public function getValue(): Position
    {
        return $this->_posititon;

    }
    
    public function reset(): void
    {
        $this->_posititon = new Position;
    }
}
?>