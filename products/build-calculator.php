<?php 
$page_title = "Build Calculator";
include '../includes/header.php'; 
?>

<div class="container">
    <section class="calculator-hero">
        <h1>PC Build Calculator</h1>
        <p class="calculator-subtitle">Design your perfect custom PC with our interactive calculator</p>
    </section>

    <div class="calculator-content">
        <div class="calculator-form">
            <h2>Select Your Components</h2>
            <form id="build-calculator" data-validate="true">
                <div class="component-section">
                    <h3>Processor (CPU)</h3>
                    <div class="form-group">
                        <label for="component_cpu">Choose your CPU:</label>
                        <select id="component_cpu" name="component_cpu" data-price="0" required>
                            <option value="" data-price="0">Select a CPU</option>
                            <option value="intel_i3" data-price="129.99">Intel Core i3-12100F - $129.99</option>
                            <option value="intel_i5" data-price="199.99">Intel Core i5-12400F - $199.99</option>
                            <option value="intel_i7" data-price="299.99">Intel Core i7-12700F - $299.99</option>
                            <option value="intel_i9" data-price="499.99">Intel Core i9-12900F - $499.99</option>
                            <option value="amd_ryzen5" data-price="179.99">AMD Ryzen 5 5600X - $179.99</option>
                            <option value="amd_ryzen7" data-price="279.99">AMD Ryzen 7 5800X - $279.99</option>
                            <option value="amd_ryzen9" data-price="449.99">AMD Ryzen 9 5900X - $449.99</option>
                        </select>
                    </div>
                </div>

                <div class="component-section">
                    <h3>Graphics Card (GPU)</h3>
                    <div class="form-group">
                        <label for="component_gpu">Choose your GPU:</label>
                        <select id="component_gpu" name="component_gpu" data-price="0" required>
                            <option value="" data-price="0">Select a GPU</option>
                            <option value="rtx_3060" data-price="329.99">NVIDIA RTX 3060 - $329.99</option>
                            <option value="rtx_3070" data-price="499.99">NVIDIA RTX 3070 - $499.99</option>
                            <option value="rtx_3080" data-price="699.99">NVIDIA RTX 3080 - $699.99</option>
                            <option value="rtx_3090" data-price="1499.99">NVIDIA RTX 3090 - $1499.99</option>
                            <option value="rx_6600" data-price="279.99">AMD RX 6600 - $279.99</option>
                            <option value="rx_6700" data-price="379.99">AMD RX 6700 XT - $379.99</option>
                            <option value="rx_6800" data-price="579.99">AMD RX 6800 XT - $579.99</option>
                        </select>
                    </div>
                </div>

                <div class="component-section">
                    <h3>Motherboard</h3>
                    <div class="form-group">
                        <label for="component_motherboard">Choose your motherboard:</label>
                        <select id="component_motherboard" name="component_motherboard" data-price="0" required>
                            <option value="" data-price="0">Select a motherboard</option>
                            <option value="b660_basic" data-price="89.99">MSI B660M-A WiFi - $89.99</option>
                            <option value="b660_premium" data-price="149.99">ASUS ROG B660-F - $149.99</option>
                            <option value="z690_basic" data-price="199.99">Gigabyte Z690 UD - $199.99</option>
                            <option value="z690_premium" data-price="299.99">ASUS ROG Z690-E - $299.99</option>
                            <option value="b550_basic" data-price="79.99">MSI B550-A Pro - $79.99</option>
                            <option value="b550_premium" data-price="129.99">ASUS ROG B550-F - $129.99</option>
                            <option value="x570_basic" data-price="179.99">Gigabyte X570 Aorus Elite - $179.99</option>
                            <option value="x570_premium" data-price="249.99">ASUS ROG X570-E - $249.99</option>
                        </select>
                    </div>
                </div>

                <div class="component-section">
                    <h3>Memory (RAM)</h3>
                    <div class="form-group">
                        <label for="component_ram">Choose your RAM:</label>
                        <select id="component_ram" name="component_ram" data-price="0" required>
                            <option value="" data-price="0">Select RAM</option>
                            <option value="ram_8gb" data-price="39.99">8GB DDR4 3200MHz - $39.99</option>
                            <option value="ram_16gb" data-price="69.99">16GB DDR4 3200MHz - $69.99</option>
                            <option value="ram_32gb" data-price="129.99">32GB DDR4 3200MHz - $129.99</option>
                            <option value="ram_64gb" data-price="249.99">64GB DDR4 3200MHz - $249.99</option>
                            <option value="ram_16gb_ddr5" data-price="89.99">16GB DDR5 5200MHz - $89.99</option>
                            <option value="ram_32gb_ddr5" data-price="169.99">32GB DDR5 5200MHz - $169.99</option>
                        </select>
                    </div>
                </div>

                <div class="component-section">
                    <h3>Storage</h3>
                    <div class="form-group">
                        <label for="component_storage">Choose your storage:</label>
                        <select id="component_storage" name="component_storage" data-price="0" required>
                            <option value="" data-price="0">Select storage</option>
                            <option value="ssd_500gb" data-price="49.99">500GB SATA SSD - $49.99</option>
                            <option value="ssd_1tb" data-price="89.99">1TB SATA SSD - $89.99</option>
                            <option value="nvme_500gb" data-price="59.99">500GB NVMe SSD - $59.99</option>
                            <option value="nvme_1tb" data-price="109.99">1TB NVMe SSD - $109.99</option>
                            <option value="nvme_2tb" data-price="199.99">2TB NVMe SSD - $199.99</option>
                            <option value="hdd_2tb" data-price="49.99">2TB HDD - $49.99</option>
                            <option value="hdd_4tb" data-price="89.99">4TB HDD - $89.99</option>
                        </select>
                    </div>
                </div>

                <div class="component-section">
                    <h3>Power Supply</h3>
                    <div class="form-group">
                        <label for="component_psu">Choose your power supply:</label>
                        <select id="component_psu" name="component_psu" data-price="0" required>
                            <option value="" data-price="0">Select power supply</option>
                            <option value="psu_550w" data-price="59.99">550W 80+ Bronze - $59.99</option>
                            <option value="psu_650w" data-price="79.99">650W 80+ Gold - $79.99</option>
                            <option value="psu_750w" data-price="99.99">750W 80+ Gold - $99.99</option>
                            <option value="psu_850w" data-price="129.99">850W 80+ Gold - $129.99</option>
                            <option value="psu_1000w" data-price="169.99">1000W 80+ Platinum - $169.99</option>
                        </select>
                    </div>
                </div>

                <div class="component-section">
                    <h3>Case</h3>
                    <div class="form-group">
                        <label for="component_case">Choose your case:</label>
                        <select id="component_case" name="component_case" data-price="0" required>
                            <option value="" data-price="0">Select case</option>
                            <option value="case_basic" data-price="49.99">Basic ATX Case - $49.99</option>
                            <option value="case_mid" data-price="79.99">Mid-Tower ATX Case - $79.99</option>
                            <option value="case_premium" data-price="129.99">Premium ATX Case - $129.99</option>
                            <option value="case_gaming" data-price="159.99">Gaming ATX Case - $159.99</option>
                            <option value="case_mini" data-price="69.99">Mini-ITX Case - $69.99</option>
                        </select>
                    </div>
                </div>

                <div class="component-section">
                    <h3>Cooling</h3>
                    <div class="form-group">
                        <label for="component_cooling">Choose your cooling:</label>
                        <select id="component_cooling" name="component_cooling" data-price="0" required>
                            <option value="" data-price="0">Select cooling</option>
                            <option value="cooling_stock" data-price="0.00">Stock Cooler (Included) - $0.00</option>
                            <option value="cooling_air" data-price="39.99">Air Cooler - $39.99</option>
                            <option value="cooling_liquid" data-price="89.99">Liquid Cooler - $89.99</option>
                            <option value="cooling_premium" data-price="149.99">Premium Liquid Cooler - $149.99</option>
                        </select>
                    </div>
                </div>

                <div class="calculator-summary">
                    <h3>Build Summary</h3>
                    <div class="summary-item">
                        <span>Total Cost:</span>
                        <span id="build-total">$0.00</span>
                    </div>
                    <div class="summary-item">
                        <span>Estimated Performance:</span>
                        <span id="performance-rating">-</span>
                    </div>
                    <div class="summary-item">
                        <span>Compatibility:</span>
                        <span id="compatibility-status">✅ All components compatible</span>
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn">Calculate Build</button>
                    <button type="button" class="btn btn-secondary" onclick="resetCalculator()">Reset</button>
                    <button type="button" class="btn btn-secondary" onclick="saveBuild()">Save Build</button>
                </div>
            </form>
        </div>

        <div class="calculator-results" id="build-results" style="display: none;">
            <!-- Results will be populated by JavaScript -->
        </div>
    </div>

    <section class="build-presets">
        <h2>Pre-Configured Builds</h2>
        <div class="preset-grid">
            <div class="preset-card">
                <h3>Budget Gaming</h3>
                <p>Perfect for 1080p gaming on medium settings</p>
                <div class="preset-price">~$800</div>
                <button class="btn btn-secondary" onclick="loadPreset('budget')">Load Preset</button>
            </div>
            
            <div class="preset-card">
                <h3>Mid-Range Gaming</h3>
                <p>Great for 1440p gaming on high settings</p>
                <div class="preset-price">~$1200</div>
                <button class="btn btn-secondary" onclick="loadPreset('midrange')">Load Preset</button>
            </div>
            
            <div class="preset-card">
                <h3>High-End Gaming</h3>
                <p>Ultimate 4K gaming experience</p>
                <div class="preset-price">~$2000</div>
                <button class="btn btn-secondary" onclick="loadPreset('high')">Load Preset</button>
            </div>
            
            <div class="preset-card">
                <h3>Workstation</h3>
                <p>Professional content creation and rendering</p>
                <div class="preset-price">~$2500</div>
                <button class="btn btn-secondary" onclick="loadPreset('workstation')">Load Preset</button>
            </div>
        </div>
    </section>

    <section class="compatibility-info">
        <h2>Compatibility Guide</h2>
        <div class="compatibility-grid">
            <div class="compat-item">
                <h3>CPU & Motherboard</h3>
                <p>Intel CPUs require Intel motherboards (LGA1700 for 12th gen). AMD CPUs require AMD motherboards (AM4 for Ryzen 5000 series).</p>
            </div>
            
            <div class="compat-item">
                <h3>RAM Compatibility</h3>
                <p>DDR4 RAM works with most current motherboards. DDR5 requires specific Intel 12th gen or newer motherboards.</p>
            </div>
            
            <div class="compat-item">
                <h3>Power Requirements</h3>
                <p>High-end GPUs require more power. RTX 3080/3090 need at least 750W, while RTX 3060/3070 work with 650W.</p>
            </div>
            
            <div class="compat-item">
                <h3>Case Size</h3>
                <p>ATX motherboards fit in ATX and larger cases. Mini-ITX boards fit in all case sizes.</p>
            </div>
        </div>
    </section>
