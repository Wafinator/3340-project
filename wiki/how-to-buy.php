<?php 
$page_title = "How to Buy Components";
include '../includes/header.php'; 
?>

<div class="container">
    <section class="buy-hero">
        <h1>How to Buy PC Components</h1>
        <p class="buy-subtitle">A complete guide to choosing the right components for your needs and budget</p>
    </section>

    <div class="buy-content">
        <div class="buy-overview">
            <h2>Getting Started</h2>
            <p>Buying PC components can be overwhelming with so many options available. This guide will help you make informed decisions based on your specific needs, budget, and intended use.</p>
            
            <div class="overview-grid">
                <div class="overview-item">
                    <div class="overview-icon">🎯</div>
                    <h3>Define Your Purpose</h3>
                    <p>Gaming, work, content creation, or general use?</p>
                </div>
                <div class="overview-item">
                    <div class="overview-icon">💰</div>
                    <h3>Set Your Budget</h3>
                    <p>Determine how much you want to spend total</p>
                </div>
                <div class="overview-item">
                    <div class="overview-icon">🔧</div>
                    <h3>Check Compatibility</h3>
                    <p>Ensure all components work together</p>
                </div>
                <div class="overview-item">
                    <div class="overview-icon">📈</div>
                    <h3>Plan for Future</h3>
                    <p>Consider upgradeability and longevity</p>
                </div>
            </div>
        </div>

        <div class="buy-guides">
            <h2>Component Buying Guides</h2>
            
            <div class="component-guide">
                <h3>🖥️ CPU (Processor)</h3>
                <div class="guide-content">
                    <h4>What to Consider:</h4>
                    <ul>
                        <li><strong>Brand:</strong> Intel vs AMD - both are excellent choices</li>
                        <li><strong>Cores:</strong> More cores for multitasking and productivity</li>
                        <li><strong>Speed:</strong> Higher GHz for single-threaded tasks</li>
                        <li><strong>Socket:</strong> Must match your motherboard</li>
                    </ul>
                    
                    <h4>Recommendations by Use:</h4>
                    <div class="recommendations">
                        <div class="rec-item">
                            <strong>Gaming:</strong> Intel i5-12400F or AMD Ryzen 5 5600X
                        </div>
                        <div class="rec-item">
                            <strong>Content Creation:</strong> Intel i7-12700K or AMD Ryzen 7 5800X
                        </div>
                        <div class="rec-item">
                            <strong>Budget:</strong> Intel i3-12100F or AMD Ryzen 5 5500
                        </div>
                        <div class="rec-item">
                            <strong>High-End:</strong> Intel i9-12900K or AMD Ryzen 9 5900X
                        </div>
                    </div>
                </div>
            </div>

            <div class="component-guide">
                <h3>🎮 GPU (Graphics Card)</h3>
                <div class="guide-content">
                    <h4>What to Consider:</h4>
                    <ul>
                        <li><strong>Resolution:</strong> 1080p, 1440p, or 4K gaming</li>
                        <li><strong>VRAM:</strong> More VRAM for higher resolutions</li>
                        <li><strong>Ray Tracing:</strong> RTX cards for future-proofing</li>
                        <li><strong>Power:</strong> Check PSU requirements</li>
                    </ul>
                    
                    <h4>Recommendations by Budget:</h4>
                    <div class="recommendations">
                        <div class="rec-item">
                            <strong>Budget ($200-300):</strong> RTX 3060 or RX 6600
                        </div>
                        <div class="rec-item">
                            <strong>Mid-Range ($400-600):</strong> RTX 3070 or RX 6700 XT
                        </div>
                        <div class="rec-item">
                            <strong>High-End ($700-1000):</strong> RTX 3080 or RX 6800 XT
                        </div>
                        <div class="rec-item">
                            <strong>Ultra ($1200+):</strong> RTX 3090 or RX 6900 XT
                        </div>
                    </div>
                </div>
            </div>

            <div class="component-guide">
                <h3>🔌 Motherboard</h3>
                <div class="guide-content">
                    <h4>What to Consider:</h4>
                    <ul>
                        <li><strong>Socket:</strong> Must match your CPU</li>
                        <li><strong>RAM Support:</strong> DDR4 vs DDR5</li>
                        <li><strong>Features:</strong> WiFi, USB ports, PCIe slots</li>
                        <li><strong>Size:</strong> ATX, mATX, or ITX</li>
                    </ul>
                    
                    <h4>Recommendations:</h4>
                    <div class="recommendations">
                        <div class="rec-item">
                            <strong>Budget:</strong> B660 (Intel) or B550 (AMD)
                        </div>
                        <div class="rec-item">
                            <strong>Mid-Range:</strong> B760 (Intel) or B650 (AMD)
                        </div>
                        <div class="rec-item">
                            <strong>High-End:</strong> Z690/Z790 (Intel) or X670 (AMD)
                        </div>
                    </div>
                </div>
            </div>

            <div class="component-guide">
                <h3>💾 RAM (Memory)</h3>
                <div class="guide-content">
                    <h4>What to Consider:</h4>
                    <ul>
                        <li><strong>Capacity:</strong> 8GB minimum, 16GB recommended</li>
                        <li><strong>Speed:</strong> Higher MHz for better performance</li>
                        <li><strong>Type:</strong> DDR4 or DDR5 (check motherboard)</li>
                        <li><strong>Timing:</strong> Lower CL numbers are better</li>
                    </ul>
                    
                    <h4>Recommendations:</h4>
                    <div class="recommendations">
                        <div class="rec-item">
                            <strong>Basic:</strong> 8GB DDR4 3200MHz
                        </div>
                        <div class="rec-item">
                            <strong>Gaming:</strong> 16GB DDR4 3600MHz
                        </div>
                        <div class="rec-item">
                            <strong>Content Creation:</strong> 32GB DDR4 3600MHz
                        </div>
                        <div class="rec-item">
                            <strong>Future-Proof:</strong> 32GB DDR5 5200MHz
                        </div>
                    </div>
                </div>
            </div>

            <div class="component-guide">
                <h3>💿 Storage</h3>
                <div class="guide-content">
                    <h4>What to Consider:</h4>
                    <ul>
                        <li><strong>Type:</strong> SATA SSD, NVMe SSD, or HDD</li>
                        <li><strong>Capacity:</strong> 500GB minimum, 1TB recommended</li>
                        <li><strong>Speed:</strong> NVMe is fastest, HDD is slowest</li>
                        <li><strong>Reliability:</strong> SSDs are more reliable than HDDs</li>
                    </ul>
                    
                    <h4>Recommendations:</h4>
                    <div class="recommendations">
                        <div class="rec-item">
                            <strong>Budget:</strong> 500GB SATA SSD
                        </div>
                        <div class="rec-item">
                            <strong>Standard:</strong> 1TB NVMe SSD
                        </div>
                        <div class="rec-item">
                            <strong>High-Capacity:</strong> 2TB NVMe SSD
                        </div>
                        <div class="rec-item">
                            <strong>Storage:</strong> 2TB HDD for bulk storage
                        </div>
                    </div>
                </div>
            </div>

            <div class="component-guide">
                <h3>⚡ Power Supply</h3>
                <div class="guide-content">
                    <h4>What to Consider:</h4>
                    <ul>
                        <li><strong>Wattage:</strong> Use our calculator to estimate needs</li>
                        <li><strong>Efficiency:</strong> 80+ Bronze minimum, Gold recommended</li>
                        <li><strong>Modularity:</strong> Full modular for easier cable management</li>
                        <li><strong>Brand:</strong> Stick to reputable manufacturers</li>
                    </ul>
                    
                    <h4>Recommendations:</h4>
                    <div class="recommendations">
                        <div class="rec-item">
                            <strong>Budget Build:</strong> 550W 80+ Bronze
                        </div>
                        <div class="rec-item">
                            <strong>Mid-Range:</strong> 650W 80+ Gold
                        </div>
                        <div class="rec-item">
                            <strong>High-End:</strong> 750W 80+ Gold
                        </div>
                        <div class="rec-item">
                            <strong>Ultra:</strong> 850W+ 80+ Platinum
                        </div>
                    </div>
                </div>
            </div>

            <div class="component-guide">
                <h3>🏠 Case</h3>
                <div class="guide-content">
                    <h4>What to Consider:</h4>
                    <ul>
                        <li><strong>Size:</strong> Must fit your motherboard and components</li>
                        <li><strong>Airflow:</strong> More fans and vents for better cooling</li>
                        <li><strong>Features:</strong> USB ports, dust filters, cable management</li>
                        <li><strong>Aesthetics:</strong> Tempered glass, RGB, color scheme</li>
                    </ul>
                    
                    <h4>Recommendations:</h4>
                    <div class="recommendations">
                        <div class="rec-item">
                            <strong>Budget:</strong> Basic ATX case with 2-3 fans
                        </div>
                        <div class="rec-item">
                            <strong>Mid-Range:</strong> Gaming case with good airflow
                        </div>
                        <div class="rec-item">
                            <strong>High-End:</strong> Premium case with RGB and features
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="budget-guides">
            <h2>Build Recommendations by Budget</h2>
            
            <div class="budget-grid">
                <div class="budget-card">
                    <h3>💰 Budget Build ($500-800)</h3>
                    <div class="budget-specs">
                        <p><strong>CPU:</strong> Intel i3-12100F or AMD Ryzen 5 5500</p>
                        <p><strong>GPU:</strong> RTX 3060 or RX 6600</p>
                        <p><strong>RAM:</strong> 16GB DDR4 3200MHz</p>
                        <p><strong>Storage:</strong> 500GB NVMe SSD</p>
                        <p><strong>PSU:</strong> 550W 80+ Bronze</p>
                    </div>
                    <p class="budget-use">Perfect for 1080p gaming and general use</p>
                </div>
                
                <div class="budget-card">
                    <h3>🎮 Mid-Range Build ($1000-1500)</h3>
                    <div class="budget-specs">
                        <p><strong>CPU:</strong> Intel i5-12400F or AMD Ryzen 5 5600X</p>
                        <p><strong>GPU:</strong> RTX 3070 or RX 6700 XT</p>
                        <p><strong>RAM:</strong> 16GB DDR4 3600MHz</p>
                        <p><strong>Storage:</strong> 1TB NVMe SSD</p>
                        <p><strong>PSU:</strong> 650W 80+ Gold</p>
                    </div>
                    <p class="budget-use">Great for 1440p gaming and content creation</p>
                </div>
                
                <div class="budget-card">
                    <h3>🚀 High-End Build ($2000-3000)</h3>
                    <div class="budget-specs">
                        <p><strong>CPU:</strong> Intel i7-12700K or AMD Ryzen 7 5800X</p>
                        <p><strong>GPU:</strong> RTX 3080 or RX 6800 XT</p>
                        <p><strong>RAM:</strong> 32GB DDR4 3600MHz</p>
                        <p><strong>Storage:</strong> 2TB NVMe SSD</p>
                        <p><strong>PSU:</strong> 750W 80+ Gold</p>
                    </div>
                    <p class="budget-use">Ultimate 4K gaming and professional work</p>
                </div>
                
                <div class="budget-card">
                    <h3>💎 Ultra Build ($3000+)</h3>
                    <div class="budget-specs">
                        <p><strong>CPU:</strong> Intel i9-12900K or AMD Ryzen 9 5900X</p>
                        <p><strong>GPU:</strong> RTX 3090 or RX 6900 XT</p>
                        <p><strong>RAM:</strong> 32GB DDR5 5200MHz</p>
                        <p><strong>Storage:</strong> 2TB NVMe SSD + 4TB HDD</p>
                        <p><strong>PSU:</strong> 850W+ 80+ Platinum</p>
                    </div>
                    <p class="budget-use">Maximum performance for everything</p>
                </div>
            </div>
        </div>

        <div class="buying-tips">
            <h2>Buying Tips & Best Practices</h2>
            <div class="tips-grid">
                <div class="tip-item">
                    <h3>🕐 Timing Your Purchase</h3>
                    <ul>
                        <li>New generations typically launch in Q3-Q4</li>
                        <li>Prices often drop before new releases</li>
                        <li>Black Friday and Cyber Monday have good deals</li>
                        <li>Monitor prices for 2-3 weeks before buying</li>
                    </ul>
                </div>
                
                <div class="tip-item">
                    <h3>🔍 Research & Reviews</h3>
                    <ul>
                        <li>Read multiple reviews from trusted sources</li>
                        <li>Check user reviews for real-world feedback</li>
                        <li>Watch benchmark videos on YouTube</li>
                        <li>Compare prices across multiple retailers</li>
                    </ul>
                </div>
                
                <div class="tip-item">
                    <h3>🛡️ Warranty & Support</h3>
                    <ul>
                        <li>Check warranty length for each component</li>
                        <li>Register products for extended warranty</li>
                        <li>Keep receipts and packaging</li>
                        <li>Buy from authorized retailers</li>
                    </ul>
                </div>
                
                <div class="tip-item">
                    <h3>💰 Budget Allocation</h3>
                    <ul>
                        <li>GPU: 40-50% of budget</li>
                        <li>CPU: 20-25% of budget</li>
                        <li>Motherboard: 10-15% of budget</li>
                        <li>RAM: 5-10% of budget</li>
                        <li>Storage: 5-10% of budget</li>
                        <li>PSU: 5-10% of budget</li>
                        <li>Case: 5-10% of budget</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="compatibility-check">
            <h2>Compatibility Checklist</h2>
            <div class="checklist-grid">
                <div class="checklist-item">
                    <h3>✅ CPU & Motherboard</h3>
                    <p>Socket types must match (LGA1700 for Intel 12th gen, AM4 for AMD Ryzen 5000)</p>
                </div>
                
                <div class="checklist-item">
                    <h3>✅ RAM Compatibility</h3>
                    <p>DDR4 vs DDR5 - check motherboard specifications</p>
                </div>
                
                <div class="checklist-item">
                    <h3>✅ Power Requirements</h3>
                    <p>Ensure PSU wattage meets component needs</p>
                </div>
                
                <div class="checklist-item">
                    <h3>✅ Case Size</h3>
                    <p>Motherboard form factor must fit case (ATX, mATX, ITX)</p>
                </div>
                
                <div class="checklist-item">
                    <h3>✅ GPU Length</h3>
                    <p>Check case specifications for maximum GPU length</p>
                </div>
                
                <div class="checklist-item">
                    <h3>✅ Cooling Clearance</h3>
                    <p>Ensure CPU cooler height fits in case</p>
                </div>
            </div>
        </div>

        <div class="buy-resources">
            <h2>Helpful Resources</h2>
            <div class="resources-grid">
                <div class="resource-item">
                    <h3>🛒 Where to Buy</h3>
                    <ul>
                        <li><a href="../products/index.php">WafiTechParts Store</a></li>
                        <li>Amazon (authorized sellers only)</li>
                        <li>Newegg (reputable retailer)</li>
                        <li>Local computer stores</li>
                    </ul>
                </div>
                
                <div class="resource-item">
                    <h3>🔧 Tools & Calculators</h3>
                    <ul>
                        <li><a href="../products/build-calculator.php">Build Calculator</a></li>
                        <li><a href="compatibility-guide.php">Compatibility Guide</a></li>
                        <li>PSU Calculator</li>
                        <li>Performance Estimator</li>
                    </ul>
                </div>
                
                <div class="resource-item">
                    <h3>📊 Comparison Tools</h3>
                    <ul>
                        <li>UserBenchmark</li>
                        <li>PassMark</li>
                        <li>3DMark</li>
                        <li>PC Part Picker</li>
                    </ul>
                </div>
                
                <div class="resource-item">
                    <h3>📚 Learning Resources</h3>
                    <ul>
                        <li><a href="how-to-build.php">PC Building Guide</a></li>
                        <li><a href="faq.php">FAQ</a></li>
                        <li><a href="../contact.php">Expert Support</a></li>
                        <li>YouTube Tutorials</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="buy-next">
            <h2>Ready to Start Shopping?</h2>
            <p>Now that you know what to look for, it's time to start building your dream PC!</p>
            <div class="next-actions">
                <a href="../products/build-calculator.php" class="btn">Use Build Calculator</a>
                <a href="../products/index.php" class="btn btn-secondary">Browse Components</a>
                <a href="../contact.php" class="btn btn-secondary">Get Expert Help</a>
            </div>
        </div>
    </div>
