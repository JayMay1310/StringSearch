<?php

use PHPUnit\Framework\TestCase;

use prkt\lib\FileHelper;

class FileHelperTest extends TestCase
{
    private $file;
 
    protected function setUp() : void
    {
        $this->file = new FileHelper();
    }
 
    protected function tearDown() : void
    {
        $this->file = NULL;
    }
 
    public function testAdd() : void
    {
        $result = $this->file->add(1, 2);
        $this->assertEquals(3, $result);
    }
}

?>