</div>

<style>
/* Build Calculator - Consistent with main site styling */

.calculator-hero {
    text-align: center;
    padding: 60px 0;
}

.calculator-subtitle {
    font-size: 1.3em;
    margin: 20px 0;
    color: #ccc;
}

.calculator-content {
    max-width: 1200px;
    margin: 0 auto;
    padding: 40px 20px;
}

.calculator-form {
    max-width: 800px;
    margin: 0 auto;
    padding: 40px;
    background: rgba(255, 255, 255, 0.05);
    border-radius: 10px;
    border: 1px solid rgba(255, 255, 255, 0.1);
}

.calculator-form h2 {
    color: #64b5f6;
    margin-bottom: 30px;
    font-size: 1.8em;
    text-align: center;
}

.component-section {
    margin-bottom: 25px;
    padding: 20px;
    background: rgba(255, 255, 255, 0.03);
    border-radius: 8px;
    border: 1px solid rgba(255, 255, 255, 0.05);
    transition: all 0.3s ease;
}

.component-section:hover {
    background: rgba(255, 255, 255, 0.05);
    border-color: rgba(100, 181, 246, 0.3);
}

.component-section h3 {
    color: #64b5f6;
    margin-bottom: 15px;
    font-size: 1.2em;
    display: flex;
    align-items: center;
    gap: 10px;
}