</div>

<style>
.buy-hero {
    text-align: center;
    padding: 80px 0;
    background: linear-gradient(135deg, rgba(100, 181, 246, 0.1), rgba(25, 118, 210, 0.1));
    border-radius: 15px;
    margin-bottom: 40px;
    position: relative;
    overflow: hidden;
}

.buy-hero::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: radial-gradient(circle at 50% 50%, rgba(100, 181, 246, 0.1), transparent 70%);
    pointer-events: none;
}

.buy-hero h1 {
    position: relative;
    z-index: 1;
    text-shadow: 0 0 20px rgba(100, 181, 246, 0.5);
}

.buy-subtitle {
    font-size: 1.3em;
    margin: 20px 0;
    color: #ccc;
    position: relative;
    z-index: 1;
}

.buy-content {
    max-width: 1200px;
    margin: 0 auto;
}

.buy-overview {
    margin: 60px 0;
}

.overview-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 30px;
    margin-top: 40px;
}

.overview-item {
    text-align: center;
    padding: 25px;
    background: rgba(255, 255, 255, 0.05);
    border-radius: 10px;
    border: 1px solid rgba(255, 255, 255, 0.1);
}

.overview-icon {
    font-size: 2.5em;
    margin-bottom: 15px;
}

.overview-item h3 {
    color: #64b5f6;
    margin-bottom: 10px;
}

