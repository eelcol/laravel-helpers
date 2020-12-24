<?php

namespace Eelcol\LaravelHelpers\Tests\Unit;

use Eelcol\LaravelHelpers\Tests\TestCase;

class HelperFunctionsTest extends TestCase
{
	/** @test */
	function test_safe_array_helper()
	{
		$this->assertEquals(
			safe_array(null, 'key1', 'key2'),
			null
		);

		$this->assertEquals(
			safe_array(false, 'key1', 'key2'),
			null
		);

		$this->assertEquals(
			safe_array(['key1' => 123], 'key1', 'key2'),
			null
		);

		$this->assertEquals(
			safe_array(['key1' => ['key2' => 456]], 'key1', 'key2'),
			456
		);

		$this->assertEquals(
			safe_array(['key1' => ['key2' => 456]], 'key1'),
			['key2' => 456]
		);
	}

	/** @test */
	function test_safe_in_array_helper()
	{
		$this->assertTrue(safe_in_array('key', ['val', 'key']));
		$this->assertFalse(safe_in_array('key', ['val']));
	}

	/** @test */
	function test_id_in_collection_helper()
	{
		$collection = collect([
			[
				'id' => 1
			],
			[
				'id' => 2
			],
			[
				'id' => 3
			]
		]);

		$this->assertTrue(id_in_collection(1, $collection));
		$this->assertTrue(id_in_collection(2, $collection));
		$this->assertTrue(id_in_collection(3, $collection));
		$this->assertFalse(id_in_collection(4, $collection));

		$this->assertFalse(id_in_collection(1, collect()));
	}
}