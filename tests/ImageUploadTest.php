<?php

namespace ImageUpload\Tests;

use Orchestra\Testbench\TestCase;
use ImageUpload\ImageUploadServiceProvider;

class ImageUploadTest extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [ImageUploadServiceProvider::class];
    }

    /** @test */
    public function it_can_upload_images()
    {


        
        // Add your test implementation here
    }
}
