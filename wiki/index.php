<?php 
$page_title = "Help Wiki";
include '../includes/header.php'; 
?>

<div class="container">
    <section class="wiki-hero">
        <h1>WafiTechParts Help Wiki</h1>
        <p class="wiki-subtitle">Everything you need to know about PC building and our services</p>
    </section>

    <div class="wiki-content">
        <div class="wiki-navigation">
            <h2>Quick Navigation</h2>
            <div class="nav-grid">
                <a href="faq.php" class="nav-card">
                    <div class="nav-icon">❓</div>
                    <h3>Frequently Asked Questions</h3>
                    <p>Find answers to common questions about PC building, ordering, and our services.</p>
                </a>
                
                <a href="how-to-build.php" class="nav-card">
                    <div class="nav-icon">🔧</div>
                    <h3>How to Build a PC</h3>
                    <p>Step-by-step guide to building your own custom PC from scratch.</p>
                </a>
                
                <a href="how-to-buy.php" class="nav-card">
                    <div class="nav-icon">🛒</div>
                    <h3>How to Buy Components</h3>
                    <p>Learn how to choose the right components for your needs and budget.</p>
                </a>
                
                <a href="compatibility-guide.php" class="nav-card">
                    <div class="nav-icon">⚙️</div>
                    <h3>Compatibility Guide</h3>
                    <p>Understanding component compatibility and avoiding common mistakes.</p>
                </a>
                
                <a href="troubleshooting.php" class="nav-card">
                    <div class="nav-icon">🔍</div>
                    <h3>Troubleshooting</h3>
                    <p>Common PC building problems and their solutions.</p>
                </a>
                
                <a href="maintenance.php" class="nav-card">
                    <div class="nav-icon">🧹</div>
                    <h3>PC Maintenance</h3>
                    <p>Keeping your custom PC running smoothly for years to come.</p>
                </a>
            </div>
        </div>

        <div class="wiki-featured">
            <h2>Getting Started</h2>
            <div class="featured-content">
                <div class="featured-item">
                    <h3>🎯 New to PC Building?</h3>
                    <p>Start with our <a href="how-to-build.php">How to Build a PC</a> guide. It covers everything from choosing components to assembling your first custom PC.</p>
                </div>
                
                <div class="featured-item">
                    <h3>💰 Budget Planning</h3>
                    <p>Use our <a href="../products/build-calculator.php">Build Calculator</a> to estimate costs and find the perfect components for your budget.</p>
                </div>
                
                <div class="featured-item">
                    <h3>❓ Need Help?</h3>
                    <p>Check our <a href="faq.php">FAQ</a> for quick answers, or <a href="../contact.php">contact our support team</a> for personalized assistance.</p>
                </div>
            </div>
        </div>

        <div class="wiki-tools">
            <h2>Helpful Tools</h2>
            <div class="tools-grid">
                <div class="tool-card">
                    <h3>Build Calculator</h3>
                    <p>Interactive tool to design and price your custom PC build.</p>
                    <a href="../products/build-calculator.php" class="btn">Try Calculator</a>
                </div>
                
                <div class="tool-card">
                    <h3>Compatibility Checker</h3>
                    <p>Verify that your chosen components will work together.</p>
                    <a href="../products/build-calculator.php" class="btn">Check Compatibility</a>
                </div>
                
                <div class="tool-card">
                    <h3>Performance Estimator</h3>
                    <p>Get an estimate of your build's gaming and productivity performance.</p>
                    <a href="../products/build-calculator.php" class="btn">Estimate Performance</a>
                </div>
            </div>
        </div>

        <div class="wiki-resources">
            <h2>Additional Resources</h2>
            <div class="resources-grid">
                <div class="resource-item">
                    <h3>📚 Learning Resources</h3>
                    <ul>
                        <li><a href="how-to-build.php">Complete PC Building Guide</a></li>
                        <li><a href="compatibility-guide.php">Component Compatibility</a></li>
                        <li><a href="how-to-buy.php">Buying Guide</a></li>
                        <li><a href="maintenance.php">PC Maintenance</a></li>
                    </ul>
                </div>
                
                <div class="resource-item">
                    <h3>🎮 Gaming Guides</h3>
                    <ul>
                        <li><a href="gaming-builds.php">Gaming PC Builds</a></li>
                        <li><a href="streaming-setup.php">Streaming Setup Guide</a></li>
                        <li><a href="esports-optimization.php">Esports Optimization</a></li>
                        <li><a href="vr-ready-builds.php">VR-Ready Builds</a></li>
                    </ul>
                </div>
                
                <div class="resource-item">
                    <h3>💼 Workstation Guides</h3>
                    <ul>
                        <li><a href="video-editing-builds.php">Video Editing Builds</a></li>
                        <li><a href="3d-rendering-builds.php">3D Rendering Builds</a></li>
                        <li><a href="programming-builds.php">Programming Workstations</a></li>
                        <li><a href="data-science-builds.php">Data Science Builds</a></li>
                    </ul>
                </div>
                
                <div class="resource-item">
                    <h3>🔧 Technical Support</h3>
                    <ul>
                        <li><a href="troubleshooting.php">Troubleshooting Guide</a></li>
                        <li><a href="warranty-info.php">Warranty Information</a></li>
                        <li><a href="return-policy.php">Return Policy</a></li>
                        <li><a href="../contact.php">Contact Support</a></li>
                    </ul>
                </div>
                
                <div class="resource-item">
                    <h3>📝 Content Management</h3>
                    <ul>
                        <li><a href="how-to-update.php">How to Update Content</a></li>
                        <li><a href="image-guidelines.php">Image Guidelines</a></li>
                        <li><a href="video-requirements.php">Video Requirements</a></li>
                        <li><a href="admin-guide.php">Admin Panel Guide</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="wiki-search">
            <h2>Search Help Articles</h2>
            <div class="search-container">
                <input type="text" id="wiki-search" placeholder="Search for help topics..." class="search-input">
                <button onclick="searchWiki()" class="btn">Search</button>
            </div>
            <div id="search-results" class="search-results"></div>
        </div>
    </div>