.buy-guides {
    margin: 60px 0;
}

.component-guide {
    margin-bottom: 50px;
    padding: 30px;
    background: rgba(255, 255, 255, 0.05);
    border-radius: 10px;
    border: 1px solid rgba(255, 255, 255, 0.1);
}

.component-guide h3 {
    color: #64b5f6;
    margin-bottom: 20px;
    font-size: 1.3em;
}

.guide-content h4 {
    color: #fff;
    margin: 20px 0 10px;
}

.guide-content ul {
    margin-left: 20px;
    line-height: 1.6;
}

.guide-content li {
    margin-bottom: 8px;
    color: #ccc;
}

.recommendations {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 15px;
    margin-top: 15px;
}

.rec-item {
    padding: 10px;
    background: rgba(100, 181, 246, 0.1);
    border-radius: 5px;
    border: 1px solid rgba(100, 181, 246, 0.3);
    font-size: 0.9em;
}

.budget-guides {
    margin: 60px 0;
}

.budget-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 30px;
    margin-top: 40px;
}

.budget-card {
    padding: 30px;
    background: rgba(255, 255, 255, 0.05);
    border-radius: 10px;
    border: 1px solid rgba(255, 255, 255, 0.1);
}

.budget-card h3 {
    color: #64b5f6;
    margin-bottom: 20px;
}

