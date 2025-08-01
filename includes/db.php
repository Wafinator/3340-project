<?php
// Static Demo Data for myweb hosting
// No database required - using mock data for demonstration

// Mock Products Data
$mock_products = [
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

// Mock Categories
$mock_categories = [
    ['category' => 'CPU'],
    ['category' => 'GPU'],
    ['category' => 'RAM'],
    ['category' => 'Storage'],
    ['category' => 'Motherboard'],
    ['category' => 'PSU'],
    ['category' => 'Case'],
    ['category' => 'Cooling']
];

// Mock PDO class for compatibility
class MockPDO {
    public function query($query) {
        return new MockStatement();
    }
    
    public function prepare($query) {
        return new MockStatement();
    }
}

class MockStatement {
    public function execute($params = []) {
        return true;
    }
    
    public function fetchAll() {
        global $mock_products, $mock_categories;
        
        // Return different data based on what's being queried
        $trace = debug_backtrace();
        $caller = '';
        if (isset($trace[2]['file'])) {
            $caller = $trace[2]['file'];
        }
        
        if (strpos($caller, 'categories') !== false || strpos($caller, 'DISTINCT category') !== false) {
            return $mock_categories;
        }
        
        return $mock_products;
    }
    
    public function fetch() {
        global $mock_products;
        return $mock_products[0] ?? null;
    }
    
    public function fetchColumn() {
        return 'Demo Version 1.0';
    }
}

// Create mock PDO instance
$pdo = new MockPDO();
?>