</div>

<style>
.wiki-hero {
    text-align: center;
    padding: 80px 0;
    background: linear-gradient(135deg, rgba(100, 181, 246, 0.1), rgba(25, 118, 210, 0.1));
    border-radius: 15px;
    margin-bottom: 40px;
    position: relative;
    overflow: hidden;
}

.wiki-hero::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: radial-gradient(circle at 50% 50%, rgba(100, 181, 246, 0.1), transparent 70%);
    pointer-events: none;
}

.wiki-hero h1 {
    position: relative;
    z-index: 1;
    text-shadow: 0 0 20px rgba(100, 181, 246, 0.5);
}

.wiki-subtitle {
    font-size: 1.3em;
    margin: 20px 0;
    color: #ccc;
    position: relative;
    z-index: 1;
}

.wiki-content {
    max-width: 1200px;
    margin: 0 auto;
}

.wiki-navigation {
    margin: 60px 0;
}

.nav-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 30px;
    margin-top: 40px;
}

.nav-card {
    display: block;
    padding: 30px;
    background: rgba(255, 255, 255, 0.08);
    border-radius: 15px;
    border: 1px solid rgba(255, 255, 255, 0.15);
    backdrop-filter: blur(10px);
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
    text-decoration: none;
    color: #fff;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
    overflow: hidden;
}

.nav-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 3px;
    background: linear-gradient(90deg, #64b5f6, #1976d2);
    opacity: 0;
    transition: opacity 0.3s ease;
}

.nav-card:hover {
    background: rgba(100, 181, 246, 0.15);
    border-color: rgba(100, 181, 246, 0.5);
    transform: translateY(-8px);
    box-shadow: 0 20px 50px rgba(100, 181, 246, 0.3);
}

.nav-card:hover::before {
    opacity: 1;
}

.nav-icon {
    font-size: 2.5em;
    margin-bottom: 15px;
}

.nav-card h3 {
    color: #64b5f6;
    margin-bottom: 15px;
}

.wiki-featured {
    margin: 60px 0;
}

.featured-content {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 30px;
    margin-top: 40px;
}

