<?php
// Quick Placeholder Image Generator for WafiTechParts
// This script helps create placeholder images for all products

// Product images needed based on database
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

// Site images
$site_images = [
    'logo.png',
    'favicon.ico',
    'apple-touch-icon.png',
    'hero-bg.jpg',
    'about-bg.jpg',
    'contact-bg.jpg'
];

echo "<!DOCTYPE html>
<html>
<head>
    <title>WafiTechParts - Placeholder Image Generator</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background: #1a1a1a; color: #fff; }
        .container { max-width: 1200px; margin: 0 auto; }
        .section { margin: 30px 0; padding: 20px; background: rgba(255,255,255,0.05); border-radius: 10px; }
        .image-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 15px; margin: 20px 0; }
        .image-item { text-align: center; padding: 10px; background: rgba(255,255,255,0.1); border-radius: 5px; }
        .image-item img { max-width: 100%; height: auto; border-radius: 5px; }
        .btn { display: inline-block; padding: 10px 20px; background: #64b5f6; color: white; text-decoration: none; border-radius: 5px; margin: 5px; }
        .btn:hover { background: #4a9fd8; }
        h1, h2 { color: #64b5f6; }
        .instructions { background: rgba(100,181,246,0.1); padding: 15px; border-radius: 5px; margin: 20px 0; }
    </style>
</head>
<body>
    <div class='container'>
        <h1>🖼️ WafiTechParts - Placeholder Image Generator</h1>
        
        <div class='instructions'>
            <h3>📋 Instructions:</h3>
            <ol>
                <li>Click the links below to download placeholder images</li>
                <li>Save each image with the exact filename shown</li>
                <li>Place product images in: <code>assets/images/products/</code></li>
                <li>Place site images in: <code>assets/images/</code></li>
                <li>Upload all images to your myweb hosting</li>
            </ol>
        </div>

        <div class='section'>
            <h2>📦 Product Images (40 images needed)</h2>
            <p>Click each link to download a placeholder image:</p>
            <div class='image-grid'>";

foreach ($product_images as $image) {
    $placeholder_url = "https://picsum.photos/400/400?random=" . rand(1, 1000);
    echo "
                <div class='image-item'>
                    <img src='$placeholder_url' alt='$image' style='width: 150px; height: 150px; object-fit: cover;'>
                    <p><strong>$image</strong></p>
                    <a href='$placeholder_url' download='$image' class='btn'>Download</a>
                </div>";
}

echo "
            </div>
        </div>

        <div class='section'>
            <h2>🏠 Site Images (6 images needed)</h2>
            <p>Click each link to download a placeholder image:</p>
            <div class='image-grid'>";

foreach ($site_images as $image) {
    $size = ($image === 'logo.png') ? '200/80' : (($image === 'favicon.ico' || $image === 'apple-touch-icon.png') ? '64/64' : '800/600');
    $placeholder_url = "https://picsum.photos/$size?random=" . rand(1, 1000);
    echo "
                <div class='image-item'>
                    <img src='$placeholder_url' alt='$image' style='width: 150px; height: 150px; object-fit: cover;'>
                    <p><strong>$image</strong></p>
                    <a href='$placeholder_url' download='$image' class='btn'>Download</a>
                </div>";
}

echo "
            </div>
        </div>

        <div class='section'>
            <h2>🎥 Video Files (3 videos needed)</h2>
            <p>You'll need to create or download these video files:</p>
            <ul>
                <li><strong>pc_building_guide.mp4</strong> - PC building tutorial (1-5 minutes)</li>
                <li><strong>product_review.mp4</strong> - Product demonstration (1-3 minutes)</li>
                <li><strong>company_overview.mp4</strong> - Company introduction (30 seconds - 2 minutes)</li>
            </ul>
            <p><strong>Video Sources:</strong></p>
            <ul>
                <li><a href='https://pixabay.com/videos/' target='_blank'>Pixabay Videos</a> - Free stock videos</li>
                <li><a href='https://www.pexels.com/videos/' target='_blank'>Pexels Videos</a> - Free video content</li>
                <li>Create your own using phone camera or screen recording software</li>
            </ul>
        </div>

        <div class='section'>
            <h2>✅ Next Steps</h2>
            <ol>
                <li>Download all the placeholder images above</li>
                <li>Create or download 3 video files</li>
                <li>Upload all files to your myweb hosting</li>
                <li>Test the website to ensure images display correctly</li>
                <li>Update the database if needed with correct image filenames</li>
            </ol>
            
            <h3>Quick Test:</h3>
            <p>After uploading images, visit: <a href='check-database.php' target='_blank'>check-database.php</a> to verify everything works.</p>
        </div>
    </div>
</body>
</html>";
?>