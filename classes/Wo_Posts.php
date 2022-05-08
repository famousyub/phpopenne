<?php
namespace classes;

class Wo_Posts
{
    private $post_id ;
    private $postText ;
    private $postType;
    private $postFile ;
    private $postFeeling;
    private $user_id;
    
    
    
    /**
     * @return mixed
     */
    public function getUser_id()
    {
        return $this->user_id;
    }

    /**
     * @param mixed $user_id
     */
    public function setUser_id($user_id)
    {
        $this->user_id = $user_id;
    }

    /**
     * @return mixed
     */
    public function getPost_id()
    {
        return $this->post_id;
    }

    /**
     * @return mixed
     */
    public function getPostText()
    {
        return $this->postText;
    }

    /**
     * @return mixed
     */
    public function getPostType()
    {
        return $this->postType;
    }

    /**
     * @return mixed
     */
    public function getPostFile()
    {
        return $this->postFile;
    }

    /**
     * @return mixed
     */
    public function getPostFeeling()
    {
        return $this->postFeeling;
    }

    /**
     * @param mixed $post_id
     */
    public function setPost_id($post_id)
    {
        $this->post_id = $post_id;
    }

    /**
     * @param mixed $postText
     */
    public function setPostText($postText)
    {
        $this->postText = $postText;
    }

    /**
     * @param mixed $postType
     */
    public function setPostType($postType)
    {
        $this->postType = $postType;
    }

    /**
     * @param mixed $postFile
     */
    public function setPostFile($postFile)
    {
        $this->postFile = $postFile;
    }

    /**
     * @param mixed $postFeeling
     */
    public function setPostFeeling($postFeeling)
    {
        $this->postFeeling = $postFeeling;
    }

     function  __construct() {
        
    }
    
    
    
    
    
    
}