.budget-specs p {
    margin-bottom: 8px;
    color: #ccc;
}

.budget-use {
    margin-top: 20px;
    padding: 10px;
    background: rgba(76, 175, 80, 0.1);
    border-radius: 5px;
    border: 1px solid rgba(76, 175, 80, 0.3);
    color: #4caf50;
    font-style: italic;
}

.buying-tips {
    margin: 60px 0;
}

.tips-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 30px;
    margin-top: 40px;
}

.tip-item {
    padding: 25px;
    background: rgba(255, 255, 255, 0.05);
    border-radius: 10px;
    border: 1px solid rgba(255, 255, 255, 0.1);
}

.tip-item h3 {
    color: #64b5f6;
    margin-bottom: 15px;
}

.tip-item ul {
    list-style: none;
    padding: 0;
}

.tip-item ul li {
    margin-bottom: 8px;
    color: #ccc;
    padding-left: 20px;
    position: relative;
}

.tip-item ul li::before {
    content: '•';
    color: #64b5f6;
    position: absolute;
    left: 0;
}

.compatibility-check {
    margin: 60px 0;
}

.checklist-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 30px;
    margin-top: 40px;
}

.checklist-item {
    padding: 25px;
    background: rgba(255, 255, 255, 0.05);
    border-radius: 10px;
    border: 1px solid rgba(255, 255, 255, 0.1);
}

