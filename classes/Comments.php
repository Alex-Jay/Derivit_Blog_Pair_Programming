<?php
/**
 * Description of comments
 *
 * @author Jordan
 */
class Comments 
{
    private $comment_id, $post_id, $user_id, $comment_body, $comment_timestamp;
    
    function __construct($comment_id, $post_id, $user_id, $comment_body, $comment_timestamp) 
    {
        $this->comment_id = $comment_id;
        $this->post_id = $post_id;
        $this->user_id = $user_id;
        $this->comment_body = $comment_body;
        $this->comment_timestamp = $comment_timestamp;
    }
    
    function getComment_id() 
    {
        return $this->comment_id;
    }

    function getPost_id() 
    {
        return $this->post_id;
    }

    function getUser_id()
    {
        return $this->user_id;
    }

    function getComment_body() 
    {
        return $this->comment_body;
    }

    function getComment_timestamp() 
    {
        return $this->comment_timestamp;
    }

    function setComment_id($comment_id)
    {
        $this->comment_id = $comment_id;
    }

    function setPost_id($post_id) 
    {
        $this->post_id = $post_id;
    }

    function setUser_id($user_id) 
    {
        $this->user_id = $user_id;
    }

    function setComment_body($comment_body) 
    {
        $this->comment_body = $comment_body;
    }

    function setComment_timestamp($comment_timestamp) 
    {
        $this->comment_timestamp = $comment_timestamp;
    }
    
    public function __toString() 
    {
        return "Comment ID: $this->comment_id + "
                . "\nPost ID: $this->post_id +"
                . "\nUser ID: $this->user_id +"
                . "\nComment Body: $this->comment_body +"
                . "\nComment Timestamp: $this->comment_timestamp + \n";
    }
}
