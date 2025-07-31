<?php
require_once '../includes/db.php';

echo "<h1>Add Sample Products</h1>";
echo "<style>
    body { font-family: Arial, sans-serif; margin: 20px; }
    .success { color: green; }
    .error { color: red; }
</style>";

try {
    // Check if products table exists
    $stmt = $pdo->query("DESCRIBE products");
    $columns = $stmt->fetchAll(PDO::FETCH_COLUMN);
    echo "<p><strong>Products table columns:</strong> " . implode(', ', $columns) . "</p>";
    
    // Sample products data
    $sample_products = [
        [
            'name' => 'Intel Core i5-12400F',
            'description' => '6-core, 12-thread processor for gaming and productivity',
            'category' => 'CPU',
            'price' => 199.99,
            'image' => 'cpu_i5_12400f.jpg',
            'featured' => 1
        ],
        [
            'name' => 'AMD Ryzen 5 5600X',
            'description' => '6-core, 12-thread processor with excellent gaming performance',
            'category' => 'CPU',
            'price' => 179.99,
            'image' => 'cpu_ryzen5_5600x.jpg',
            'featured' => 1
        ],
        [
            'name' => 'NVIDIA RTX 3060',
            'description' => '12GB GDDR6 graphics card for 1080p gaming',
            'category' => 'GPU',
            'price' => 329.99,
            'image' => 'gpu_rtx_3060.jpg',
            'featured' => 1
        ],
        [
            'name' => 'AMD RX 6600',
            'description' => '8GB GDDR6 graphics card for 1080p gaming',
            'category' => 'GPU',
            'price' => 279.99,
            'image' => 'gpu_rx_6600.jpg',
            'featured' => 0
        ],
        [
            'name' => 'MSI B660M-A WiFi',
            'description' => 'Intel B660 motherboard with WiFi and DDR4 support',
            'category' => 'Motherboard',
            'price' => 89.99,
            'image' => 'mobo_msi_b660m.jpg',
            'featured' => 0
        ],
        [
            'name' => 'ASUS ROG B660-F',
            'description' => 'Premium Intel B660 motherboard with advanced features',
            'category' => 'Motherboard',
            'price' => 149.99,
            'image' => 'mobo_asus_b660f.jpg',
            'featured' => 1
        ],
        [
            'name' => 'Corsair Vengeance 16GB DDR4',
            'description' => '16GB DDR4-3200 memory kit (2x8GB)',
            'category' => 'RAM',
            'price' => 69.99,
            'image' => 'ram_16gb_ddr4.jpg',
            'featured' => 1
        ],
        [
            'name' => 'G.Skill Ripjaws 32GB DDR4',
            'description' => '32GB DDR4-3200 memory kit (2x16GB)',
            'category' => 'RAM',
            'price' => 129.99,
            'image' => 'ram_32gb_ddr4.jpg',
            'featured' => 0
        ],
        [
            'name' => 'Samsung 970 EVO 1TB',
            'description' => '1TB NVMe SSD with excellent read/write speeds',
            'category' => 'Storage',
            'price' => 109.99,
            'image' => 'ssd_1tb_nvme.jpg',
            'featured' => 1
        ],
        [
            'name' => 'Western Digital Blue 2TB',
            'description' => '2TB SATA HDD for mass storage',
            'category' => 'Storage',
            'price' => 49.99,
            'image' => 'hdd_2tb.jpg',
            'featured' => 0
        ],
        [
            'name' => 'EVGA 650W Gold',
            'description' => '650W 80+ Gold modular power supply',
            'category' => 'Power Supply',
            'price' => 79.99,
            'image' => 'psu_650w_gold.jpg',
            'featured' => 1
        ],
        [
            'name' => 'Corsair RM750x',
            'description' => '750W 80+ Gold modular power supply',
            'category' => 'Power Supply',
            'price' => 99.99,
            'image' => 'psu_750w_gold.jpg',
            'featured' => 0
        ],
        [
            'name' => 'NZXT H510',
            'description' => 'Mid-tower ATX case with excellent airflow',
            'category' => 'Case',
            'price' => 79.99,
            'image' => 'case_mid_tower.jpg',
            'featured' => 1
        ],
        [
            'name' => 'Cooler Master Hyper 212',
            'description' => 'Popular air cooler with 120mm fan',
            'category' => 'Cooling',
            'price' => 39.99,
            'image' => 'cooling_air.jpg',
            'featured' => 0
        ],
        [
            'name' => 'NZXT Kraken X53',
            'description' => '240mm liquid cooler with RGB pump',
            'category' => 'Cooling',
            'price' => 89.99,
            'image' => 'cooling_liquid.jpg',
            'featured' => 1
        ]
    ];
    
    // Check if products already exist
    $stmt = $pdo->query("SELECT COUNT(*) FROM products");
    $existing_count = $stmt->fetchColumn();
    
    if ($existing_count > 0) {
        echo "<p class='error'>Products already exist in database ($existing_count products).</p>";
        echo "<p>If you want to add these sample products, first clear the products table.</p>";
    } else {
        // Insert sample products
        $stmt = $pdo->prepare("
            INSERT INTO products (name, description, category, price, image, featured) 
            VALUES (?, ?, ?, ?, ?, ?)
        ");
        
        $inserted = 0;
        foreach ($sample_products as $product) {
            try {
                $stmt->execute([
                    $product['name'],
                    $product['description'],
                    $product['category'],
                    $product['price'],
                    $product['image'],
                    $product['featured']
                ]);
                $inserted++;
            } catch (PDOException $e) {
                echo "<p class='error'>Error inserting {$product['name']}: " . $e->getMessage() . "</p>";
            }
        }
        
        echo "<p class='success'>Successfully added $inserted sample products!</p>";
        echo "<p><a href='index.php'>View Products</a></p>";
    }
    
} catch (PDOException $e) {
    echo "<p class='error'>Database Error: " . $e->getMessage() . "</p>";
}
?> 