.component-section h3::before {
    content: "🔧";
    font-size: 1.1em;
}

/* Use consistent form styling from main site */
.calculator-form .form-group {
    margin-bottom: 20px;
}

.calculator-form .form-group label {
    display: block;
    margin-bottom: 8px;
    font-weight: bold;
    color: #64b5f6;
}

.calculator-form .form-group select {
    width: 100%;
    padding: 12px;
    border: 1px solid #444;
    border-radius: 5px;
    background: rgba(255, 255, 255, 0.1);
    color: #fff;
    font-size: 16px;
    transition: all 0.3s ease;
    cursor: pointer;
}

.calculator-form .form-group select:focus {
    outline: none;
    border-color: #64b5f6;
    box-shadow: 0 0 10px rgba(100, 181, 246, 0.3);
}

.calculator-form .form-group select:hover {
    border-color: #64b5f6;
    background: rgba(255, 255, 255, 0.15);
}

.calculator-form .form-group select option {
    background: #2a2a2a;
    color: #fff;
    padding: 8px;
}

.calculator-summary {
    background: rgba(100, 181, 246, 0.1);
    padding: 25px;
    border-radius: 10px;
    border: 1px solid rgba(100, 181, 246, 0.3);
    margin: 30px 0;
}

.calculator-summary h3 {
    color: #64b5f6;
    margin-bottom: 20px;
    font-size: 1.3em;
    text-align: center;
}

