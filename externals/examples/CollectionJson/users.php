<?php

include_once __DIR__ . '/_autoload.php';

// build a collection of users
function generateAUserItem($id)
{
	// load user
	$userEntity = UserEntity::createRandomly($id);

	// transform it to item
	$userItem = new UserItem($userEntity);
	$userLink = new \Grummfy\Api\ResponseFormatter\Container\Link();
	$userLink
		->setRelation('href')
		->setUri('/user.php?id=' . $userEntity->getId());
	$userItem->setSelfLink($userLink);
	return $userItem;
}

$paginate = (isset($_GET['page']));

$i = 25;
if (!$paginate)
{
	$itemCollection = new \Grummfy\Api\ResponseFormatter\Container\ItemCollection();
}
else
{
	$limit = 10;
	$itemCollection = new \Grummfy\Api\ResponseFormatter\Container\PaginateItemCollection();
	$itemCollection->setPageAndLimit(1, $limit);
	$itemCollection->setTotal($i);
	$i = $limit;
}

while($i-- > 0)
{
	$item = generateAUserItem(1000 - $i);
	$itemCollection->addItem($item);
}

$link = new \Grummfy\Api\ResponseFormatter\Container\Link();
$link
	->setRelation('href')
	// this is bad, don't do this to production, this is here as example
	// never trust external input, always valid and filter it!
	->setUri($_SERVER['REQUEST_URI']);
$itemCollection->setSelfLink($link);

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
$collection->setSelfLink($itemCollection->getSelfLink());
$builder->setRepresentation($collection);
$builder->setVersion('1.0');

if ($paginate)
{
	// adding pagination links relation
	$links = $itemCollection->getRelationLinks(function ($page) use ($limit)
	{
		return $_SERVER['REQUEST_URI'] . '?page=' . $page . '&limit=' . $limit;
	});

	$builder->setItemCollection(); // $links
}

// now that we are ready for the specification of the collection+json format
// we add the usefull stuff
$builder->setItemCollection($itemCollection);

// render the result
//header('Content-Type: ' . $format->getMimeType());
echo $render->render();
