<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity(repositoryClass="App\Repository\CourseRepository")
 */

class Course
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * @return mixed
     * @ORM\Column(type="string",length=100,unique=true)
     */
    private $title;
    /**
     * @return mixed
     * @ORM\Column(type="text")
     */
    private $description;

    /**
    *@ORM\Column(type="string")
    * @Assert\NotBlank(message="Please, upload the product image as a png/jpeg file.")
    * @Assert\File(mimeTypes={ "image/png", "image/jpeg" })
    */
    private $image;

    /**
    * @return mixed
    * @ORM\Column(type="float")
    */
    private $price;


      //Getters and Setters
    public function getId()
    {
        return $this->id;
    }
    public function getTitle()
    {
        return $this->title;
    }
    public function getDescription()
    {
        return $this->description;
    }
    public function getImage()
    {
        return $this->image;
    }
    public function getPrice()
    {
        return $this->price;
    }
    public function setId($id)
    {
        $this->id=$id;
    }
    public function setTitle($title)
    {
        $this->title=$title;
    }
    public function setDescription($description)
    {
        $this->description=$description;
    }
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }
        public function setPrice($price)
    {
        $this->price=$price;
    }
    public function __toString()
    {
        return $this->id . ': ' . $this->getImage();
    }

}