.summary-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 15px;
    padding: 10px 0;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    font-weight: 500;
}

.summary-item:last-child {
    margin-bottom: 0;
    border-bottom: none;
    font-weight: bold;
    font-size: 1.1em;
    padding-top: 15px;
    border-top: 2px solid rgba(100, 181, 246, 0.3);
}

#build-total {
    color: #4caf50;
    font-size: 1.3em;
    font-weight: bold;
}

#performance-rating {
    color: #ff9800;
    font-weight: bold;
}

#compatibility-status {
    color: #4caf50;
    font-weight: bold;
}

.form-actions {
    display: flex;
    gap: 15px;
    flex-wrap: wrap;
    margin-top: 30px;
    justify-content: center;
}

/* Use consistent button styling from main site */
.form-actions .btn {
    background: linear-gradient(45deg, #64b5f6, #1976d2);
    color: white;
    padding: 12px 24px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    font-weight: bold;
    transition: all 0.3s ease;
    text-decoration: none;
    display: inline-block;
    min-width: 120px;
}

.form-actions .btn:hover {
    background: linear-gradient(45deg, #1976d2, #64b5f6);
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(100, 181, 246, 0.4);
}

.form-actions .btn-secondary {
    background: linear-gradient(45deg, #666, #999);
}

.form-actions .btn-secondary:hover {
    background: linear-gradient(45deg, #999, #666);
}

.build-presets {
    margin: 60px 0;
}

.build-presets h2 {
    color: #64b5f6;
    text-align: center;
    margin-bottom: 40px;
    font-size: 1.8em;
}

.preset-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 30px;
    margin-top: 40px;
}

.preset-card {
    text-align: center;
    padding: 35px 25px;
    background: rgba(255, 255, 255, 0.05);
    border-radius: 10px;
    border: 1px solid rgba(255, 255, 255, 0.1);
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.preset-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 3px;
    background: linear-gradient(90deg, #64b5f6, #4caf50);
    opacity: 0;
    transition: opacity 0.3s ease;
}

.preset-card:hover {
    transform: translateY(-5px);
    border-color: rgba(100, 181, 246, 0.4);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
}

.preset-card:hover::before {
    opacity: 1;
}

.preset-card h3 {
    color: #64b5f6;
    margin-bottom: 15px;
    font-size: 1.3em;
}

.preset-card p {
    color: #ccc;
    margin-bottom: 20px;
    line-height: 1.5;
}

.preset-price {
    font-size: 1.8em;
    font-weight: bold;
    color: #4caf50;
    margin: 20px 0;
}

.compatibility-info {
    margin: 60px 0;
}

.compatibility-info h2 {
    color: #64b5f6;
    text-align: center;
    margin-bottom: 40px;
    font-size: 1.8em;
}

.compatibility-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
    gap: 30px;
    margin-top: 40px;
}

.compat-item {
    padding: 25px;
    background: rgba(255, 255, 255, 0.05);
    border-radius: 10px;
    border: 1px solid rgba(255, 255, 255, 0.1);
    transition: all 0.3s ease;
    position: relative;
}

.compat-item::before {
    content: "ℹ️";
    position: absolute;
    top: 15px;
    right: 15px;
    font-size: 1.2em;
    opacity: 0.5;
}

.compat-item:hover {
    border-color: rgba(100, 181, 246, 0.3);
    background: rgba(255, 255, 255, 0.08);
    transform: translateY(-3px);
}

.compat-item h3 {
    color: #64b5f6;
    margin-bottom: 15px;
    font-size: 1.2em;
}

.compat-item p {
    color: #ccc;
    line-height: 1.6;
}

/* Responsive design */
@media (max-width: 768px) {
    .calculator-form {
        padding: 30px 20px;
    }
    
    .form-actions {
        flex-direction: column;
        align-items: center;
    }
    
    .form-actions .btn {
        width: 100%;
        max-width: 250px;
    }
    
    .preset-grid {
        grid-template-columns: 1fr;
    }
    
    .compatibility-grid {
        grid-template-columns: 1fr;
    }
    
    .component-section {
        padding: 15px;
    }
    
    .calculator-summary {
        padding: 20px;
    }
}

/* Animation for summary updates */
@keyframes priceUpdate {
    0% { transform: scale(1); }
    50% { transform: scale(1.05); }
    100% { transform: scale(1); }
}

.summary-item.updated {
    animation: priceUpdate 0.3s ease;
}
</style>

<script>
// Preset configurations
const presets = {
    budget: {
        component_cpu: 'intel_i3',
        component_gpu: 'rtx_3060',
        component_motherboard: 'b660_basic',
        component_ram: 'ram_16gb',
        component_storage: 'ssd_1tb',
        component_psu: 'psu_650w',
        component_case: 'case_mid',
        component_cooling: 'cooling_stock'
    },
    midrange: {
        component_cpu: 'intel_i5',
        component_gpu: 'rtx_3070',
        component_motherboard: 'b660_premium',
        component_ram: 'ram_16gb',
        component_storage: 'nvme_1tb',
        component_psu: 'psu_750w',
        component_case: 'case_gaming',
        component_cooling: 'cooling_air'
    },
    high: {
        component_cpu: 'intel_i7',
        component_gpu: 'rtx_3080',
        component_motherboard: 'z690_premium',
        component_ram: 'ram_32gb_ddr5',
        component_storage: 'nvme_2tb',
        component_psu: 'psu_850w',
        component_case: 'case_premium',
        component_cooling: 'cooling_liquid'
    },
    workstation: {
        component_cpu: 'amd_ryzen9',
        component_gpu: 'rtx_3090',
        component_motherboard: 'x570_premium',
        component_ram: 'ram_64gb',
        component_storage: 'nvme_2tb',
        component_psu: 'psu_1000w',
        component_case: 'case_premium',
        component_cooling: 'cooling_premium'
    }
};

// Initialize calculator when page loads
document.addEventListener('DOMContentLoaded', function() {
    initializeCalculator();
});

function initializeCalculator() {
    // Add event listeners to all select elements
    const selects = document.querySelectorAll('#build-calculator select');
    selects.forEach(select => {
        select.addEventListener('change', function() {
            updateBuildTotal();
            updatePerformanceRating();
            updateCompatibilityStatus();
        });
    });
    
    // Initialize with default values
    updateBuildTotal();
}

function updateBuildTotal() {
    let total = 0;
    const selects = document.querySelectorAll('#build-calculator select');
    
    selects.forEach(select => {
        const selectedOption = select.options[select.selectedIndex];
        if (selectedOption && selectedOption.dataset.price) {
            total += parseFloat(selectedOption.dataset.price);
        }
    });
    
    const totalElement = document.getElementById('build-total');
    if (totalElement) {
        totalElement.textContent = '$' + total.toFixed(2);
        totalElement.classList.add('updated');
        setTimeout(() => totalElement.classList.remove('updated'), 300);
    }
}

function updatePerformanceRating() {
    const cpu = document.getElementById('component_cpu').value;
    const gpu = document.getElementById('component_gpu').value;
    const ram = document.getElementById('component_ram').value;
    
    let rating = 'Low';
    let score = 0;
    
    // CPU scoring
    if (cpu.includes('i9') || cpu.includes('ryzen9')) score += 40;
    else if (cpu.includes('i7') || cpu.includes('ryzen7')) score += 30;
    else if (cpu.includes('i5') || cpu.includes('ryzen5')) score += 20;
    else if (cpu.includes('i3')) score += 10;
    
    // GPU scoring
    if (gpu.includes('3090')) score += 40;
    else if (gpu.includes('3080')) score += 35;
    else if (gpu.includes('3070')) score += 25;
    else if (gpu.includes('3060')) score += 15;
    else if (gpu.includes('6800')) score += 30;
    else if (gpu.includes('6700')) score += 20;
    else if (gpu.includes('6600')) score += 10;
    
    // RAM scoring
    if (ram.includes('64gb')) score += 10;
    else if (ram.includes('32gb')) score += 8;
    else if (ram.includes('16gb')) score += 5;
    else if (ram.includes('8gb')) score += 2;
    
    // Determine rating
    if (score >= 70) rating = 'Excellent';
    else if (score >= 50) rating = 'High';
    else if (score >= 30) rating = 'Medium';
    else if (score >= 15) rating = 'Low';
    else rating = 'Basic';
    
    const ratingElement = document.getElementById('performance-rating');
    if (ratingElement) {
        ratingElement.textContent = rating;
        ratingElement.className = 'performance-' + rating.toLowerCase();
    }
}

function updateCompatibilityStatus() {
    const cpu = document.getElementById('component_cpu').value;
    const motherboard = document.getElementById('component_motherboard').value;
    const gpu = document.getElementById('component_gpu').value;
    const psu = document.getElementById('component_psu').value;
    
    let status = '✅ All components compatible';
    let issues = [];
    
    // CPU-Motherboard compatibility
    if (cpu.includes('intel') && !motherboard.includes('b660') && !motherboard.includes('z690')) {
        issues.push('Intel CPU requires Intel motherboard');
    }
    if (cpu.includes('amd') && !motherboard.includes('b550') && !motherboard.includes('x570')) {
        issues.push('AMD CPU requires AMD motherboard');
    }
    
    // Power requirements
    if (gpu.includes('3080') || gpu.includes('3090')) {
        if (!psu.includes('750w') && !psu.includes('850w') && !psu.includes('1000w')) {
            issues.push('High-end GPU requires 750W+ power supply');
        }
    }
    
    if (issues.length > 0) {
        status = '⚠️ ' + issues.join(', ');
    }
    
    const statusElement = document.getElementById('compatibility-status');
    if (statusElement) {
        statusElement.textContent = status;
        statusElement.className = issues.length > 0 ? 'compatibility-warning' : 'compatibility-ok';
    }
}

function loadPreset(presetName) {
    const preset = presets[presetName];
    if (preset) {
        Object.keys(preset).forEach(component => {
            const select = document.getElementById(component);
            if (select) {
                select.value = preset[component];
                select.dispatchEvent(new Event('change'));
            }
        });
        updateBuildTotal();
        updatePerformanceRating();
        updateCompatibilityStatus();
    }
}

function resetCalculator() {
    const form = document.getElementById('build-calculator');
    form.reset();
    updateBuildTotal();
    updatePerformanceRating();
    updateCompatibilityStatus();
    document.getElementById('build-results').style.display = 'none';
}

function saveBuild() {
    const form = document.getElementById('build-calculator');
    const formData = new FormData(form);
    const buildData = {};
    
    formData.forEach((value, key) => {
        if (key.startsWith('component_')) {
            buildData[key] = value;
        }
    });
    
    const savedBuilds = JSON.parse(localStorage.getItem('savedBuilds') || '[]');
    const buildName = prompt('Enter a name for this build:');
    
    if (buildName) {
        savedBuilds.push({
            id: Date.now(),
            name: buildName,
            components: buildData,
            total: document.getElementById('build-total').textContent,
            date: new Date().toISOString()
        });
        
        localStorage.setItem('savedBuilds', JSON.stringify(savedBuilds));
        showAlert('Build saved successfully!', 'success');
    }
}

function showAlert(message, type = 'info') {
    // Create alert element
    const alert = document.createElement('div');
    alert.className = `alert alert-${type}`;
    alert.textContent = message;
    alert.style.cssText = `
        position: fixed;
        top: 20px;
        right: 20px;
        padding: 15px 20px;
        border-radius: 8px;
        color: white;
        font-weight: bold;
        z-index: 1000;
        animation: slideIn 0.3s ease;
    `;
    
    if (type === 'success') {
        alert.style.background = 'rgba(76, 175, 80, 0.9)';
        alert.style.border = '1px solid #4caf50';
    } else if (type === 'error') {
        alert.style.background = 'rgba(244, 67, 54, 0.9)';
        alert.style.border = '1px solid #f44336';
    } else {
        alert.style.background = 'rgba(100, 181, 246, 0.9)';
        alert.style.border = '1px solid #64b5f6';
    }
    
    document.body.appendChild(alert);
    
    // Remove after 3 seconds
    setTimeout(() => {
        alert.style.animation = 'slideOut 0.3s ease';
        setTimeout(() => {
            if (alert.parentNode) {
                alert.parentNode.removeChild(alert);
            }
        }, 300);
    }, 3000);
}

// Add CSS animations for alerts
const style = document.createElement('style');
style.textContent = `
    @keyframes slideIn {
        from { transform: translateX(100%); opacity: 0; }
        to { transform: translateX(0); opacity: 1; }
    }
    @keyframes slideOut {
        from { transform: translateX(0); opacity: 1; }
        to { transform: translateX(100%); opacity: 0; }
    }
`;
document.head.appendChild(style);
</script>

<?php include '../includes/footer.php'; ?> 