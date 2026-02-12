<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class GamingImageService
{
    private const CACHE_DURATION = 86400; // 24 hours

    /**
     * Get gaming-related image URL from Unsplash API
     */
    public function getGamingImage(string $query = 'gaming'): string
    {
        $cacheKey = "gaming_image_{$query}";
        
        return Cache::remember($cacheKey, self::CACHE_DURATION, function () use ($query) {
            // Try Unsplash API first
            $imageUrl = $this->getFromUnsplash($query);
            
            if ($imageUrl) {
                return $imageUrl;
            }
            
            // Fallback to Pixabay API
            return $this->getFromPixabay($query) ?? $this->getFallbackImage($query);
        });
    }

    /**
     * Get category-specific gaming image
     */
    public function getCategoryImage(string $category): string
    {
        $categoryQueries = [
            'Gaming Desktops' => 'gaming pc computer setup',
            'Gaming Laptops' => 'gaming laptop',
            'Mechanical Keyboards' => 'mechanical keyboard rgb',
            'Gaming Mice' => 'gaming mouse',
            'Gaming Chairs' => 'gaming chair',
            'Headsets & Audio' => 'gaming headset',
            'Monitors' => 'gaming monitor',
            'Graphics Cards' => 'graphics card gpu',
            'Processors' => 'processor cpu',
            'Gaming Consoles' => 'gaming console',
            'Controllers' => 'gaming controller',
            'Gaming Accessories' => 'gaming accessories',
            'VR Equipment' => 'virtual reality headset',
            'Gaming Desks' => 'gaming desk setup',
            'Lighting' => 'rgb lighting gaming',
        ];

        $query = $categoryQueries[$category] ?? 'gaming';
        return $this->getGamingImage($query);
    }

    /**
     * Get product-specific gaming image
     */
    public function getProductImage(string $productName, string $category): string
    {
        $productQueries = [
            'RTX' => 'nvidia rtx graphics card',
            'Intel Core i9' => 'intel processor cpu',
            'AMD Ryzen' => 'amd processor cpu',
            'ASUS ROG' => 'asus rog laptop',
            'MSI' => 'msi gaming laptop',
            'Razer Blade' => 'razer blade laptop',
            'Mechanical RGB' => 'rgb mechanical keyboard',
            'Gaming Mouse' => 'gaming mouse rgb',
            'Ergonomic Gaming Chair' => 'ergonomic gaming chair',
            'Racing Style Gaming Chair' => 'racing gaming chair',
            'Premium Gaming Chair' => 'luxury gaming chair',
            '7.1 Gaming Headset' => 'gaming headset 7.1',
            'Wireless Gaming Headset' => 'wireless gaming headset',
            'Professional Gaming Headset' => 'professional gaming headset',
            '4K Gaming Monitor' => '4k gaming monitor',
            '144Hz Gaming Monitor' => '144hz gaming monitor',
            'Ultra-wide Gaming Monitor' => 'ultrawide gaming monitor',
        ];

        foreach ($productQueries as $keyword => $query) {
            if (stripos($productName, $keyword) !== false) {
                return $this->getGamingImage($query);
            }
        }

        return $this->getCategoryImage($category);
    }

    private function getFromUnsplash(string $query): ?string
    {
        $accessKey = config('gaming-images.unsplash.access_key');
        
        if (!$accessKey) {
            return null;
        }

        try {
            $response = Http::get(config('gaming-images.unsplash.base_url') . '/search/photos', [
                'query' => $query,
                'per_page' => 1,
                'orientation' => 'landscape',
                'client_id' => $accessKey,
            ]);

            if ($response->successful() && !empty($response->json('results'))) {
                return $response->json('results.0.urls.regular');
            }
        } catch (\Exception $e) {
            Log::error('Unsplash API error: ' . $e->getMessage());
        }

        return null;
    }

    private function getFromPixabay(string $query): ?string
    {
        $apiKey = config('gaming-images.pixabay.api_key');
        
        if (!$apiKey) {
            return null;
        }

        try {
            $response = Http::get(config('gaming-images.pixabay.base_url'), [
                'key' => $apiKey,
                'q' => $query,
                'per_page' => 1,
                'image_type' => 'photo',
                'orientation' => 'horizontal',
                'category' => 'computers',
            ]);

            if ($response->successful() && !empty($response->json('hits'))) {
                return $response->json('hits.0.largeImageURL');
            }
        } catch (\Exception $e) {
            Log::error('Pixabay API error: ' . $e->getMessage());
        }

        return null;
    }

    private function getFallbackImage(string $query): string
    {
        // Use reliable placeholder images with gaming themes
        $gamingImages = [
            'gaming' => 'https://picsum.photos/seed/gaming-setup/800/600',
            'gamingpccomputersetup' => 'https://picsum.photos/seed/gaming-pc-rig/800/600',
            'gaminglaptop' => 'https://picsum.photos/seed/gaming-laptop/800/600',
            'mechanicalkeyboardrgb' => 'https://picsum.photos/seed/rgb-mechanical-keyboard/800/600',
            'gamingmouse' => 'https://picsum.photos/seed/gaming-mouse-rgb/800/600',
            'gamingchair' => 'https://picsum.photos/seed/gaming-chair-pro/800/600',
            'gamingheadset' => 'https://picsum.photos/seed/gaming-headset-71/800/600',
            'gamingmonitor' => 'https://picsum.photos/seed/gaming-monitor-4k/800/600',
            'graphicscardgpu' => 'https://picsum.photos/seed/nvidia-rtx-4090/800/600',
            'processorcpu' => 'https://picsum.photos/seed/intel-core-i9/800/600',
            'gamingconsole' => 'https://picsum.photos/seed/playstation-5/800/600',
            'gamingcontroller' => 'https://picsum.photos/seed/xbox-controller/800/600',
            'gamingaccessories' => 'https://picsum.photos/seed/gaming-gear-rgb/800/600',
            'virtualrealityheadset' => 'https://picsum.photos/seed/oculus-quest-2/800/600',
            'gamingdesksetup' => 'https://picsum.photos/seed/battle-station/800/600',
            'rgblightinggaming' => 'https://picsum.photos/seed/rgb-lighting-setup/800/600',
            'nvidiartxgraphicscard' => 'https://picsum.photos/seed/geforce-rtx-3080/800/600',
            'intelprocessorcpu' => 'https://picsum.photos/seed/amd-ryzen-9/800/600',
            'amdprocessorcpu' => 'https://picsum.photos/seed/cpu-processor-gaming/800/600',
            'asusroglaptop' => 'https://picsum.photos/seed/asus-republic-gamers/800/600',
            'msigaminglaptop' => 'https://picsum.photos/seed/msi-gaming-laptop/800/600',
            'razerbladelaptop' => 'https://picsum.photos/seed/razer-blade-15/800/600',
            'luxurygamingchair' => 'https://picsum.photos/seed/herman-miller-gaming/800/600',
            'racinggamingchair' => 'https://picsum.photos/seed/racing-simulator-seat/800/600',
            '4kgamingmonitor' => 'https://picsum.photos/seed/4k-gaming-display/800/600',
            '144hzgamingmonitor' => 'https://picsum.photos/seed/144hz-gaming-monitor/800/600',
            'ultrawidegamingmonitor' => 'https://picsum.photos/seed/ultrawide-gaming/800/600',
            'gamingheadset7.1' => 'https://picsum.photos/seed/surround-sound-headset/800/600',
            'wirelessgamingheadset' => 'https://picsum.photos/seed/wireless-gaming-audio/800/600',
            'professionalgamingheadset' => 'https://picsum.photos/seed/esports-headset-pro/800/600',
        ];

        $seed = strtolower(str_replace([' ', '&', '.'], '', $query));
        
        // Try exact match first
        if (isset($gamingImages[$seed])) {
            return $gamingImages[$seed];
        }
        
        // Try partial matches for common gaming terms
        foreach ($gamingImages as $key => $image) {
            if (strpos($seed, str_replace([' ', '&', '.'], '', $key)) !== false || 
                strpos(str_replace([' ', '&', '.'], '', $key), $seed) !== false) {
                return $image;
            }
        }
        
        // Default to general gaming image
        return $gamingImages['gaming'];
    }
}
