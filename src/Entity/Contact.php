<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class Contact
{

  /**
   * @var string|null
   * @Assert\NotBlank()
   * @Assert\Length(min=5, max=100)
   */
  private $name;

  /**
   * @var string|null
   * @Assert\NotBlank()
   * @Assert\Regex(
   *  pattern="/[0-9]{10}/"
   * )
   */
  private $phone;

  /**
   * @var string|null
   * @Assert\NotBlank()
   * @Assert\Email()
   */
  private $email;

  /**
   * @var string|null
   * @Assert\NotBlank()
   * @Assert\Length(min=10)
   */
  private $message;


  /**
   * @return null|string
   */
  public function getName(): ?string
  {
    return $this->name;
  }

  /**
   * @param null|string $name
   * @return Contact
   */
  public function setName(?string $name): Contact
  {
    $this->name = $name;
    return $this;
  }


  /**
   * @return null|string
   */
  public function getPhone(): ?string
  {
    return $this->phone;
  }

  /**
   * @param null|string $phone
   * @return Contact
   */
  public function setPhone(?string $phone): Contact
  {
    $this->phone = $phone;
    return $this;
  }

  /**
   * @return null|string
   */
  public function getEmail(): ?string
  {
    return $this->email;
  }

  /**
   * @param null|string $email
   * @return Contact
   */
  public function setEmail(?string $email): Contact
  {
    $this->email = $email;
    return $this;
  }

  /**
   * @return null|string
   */
  public function getMessage(): ?string
  {
    return $this->message;
  }

  /**
   * @param null|string $message
   * @return Contact
   */
  public function setMessage(?string $message): Contact
  {
    $this->message = $message;
    return $this;
  }
}
