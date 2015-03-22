<?php

class UserEntity
{
	/**
	 * @var int
	 */
	protected $_id;

	/**
	 * @var string
	 */
	protected $_name;

	/**
	 * @var string
	 */
	protected $_role;

	/**
	 * @var string
	 */
	protected $_email;

	/**
	 * @return string
	 */
	public function getEmail()
	{
		return $this->_email;
	}

	/**
	 * @param string $email
	 */
	public function setEmail($email)
	{
		$this->_email = $email;
	}

	/**
	 * @return int
	 */
	public function getId()
	{
		return $this->_id;
	}

	/**
	 * @param int $id
	 */
	public function setId($id)
	{
		$this->_id = $id;
	}

	/**
	 * @return string
	 */
	public function getName()
	{
		return $this->_name;
	}

	/**
	 * @param string $name
	 */
	public function setName($name)
	{
		$this->_name = $name;
	}

	/**
	 * @return string
	 */
	public function getRole()
	{
		return $this->_role;
	}

	/**
	 * @param string $role
	 */
	public function setRole($role)
	{
		$this->_role = $role;
	}

	public static function create($id, $name, $email, $role)
	{
		$self = new self();
		$self->setEmail($email);
		$self->setId($id);
		$self->setName($name);
		$self->setRole($role);
		return $self;
	}

	public static function createRandomly($id = null)
	{
		$id = intval($id ?: substr(md5(uniqid()), 5, 10));

		$randomWord = function($length)
		{
			$alphaNumeric = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
			return substr(str_shuffle($alphaNumeric), 0, $length);
		};

		$randomPhrase = function($id) use ($randomWord)
		{
			$length = strlen($id) + 1;
			$words = mt_rand(1, $length);
			$string = array();
			while ($words-- > 0)
			{
				$string[] = $randomWord(mt_rand($length, mt_rand(5, 10)));
			}
			return implode('  ', $string);
		};

		return self::create($id, $randomPhrase($id), $randomWord(5) . '@' . $randomWord(5) . '.net', $randomPhrase($id));
	}
}
