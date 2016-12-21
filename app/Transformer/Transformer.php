<?php

namespace App\Transformer;

use League\Fractal\Manager;
use League\Fractal\Resource;

class Transformer
{
	/**
	 * Transform collection
	 *
	 */
	public function sendCollectionToTransformer($rawCollection, $transformerController)
	{
		$fractal = new Manager();
        $transformData = new Resource\Collection($rawCollection, $transformerController);

        $data = json_decode($fractal->createData($transformData)->toJson());

        return $data;
	}

	/*
	 * Transform item
	 *
	 */
	public function sendItemToTransformer($rawCollection, $transformerController)
	{
		$fractal = new Manager();
        $transformData = new Resource\Item($rawCollection, $transformerController);

        $data = json_decode($fractal->createData($transformData)->toJson());

        return $data;
	}
}