.featured-item {
    padding: 25px;
    background: rgba(255, 255, 255, 0.05);
    border-radius: 10px;
    border: 1px solid rgba(255, 255, 255, 0.1);
}

.featured-item h3 {
    color: #64b5f6;
    margin-bottom: 15px;
}

.featured-item a {
    color: #64b5f6;
    text-decoration: none;
}

.featured-item a:hover {
    text-decoration: underline;
}

.wiki-tools {
    margin: 60px 0;
}

.tools-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 30px;
    margin-top: 40px;
}

.tool-card {
    text-align: center;
    padding: 30px 20px;
    background: rgba(255, 255, 255, 0.05);
    border-radius: 10px;
    border: 1px solid rgba(255, 255, 255, 0.1);
}

.tool-card h3 {
    color: #64b5f6;
    margin-bottom: 15px;
}

.tool-card p {
    margin-bottom: 20px;
    color: #ccc;
}

.wiki-resources {
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
}

.resource-item ul li a {
    color: #ccc;
    text-decoration: none;
    transition: color 0.3s ease;
}

.resource-item ul li a:hover {
    color: #64b5f6;
}

.wiki-search {
    margin: 60px 0;
    text-align: center;
}

.search-container {
    display: flex;
    gap: 15px;
    justify-content: center;
    margin-top: 30px;
    flex-wrap: wrap;
}

.search-input {
    padding: 12px 20px;
    border: 1px solid #444;
    border-radius: 5px;
    background: rgba(255, 255, 255, 0.1);
    color: #fff;
    font-size: 16px;
    min-width: 300px;
}

.search-input:focus {
    outline: none;
    border-color: #64b5f6;
    box-shadow: 0 0 10px rgba(100, 181, 246, 0.3);
}

.search-results {
    margin-top: 30px;
    text-align: left;
}

@media (max-width: 768px) {
    .nav-grid {
        grid-template-columns: 1fr;
    }
    
    .featured-content {
        grid-template-columns: 1fr;
    }
    
    .tools-grid {
        grid-template-columns: 1fr;
    }
    
    .resources-grid {
        grid-template-columns: 1fr;
    }
    
    .search-container {
        flex-direction: column;
        align-items: center;
    }
    
    .search-input {
        min-width: 250px;
    }
}
</style>

<script>
function searchWiki() {
    const searchTerm = document.getElementById('wiki-search').value.toLowerCase();
    const resultsDiv = document.getElementById('search-results');
    
    if (searchTerm.length < 2) {
        resultsDiv.innerHTML = '<p>Please enter at least 2 characters to search.</p>';
        return;
    }
    
    // Simulate search results
    const searchResults = [
        { title: 'How to Build a PC', url: 'how-to-build.php', excerpt: 'Complete step-by-step guide to building your first custom PC.' },
        { title: 'Component Compatibility', url: 'compatibility-guide.php', excerpt: 'Learn how to ensure all your components work together.' },
        { title: 'Troubleshooting Guide', url: 'troubleshooting.php', excerpt: 'Common problems and their solutions when building a PC.' },
        { title: 'Buying Guide', url: 'how-to-buy.php', excerpt: 'How to choose the right components for your needs and budget.' }
    ];
    
    const filteredResults = searchResults.filter(result => 
        result.title.toLowerCase().includes(searchTerm) || 
        result.excerpt.toLowerCase().includes(searchTerm)
    );
    
    if (filteredResults.length > 0) {
        let resultsHTML = '<h3>Search Results:</h3><div class="search-results-list">';
        filteredResults.forEach(result => {
            resultsHTML += `
                <div class="search-result-item">
                    <h4><a href="${result.url}">${result.title}</a></h4>
                    <p>${result.excerpt}</p>
                </div>
            `;
        });
        resultsHTML += '</div>';
        resultsDiv.innerHTML = resultsHTML;
    } else {
        resultsDiv.innerHTML = '<p>No results found for "' + searchTerm + '". Try different keywords.</p>';
    }
}

// Search on Enter key
document.getElementById('wiki-search').addEventListener('keypress', function(e) {
    if (e.key === 'Enter') {
        searchWiki();
    }
});
</script>

<?php include '../includes/footer.php'; ?> 