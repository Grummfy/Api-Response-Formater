<?php

include_once __DIR__ . '/_autoload.php';

// return a user
$id = isset($_GET['id'])? intval($_GET['id']) : null;
if (is_null($id))
{
	throw new UnexpectedValueException('Id parameter can\'t be empty!');
}

// load user
$userEntity = UserEntity::createRandomly($id);

// transform it to item
$userItem = new UserItem($userEntity);
$userLink = new \Grummfy\Api\ResponseFormatter\Container\Link();
$userLink
	->setRelation('href')
	// this is bad, don't do this to production, this is here as example
	// never trust external input, always valid and filter it!
	->setUri($_SERVER['REQUEST_URI']);
$userItem->setSelfLink($userLink);

//
// preparation of output
//
// we use the factory of the collection+json format
$factory = new \Grummfy\Api\ResponseFormatter\CollectionJson\FormatterFactory();
$format = $factory->factoryFormat();
$render = $factory->factoryRender();
$wrapper = $factory->factoryFirstWrapper();
$builder = $factory->factoryBuilder($format, $wrapper);
$render->setBuilder($builder);

// specification for the collection+json
$collection = new \Grummfy\Api\ResponseFormatter\CollectionJson\CollectionRepresentation();
$collection->setSelfLink($userItem->getSelfLink());
$builder->setRepresentation($collection);
$builder->setVersion('1.0');


// now that we are ready for the specification of the collection+json format
// we add the usefull stuff
$builder->setItem($userItem);

// render the result
header('Content-Type: ' . $format->getMimeType());
echo $render->render();
