<?php
// Static Data for myweb hosting - No database needed

// Products Data
$products = [
    [
        'id' => 1,
        'name' => 'Intel Core i7-13700K',
        'description' => 'High-performance desktop processor with 16 cores and 24 threads. Perfect for gaming and content creation.',
        'price' => 419.99,
        'category' => 'CPU',
        'brand' => 'Intel',
        'image' => 'cpu-intel-i7.jpg',
        'featured' => 1,
        'created_at' => '2024-01-15',
        'stock' => 25
    ],
    [
        'id' => 2,
        'name' => 'NVIDIA GeForce RTX 4070',
        'description' => 'Next-gen graphics card with Ray Tracing and DLSS 3. Excellent for 1440p gaming.',
        'price' => 599.99,
        'category' => 'GPU',
        'brand' => 'NVIDIA',
        'image' => 'gpu-rtx-4070.jpg',
        'featured' => 1,
        'created_at' => '2024-01-16',
        'stock' => 18
    ],
    [
        'id' => 3,
        'name' => 'Corsair Vengeance LPX 32GB DDR4',
        'description' => 'High-speed DDR4 memory kit optimized for Intel and AMD platforms.',
        'price' => 129.99,
        'category' => 'RAM',
        'brand' => 'Corsair',
        'image' => 'ram-corsair-32gb.jpg',
        'featured' => 1,
        'created_at' => '2024-01-17',
        'stock' => 42
    ],
    [
        'id' => 4,
        'name' => 'Samsung 980 PRO 1TB NVMe SSD',
        'description' => 'Ultra-fast PCIe 4.0 NVMe SSD with sequential read speeds up to 7,000 MB/s.',
        'price' => 149.99,
        'category' => 'Storage',
        'brand' => 'Samsung',
        'image' => 'ssd-samsung-980pro.jpg',
        'featured' => 1,
        'created_at' => '2024-01-18',
        'stock' => 33
    ],
    [
        'id' => 5,
        'name' => 'ASUS ROG Strix B650E-F',
        'description' => 'Premium AMD B650E motherboard with WiFi 6E, PCIe 5.0, and robust power delivery.',
        'price' => 329.99,
        'category' => 'Motherboard',
        'brand' => 'ASUS',
        'image' => 'mb-asus-b650e.jpg',
        'featured' => 1,
        'created_at' => '2024-01-19',
        'stock' => 15
    ],
    [
        'id' => 6,
        'name' => 'Corsair RM850x 850W 80+ Gold',
        'description' => 'Fully modular ATX power supply with 80 PLUS Gold efficiency and Zero RPM fan mode.',
        'price' => 149.99,
        'category' => 'PSU',
        'brand' => 'Corsair',
        'image' => 'psu-corsair-850w.jpg',
        'featured' => 1,
        'created_at' => '2024-01-20',
        'stock' => 28
    ]
];

// Categories
$categories = ['CPU', 'GPU', 'RAM', 'Storage', 'Motherboard', 'PSU', 'Case', 'Cooling'];
?>
