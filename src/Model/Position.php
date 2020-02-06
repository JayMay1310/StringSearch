<?php
namespace StringSearch\Model;


class Position
{
    private $_row;
    private $_index;

    public function setRow($row)
    {
        $this->_row = $row;
    }
    public function setIndex($index)
    {
        $this->_index = $index;
    }

    public function getData()
    {
        return "Совпадение найдено в строке - {$this->_row}, позиций - {$this->_index} ";
    }

}


?>