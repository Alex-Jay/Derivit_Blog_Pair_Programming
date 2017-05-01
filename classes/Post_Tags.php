<?php
/**
 * Description of post_tags
 *
 * @author Jordan
 */
class Post_Tags 
{
    private $post_tag_id, $post_id, $tag_id;
    
    function __construct($post_tag_id, $post_id, $tag_id) 
    {
        $this->post_tag_id = $post_tag_id;
        $this->post_id = $post_id;
        $this->tag_id = $tag_id;
    }
    
    function getPost_tag_id() 
    {
        return $this->post_tag_id;
    }

    function getPost_id()
    {
        return $this->post_id;
    }

    function getTag_id() 
    {
        return $this->tag_id;
    }

    function setPost_tag_id($post_tag_id) 
    {
        $this->post_tag_id = $post_tag_id;
    }

    function setPost_id($post_id) 
    {
        $this->post_id = $post_id;
    }

    function setTag_id($tag_id) 
    {
        $this->tag_id = $tag_id;
    }
    
    public function __toString() 
    {
        return "Post Tag ID: $this->post_tag_id + "
                . "\nPost ID: $this->post_id +"
                . "\nTag ID: $this->tag_id + \n";
    }



}
