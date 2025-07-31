<?php
// Asset Generation Script for WafiTechParts
// This script helps organize and create placeholder assets

// Create directories if they don't exist
$directories = [
    'assets/images',
    'assets/videos',
    'assets/images/products',
    'assets/images/thumbnails'
];

foreach ($directories as $dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
        echo "Created directory: $dir\n";
    }
}

// List of required product images based on database
$product_images = [
    // CPUs
    'cpu_i3_12100f.jpg',
    'cpu_i5_12400f.jpg', 
    'cpu_i7_12700f.jpg',
    'cpu_i9_12900f.jpg',
    'cpu_ryzen5_5600x.jpg',
    'cpu_ryzen7_5800x.jpg',
    'cpu_ryzen9_5900x.jpg',
    
    // GPUs
    'gpu_rtx_3060.jpg',
    'gpu_rtx_3070.jpg',
    'gpu_rtx_3080.jpg',
    'gpu_rtx_3090.jpg',
    'gpu_rx_6600.jpg',
    'gpu_rx_6700xt.jpg',
    'gpu_rx_6800xt.jpg',
    
    // Motherboards
    'mobo_msi_b660m.jpg',
    'mobo_asus_b660f.jpg',
    'mobo_gigabyte_z690.jpg',
    'mobo_asus_z690e.jpg',
    'mobo_msi_b550.jpg',
    'mobo_asus_b550f.jpg',
    'mobo_gigabyte_x570.jpg',
    'mobo_asus_x570e.jpg',
    
    // RAM
    'ram_8gb_ddr4.jpg',
    'ram_16gb_ddr4.jpg',
    'ram_32gb_ddr4.jpg',
    'ram_64gb_ddr4.jpg',
    'ram_16gb_ddr5.jpg',
    'ram_32gb_ddr5.jpg',
    
    // Storage
    'ssd_500gb_sata.jpg',
    'ssd_1tb_sata.jpg',
    'ssd_500gb_nvme.jpg',
    'ssd_1tb_nvme.jpg',
    'ssd_2tb_nvme.jpg',
    'hdd_2tb.jpg',
    'hdd_4tb.jpg',
    
    // Power Supplies
    'psu_650w_bronze.jpg',
    'psu_750w_gold.jpg',
    'psu_850w_gold.jpg',
    'psu_1000w_platinum.jpg',
    
    // Cases
    'case_mid_tower.jpg',
    'case_gaming.jpg',
    'case_premium.jpg',
    
    // Cooling
    'cooling_stock.jpg',
    'cooling_air.jpg',
    'cooling_liquid.jpg',
    'cooling_premium.jpg'
];

// Additional site images
$site_images = [
    'logo.png',
    'favicon.ico',
    'apple-touch-icon.png',
    'hero-bg.jpg',
    'about-bg.jpg',
    'contact-bg.jpg'
];

// Video files
$videos = [
    'pc_building_guide.mp4',
    'product_review.mp4',
    'company_overview.mp4'
];

echo "=== WafiTechParts Asset Generation ===\n\n";

echo "Required Product Images (" . count($product_images) . "):\n";
foreach ($product_images as $image) {
    $path = "assets/images/products/$image";
    if (!file_exists($path)) {
        echo "❌ Missing: $path\n";
    } else {
        echo "✅ Found: $path\n";
    }
}

echo "\nRequired Site Images (" . count($site_images) . "):\n";
foreach ($site_images as $image) {
    $path = "assets/images/$image";
    if (!file_exists($path)) {
        echo "❌ Missing: $path\n";
    } else {
        echo "✅ Found: $path\n";
    }
}

echo "\nRequired Videos (" . count($videos) . "):\n";
foreach ($videos as $video) {
    $path = "assets/videos/$video";
    if (!file_exists($path)) {
        echo "❌ Missing: $path\n";
    } else {
        echo "✅ Found: $path\n";
    }
}

echo "\n=== Instructions ===\n";
echo "1. Download or create the missing images listed above\n";
echo "2. Place product images in: assets/images/products/\n";
echo "3. Place site images in: assets/images/\n";
echo "4. Place videos in: assets/videos/\n";
echo "5. Recommended image sizes:\n";
echo "   - Product images: 400x400px\n";
echo "   - Logo: 200x80px\n";
echo "   - Hero background: 1920x1080px\n";
echo "6. Video formats: MP4, WebM, or OGV\n";
echo "7. Keep file sizes reasonable (< 2MB for images, < 50MB for videos)\n";

echo "\n=== Quick Setup ===\n";
echo "You can use placeholder services like:\n";
echo "- https://picsum.photos/400/400 for product images\n";
echo "- https://via.placeholder.com/400x400 for simple placeholders\n";
echo "- https://www.pexels.com/ for free stock photos\n";
echo "- https://pixabay.com/ for free videos\n";

echo "\n=== Database Update ===\n";
echo "After adding images, update the database with:\n";
echo "UPDATE products SET image = CONCAT('products/', image) WHERE image NOT LIKE 'products/%';\n";

echo "\nScript completed!\n";
?> 