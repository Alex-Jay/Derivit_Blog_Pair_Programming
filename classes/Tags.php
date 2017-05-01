<?php
/**
 * Description of Tags
 *
 * @author Jordan
 */
class Tags 
{
    private $tag_id, $tag_name;
    
    function __construct($tag_id, $tag_name) 
    {
        $this->tag_id = $tag_id;
        $this->tag_name = $tag_name;
    }
    
    function getTag_id()
    {
        return $this->tag_id;
    }

    function getTag_name() 
    {
        return $this->tag_name;
    }

    function setTag_id($tag_id) 
    {
        $this->tag_id = $tag_id;
    }

    function setTag_name($tag_name) 
    {
        $this->tag_name = $tag_name;
    }

    public function __toString() 
    {
        return "Tag ID: $this->tag_id + "
                . "\nTag Name: $this->tag_name + \n";
    }

}


