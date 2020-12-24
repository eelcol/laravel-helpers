<?php

namespace Eelcol\LaravelHelpers\Tests\Unit;

use Eelcol\LaravelHelpers\Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class SaveUploadedFileToTheCloud extends TestCase
{
	/** @test */
	function it_should_save_to_the_cloud()
	{
		$file = UploadedFile::fake()->image('photo1.jpg');

		Storage::shouldReceive('cloud')->andReturnSelf();
		Storage::shouldReceive('putFileAs')->with('files', $file, \Mockery::any(), ['visibility' => 'public']);
		Storage::shouldReceive('url')->andReturn('https://some-url-to-the-cloud/files/photo1.jpg');

		$cloud_url = $file->saveToCloud('files');

		$this->assertEquals($cloud_url, 'https://some-url-to-the-cloud/files/photo1.jpg');
	}

	/** @test */
	public function it_should_save_to_given_disk()
	{
		$file = UploadedFile::fake()->image('photo1.jpg');

		Storage::shouldReceive('disk')->with('some-disk')->andReturnSelf();
		Storage::shouldReceive('putFileAs')->with('files', $file, \Mockery::any(), ['visibility' => 'public']);
		Storage::shouldReceive('url')->andReturn('https://some-url-to-the-cloud/files/photo1.jpg');

		$cloud_url = $file->saveToCloud('files', 'some-disk');

		$this->assertEquals($cloud_url, 'https://some-url-to-the-cloud/files/photo1.jpg');
	}

	/** @test */
	public function it_should_save_to_local_and_return_relative_path()
	{
		$file = UploadedFile::fake()->image('photo1.jpg');
		$return_url = config('app.url') . "/files/photo1.jpg";

		Storage::shouldReceive('disk')->with('local')->andReturnSelf();
		Storage::shouldReceive('putFileAs')->with('files', $file, \Mockery::any(), ['visibility' => 'public']);
		Storage::shouldReceive('url')->andReturn($return_url);

		$cloud_url = $file->saveToCloud('files', 'local');

		$this->assertEquals($cloud_url, '/files/photo1.jpg');
	}
}