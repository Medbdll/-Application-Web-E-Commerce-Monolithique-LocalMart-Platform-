<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Services\GamingImageService;

class GamingImageServiceTest extends TestCase
{
    public function test_get_gaming_image_returns_url()
    {
        $service = new GamingImageService();
        $imageUrl = $service->getGamingImage('gaming');
        
        $this->assertIsString($imageUrl);
        $this->assertNotEmpty($imageUrl);
        $this->assertStringContainsString('http', $imageUrl);
    }

    public function test_get_category_image_returns_url()
    {
        $service = new GamingImageService();
        $imageUrl = $service->getCategoryImage('Gaming Desktops');
        
        $this->assertIsString($imageUrl);
        $this->assertNotEmpty($imageUrl);
        $this->assertStringContainsString('http', $imageUrl);
    }

    public function test_get_product_image_returns_url()
    {
        $service = new GamingImageService();
        $imageUrl = $service->getProductImage('RTX 4090', 'Graphics Cards');
        
        $this->assertIsString($imageUrl);
        $this->assertNotEmpty($imageUrl);
        $this->assertStringContainsString('http', $imageUrl);
    }

    public function test_unknown_category_uses_gaming_fallback()
    {
        $service = new GamingImageService();
        $imageUrl = $service->getCategoryImage('Unknown Category');
        
        $this->assertIsString($imageUrl);
        $this->assertNotEmpty($imageUrl);
        $this->assertStringContainsString('http', $imageUrl);
    }

    public function test_unknown_product_uses_category_fallback()
    {
        $service = new GamingImageService();
        $imageUrl = $service->getProductImage('Unknown Product', 'Gaming Desktops');
        
        $this->assertIsString($imageUrl);
        $this->assertNotEmpty($imageUrl);
        $this->assertStringContainsString('http', $imageUrl);
    }
}
