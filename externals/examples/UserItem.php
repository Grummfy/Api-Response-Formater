<?php

class UserItem extends \Grummfy\Api\ResponseFormatter\Container\AbstractItem
{
	/***
	 * @var UserEntity
	 */
	protected $_entity;

	public function __construct(UserEntity $userEntity)
	{
		$this->_entity = $userEntity;
	}

	/**
	 * @return array
	 */
	public function toArray()
	{
		return [
			'id'    => $this->_entity->getId(),
			'name'  => $this->_entity->getName(),
			'email' => $this->_entity->getEmail(),
			'role'  => $this->_entity->getRole()
		];
	}
}
