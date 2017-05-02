<?php
/**
 * Class for all posts. used to display all posts in post.php. 
 *
 * @author Jordan
 */
class Posts 
{
    private $post_id, $user_id, $post_tag_id, $post_title, $post_body, $post_image, $post_timestamp;
    
    function __construct($post_id=NULL, $user_id=0, $post_tag_id=0, 
            $post_title="", $post_body="", $post_image="", $post_timestamp="") 
    {
        $this->post_id = $post_id;
        $this->user_id = $user_id;
        $this->post_tag_id = $post_tag_id;
        $this->post_title = $post_title;
        $this->post_body = $post_body;
        $this->post_image = $post_image;
        $this->post_timestamp = $post_timestamp;
    }
    
    function getPost_id() 
    {
        return $this->post_id;
    }

    function getUser_id() 
    {
        return $this->user_id;
    }

    function getPost_tag_id()
    {
        return $this->post_tag_id;
    }

    function getPost_title() 
    {
        return $this->post_title;
    }

    function getPost_body()
    {
        return $this->post_body;
    }

    function getPost_image()
    {
        return $this->post_image;
    }

    function getPost_timestamp() 
    {
        return $this->post_timestamp;
    }

    function setPost_id($post_id) 
    {
        $this->post_id = $post_id;
    }

    function setUser_id($user_id) 
    {
        $this->user_id = $user_id;
    }

    function setPost_tag_id($post_tag_id)
    {
        $this->post_tag_id = $post_tag_id;
    }

    function setPost_title($post_title)
    {
        $this->post_title = $post_title;
    }

    function setPost_body($post_body) 
    {
        $this->post_body = $post_body;
    }

    function setPost_image($post_image) 
    {
        $this->post_image = $post_image;
    }

    function setPost_timestamp($post_timestamp)
    {
        $this->post_timestamp = $post_timestamp;
    }
    
    public function __toString() 
    {
        return "Post ID: $this->post_id + "
                . "\nUser ID: $this->user_id +"
                . "\nPost Tag ID: $this->post_tag_id +"
                . "\nPost Title: $this->post_title +"
                . "\nPost Body: $this->post_body +"
                . "\nPost Image: $this->post_image +"
                . "\nPost Timestamp: $this->post_timestamp + \n";
    }




}
