<?php
namespace StringSearch;

use StringSearch\Model\Position;

interface SearchBuilderInterface
{
    public function setSource(string $file): SearchBuilderInterface;    
    public function findSubstring(string $search): SearchBuilderInterface; 
    public function filter(array $param): SearchBuilderInterface; 
    public function getValue(): Position; 
}   

?>