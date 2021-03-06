<?php declare(strict_types=1);

namespace Model\Entity;

/**
 * @package Model\Entity
 */
class Token
{
    /**
     * @var string $id
     */
    private $id;

    /**
     * @var array $roles
     */
    private $roles = [];

    /**
     * @var \DateTime $creationDate
     */
    private $creationDate;

    /**
     * @var \DateTime
     */
    private $expirationDate;

    /**
     * @var array $data
     */
    private $data = [];

    public function __construct()
    {
        $this->expirationDate = new \DateTime();
        $this->creationDate   = new \DateTime();
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return $this
     */
    public function setId(string $id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return array
     */
    public function getRoles(): array
    {
        return $this->roles;
    }

    /**
     * @param string $roleName
     * @return bool
     */
    public function hasRole(string $roleName): bool
    {
        return in_array($roleName, $this->getRoles());
    }

    /**
     * @param \DateTime $currentDate
     * @return bool
     */
    public function isNotExpired(\DateTime $currentDate = null)
    {
        if (!$currentDate instanceof \DateTime) {
            $currentDate = new \DateTime();
        }

        return $this->getExpirationDate()->getTimestamp() >= $currentDate->getTimestamp();
    }

    /**
     * @return \DateTime
     */
    public function getCreationDate(): \DateTime
    {
        return $this->creationDate;
    }

    /**
     * @return \DateTime
     */
    public function getExpirationDate(): \DateTime
    {
        return $this->expirationDate;
    }

    /**
     * @param array $roles
     * @return Token
     */
    public function setRoles($roles)
    {
        $this->roles = $roles;
        return $this;
    }

    /**
     * @param \DateTime $creationDate
     * @return Token
     */
    public function setCreationDate(\DateTime $creationDate)
    {
        $this->creationDate = $creationDate;
        return $this;
    }

    /**
     * @param \DateTime $expirationDate
     * @return Token
     */
    public function setExpirationDate(\DateTime $expirationDate)
    {
        $this->expirationDate = $expirationDate;
        return $this;
    }

    /**
     * @param array $data
     * @return Token
     */
    public function setData(array $data)
    {
        $this->data = $data;
        return $this;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @return string[]
     */
    public function getTags(): array
    {
        return isset($this->data['tags']) && is_array($this->data['tags']) ? $this->data['tags'] : [];
    }

    /**
     * @return string[]
     */
    public function getAllowedMimeTypes(): array
    {
        return isset($this->data['mime_types']) && is_array($this->data['mime_types']) ? $this->data['mime_types'] : [];
    }
}