.checklist-item h3 {
    color: #64b5f6;
    margin-bottom: 15px;
}

.buy-resources {
    margin: 60px 0;
}

.resources-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 30px;
    margin-top: 40px;
}

.resource-item {
    padding: 25px;
    background: rgba(255, 255, 255, 0.05);
    border-radius: 10px;
    border: 1px solid rgba(255, 255, 255, 0.1);
}

.resource-item h3 {
    color: #64b5f6;
    margin-bottom: 15px;
}

.resource-item ul {
    list-style: none;
    padding: 0;
}

.resource-item ul li {
    margin-bottom: 8px;
    color: #ccc;
}

.resource-item ul li a {
    color: #64b5f6;
    text-decoration: none;
}

.resource-item ul li a:hover {
    text-decoration: underline;
}

.buy-next {
    text-align: center;
    margin: 60px 0;
    padding: 40px;
    background: rgba(255, 255, 255, 0.05);
    border-radius: 10px;
    border: 1px solid rgba(255, 255, 255, 0.1);
}

.buy-next h2 {
    color: #64b5f6;
    margin-bottom: 15px;
}

.buy-next p {
    margin-bottom: 30px;
    color: #ccc;
}

.next-actions {
    display: flex;
    gap: 20px;
    justify-content: center;
    flex-wrap: wrap;
}

@media (max-width: 768px) {
    .overview-grid {
        grid-template-columns: repeat(2, 1fr);
    }
    
    .budget-grid {
        grid-template-columns: 1fr;
    }
    
    .tips-grid {
        grid-template-columns: 1fr;
    }
    
    .checklist-grid {
        grid-template-columns: 1fr;
    }
    
    .resources-grid {
        grid-template-columns: 1fr;
    }
    
    .next-actions {
        flex-direction: column;
        align-items: center;
    }
}
</style>

<?php include '../includes/footer.php'; ?>
