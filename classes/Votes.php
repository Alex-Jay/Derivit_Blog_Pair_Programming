<?php
/**
 * Description of votes
 *
 * @author Jordan
 */
class Votes 
{
    private $vote_id, $post_id, $user_id, $has_voted;
    
    function __construct($vote_id, $post_id, $user_id, $has_voted) 
    {
        $this->vote_id = $vote_id;
        $this->post_id = $post_id;
        $this->user_id = $user_id;
        $this->has_voted = $has_voted;
    }
    
    function getVote_id() 
    {
        return $this->vote_id;
    }

    function getPost_id()
    {
        return $this->post_id;
    }

    function getUser_id()
    {
        return $this->user_id;
    }

    function getHas_voted()
    {
        return $this->has_voted;
    }

    function setVote_id($vote_id)
    {
        $this->vote_id = $vote_id;
    }

    function setPost_id($post_id)
    {
        $this->post_id = $post_id;
    }

    function setUser_id($user_id)
    {
        $this->user_id = $user_id;
    }

    function setHas_voted($has_voted) 
    {
        $this->has_voted = $has_voted;
    }
    
    public function __toString() 
    {
        return "Vote ID: $this->vote_id + "
                . "\nPost ID: $this->post_id +"
                . "\nUser ID: $this->user_id +"
                . "\Has Voted: $this->has_voted + \n";
    }



}
