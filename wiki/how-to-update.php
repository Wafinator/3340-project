<?php 
$page_title = "How to Update Content";
include '../includes/header.php'; 
?>

<div class="container">
    <section class="update-hero">
        <h1>How to Update Website Content</h1>
        <p class="update-subtitle">Simple instructions for non-programmers to keep the website fresh and current</p>
    </section>

    <div class="update-content">
        <section class="update-section">
            <h2>📝 Adding New Products</h2>
            <div class="instruction-card">
                <h3>Step 1: Access Admin Panel</h3>
                <ol>
                    <li>Go to the website and log in as admin</li>
                    <li>Click "Admin Panel" in the navigation</li>
                    <li>Select "Manage Products" from the sidebar</li>
                </ol>
                
                <h3>Step 2: Add Product Information</h3>
                <ol>
                    <li>Fill in the product form with:
                        <ul>
                            <li><strong>Name:</strong> Product name (e.g., "Intel Core i7-12700K")</li>
                            <li><strong>Description:</strong> Brief product description</li>
                            <li><strong>Price:</strong> Product price in dollars</li>
                            <li><strong>Category:</strong> Select from dropdown (CPU, GPU, etc.)</li>
                            <li><strong>Brand:</strong> Manufacturer name</li>
                            <li><strong>Image:</strong> Product image filename</li>
                        </ul>
                    </li>
                    <li>Click "Add Product" to save</li>
                </ol>
                
                <h3>Step 3: Add Product Image</h3>
                <ol>
                    <li>Find or create a product image (400x400 pixels recommended)</li>
                    <li>Save the image with a descriptive name (e.g., "cpu_i7_12700k.jpg")</li>
                    <li>Upload the image to: <code>assets/images/products/</code></li>
                    <li>Update the product in admin panel with the correct image filename</li>
                </ol>
            </div>
        </section>

        <section class="update-section">
            <h2>🖼️ Updating Images</h2>
            <div class="instruction-card">
                <h3>Product Images</h3>
                <ul>
                    <li><strong>Location:</strong> <code>assets/images/products/</code></li>
                    <li><strong>Size:</strong> 400x400 pixels recommended</li>
                    <li><strong>Format:</strong> JPG or PNG</li>
                    <li><strong>Naming:</strong> Use descriptive names (e.g., "gpu_rtx_4080.jpg")</li>
                </ul>
                
                <h3>Site Images</h3>
                <ul>
                    <li><strong>Logo:</strong> <code>assets/images/logo.png</code> (200x80px)</li>
                    <li><strong>Backgrounds:</strong> <code>assets/images/hero-bg.jpg</code> (1920x1080px)</li>
                    <li><strong>Favicon:</strong> <code>assets/images/favicon.ico</code> (16x16px)</li>
                </ul>
                
                <h3>Image Sources</h3>
                <ul>
                    <li><strong>Free Stock Photos:</strong> <a href="https://www.pexels.com/" target="_blank">Pexels</a>, <a href="https://pixabay.com/" target="_blank">Pixabay</a></li>
                    <li><strong>Placeholders:</strong> <a href="https://picsum.photos/400/400" target="_blank">Lorem Picsum</a></li>
                    <li><strong>Simple Placeholders:</strong> <a href="https://via.placeholder.com/400x400" target="_blank">Placeholder.com</a></li>
                </ul>
            </div>
        </section>

        <section class="update-section">
            <h2>🎥 Adding Videos</h2>
            <div class="instruction-card">
                <h3>Video Requirements</h3>
                <ul>
                    <li><strong>Location:</strong> <code>assets/videos/</code></li>
                    <li><strong>Format:</strong> MP4, WebM, or OGV</li>
                    <li><strong>Size:</strong> Keep under 50MB per video</li>
                    <li><strong>Duration:</strong> 1-5 minutes recommended</li>
                </ul>
                
                <h3>Recommended Videos</h3>
                <ul>
                    <li><strong>PC Building Guide:</strong> Step-by-step tutorial</li>
                    <li><strong>Product Reviews:</strong> Component demonstrations</li>
                    <li><strong>Company Overview:</strong> About the business</li>
                </ul>
                
                <h3>Video Sources</h3>
                <ul>
                    <li><strong>Free Videos:</strong> <a href="https://pixabay.com/videos/" target="_blank">Pixabay Videos</a></li>
                    <li><strong>Create Your Own:</strong> Use phone camera or screen recording</li>
                    <li><strong>Stock Videos:</strong> <a href="https://www.pexels.com/videos/" target="_blank">Pexels Videos</a></li>
                </ul>
            </div>
        </section>

        <section class="update-section">
            <h2>📄 Updating Content</h2>
            <div class="instruction-card">
                <h3>Text Content</h3>
                <ul>
                    <li><strong>About Page:</strong> Edit <code>about.php</code> for company information</li>
                    <li><strong>Contact Info:</strong> Update email and phone in <code>contact.php</code></li>
                    <li><strong>FAQ:</strong> Add new questions in <code>wiki/faq.php</code></li>
                    <li><strong>Product Descriptions:</strong> Use admin panel to update</li>
                </ul>
                
                <h3>Pricing Updates</h3>
                <ol>
                    <li>Log into admin panel</li>
                    <li>Go to "Manage Products"</li>
                    <li>Click "Edit" on any product</li>
                    <li>Update the price field</li>
                    <li>Click "Update Product"</li>
                </ol>
                
                <h3>Theme Customization</h3>
                <ul>
                    <li><strong>Colors:</strong> Edit CSS files in <code>templates/</code></li>
                    <li><strong>Fonts:</strong> Change font-family in CSS</li>
                    <li><strong>Layout:</strong> Modify <code>assets/css/custom.css</code></li>
                </ul>
            </div>
        </section>

        <section class="update-section">
            <h2>🔧 Technical Maintenance</h2>
            <div class="instruction-card">
                <h3>Regular Tasks</h3>
                <ul>
                    <li><strong>Backup Database:</strong> Export MySQL data monthly</li>
                    <li><strong>Check Links:</strong> Ensure all navigation works</li>
                    <li><strong>Test Forms:</strong> Verify contact form and calculator work</li>
                    <li><strong>Update Prices:</strong> Keep product prices current</li>
                </ul>
                
                <h3>File Management</h3>
                <ul>
                    <li><strong>Organize Images:</strong> Keep product images in <code>assets/images/products/</code></li>
                    <li><strong>Naming Convention:</strong> Use descriptive, lowercase filenames</li>
                    <li><strong>File Sizes:</strong> Optimize images for web (compress if needed)</li>
                    <li><strong>Backup Files:</strong> Keep copies of important files</li>
                </ul>
                
                <h3>Troubleshooting</h3>
                <ul>
                    <li><strong>Images Not Showing:</strong> Check file path and permissions</li>
                    <li><strong>Forms Not Working:</strong> Verify database connection</li>
                    <li><strong>Layout Broken:</strong> Check for missing CSS files</li>
                    <li><strong>Admin Access:</strong> Ensure admin account is active</li>
                </ul>
            </div>
        </section>

        <section class="update-section">
            <h2>📱 Mobile Considerations</h2>
            <div class="instruction-card">
                <h3>Mobile-Friendly Updates</h3>
                <ul>
                    <li><strong>Image Sizes:</strong> Ensure images work on small screens</li>
                    <li><strong>Text Length:</strong> Keep product descriptions concise</li>
                    <li><strong>Navigation:</strong> Test mobile menu functionality</li>
                    <li><strong>Forms:</strong> Verify forms work on mobile devices</li>
                </ul>
                
                <h3>Testing Checklist</h3>
                <ul>
                    <li>✅ Test website on desktop computer</li>
                    <li>✅ Test website on mobile phone</li>
                    <li>✅ Test website on tablet</li>
                    <li>✅ Verify all links work</li>
                    <li>✅ Check that forms submit properly</li>
                    <li>✅ Test theme switching</li>
                    <li>✅ Verify admin panel access</li>
                </ul>
            </div>
        </section>

        <section class="update-section">
            <h2>🚀 Quick Tips</h2>
            <div class="instruction-card">
                <h3>Best Practices</h3>
                <ul>
                    <li><strong>Backup First:</strong> Always backup before making changes</li>
                    <li><strong>Test Changes:</strong> Preview changes before going live</li>
                    <li><strong>Keep Organized:</strong> Use consistent naming conventions</li>
                    <li><strong>Document Changes:</strong> Keep notes of what you've updated</li>
                </ul>
                
                <h3>Common Mistakes to Avoid</h3>
                <ul>
                    <li>❌ Don't use spaces in filenames</li>
                    <li>❌ Don't upload files that are too large</li>
                    <li>❌ Don't delete files without backing up</li>
                    <li>❌ Don't forget to test on different devices</li>
                </ul>
                
                <h3>Need Help?</h3>
                <ul>
                    <li>Check the <a href="faq.php">FAQ page</a> for common questions</li>
                    <li>Review the <a href="how-to-build.php">PC building guide</a> for product knowledge</li>
                    <li>Contact support if you encounter technical issues</li>
                </ul>
            </div>
        </section>
    </div>
</div>

<style>
.update-hero {
    text-align: center;
    padding: 80px 0;
    background: linear-gradient(135deg, rgba(100, 181, 246, 0.1), rgba(25, 118, 210, 0.1));
    border-radius: 15px;
    margin-bottom: 40px;
    position: relative;
    overflow: hidden;
}

.update-hero::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: radial-gradient(circle at 50% 50%, rgba(100, 181, 246, 0.1), transparent 70%);
    pointer-events: none;
}

.update-hero h1 {
    position: relative;
    z-index: 1;
    text-shadow: 0 0 20px rgba(100, 181, 246, 0.5);
}

.update-subtitle {
    font-size: 1.3em;
    margin: 20px 0;
    color: #ccc;
    position: relative;
    z-index: 1;
}

.update-content {
    max-width: 1000px;
    margin: 0 auto;
    padding: 20px;
}

.update-section {
    margin-bottom: 50px;
}

.update-section h2 {
    color: #64b5f6;
    margin-bottom: 20px;
    font-size: 1.5em;
}

.instruction-card {
    background: rgba(255, 255, 255, 0.05);
    border-radius: 10px;
    border: 1px solid rgba(255, 255, 255, 0.1);
    padding: 30px;
    margin-bottom: 20px;
}

.instruction-card h3 {
    color: #64b5f6;
    margin-bottom: 15px;
    font-size: 1.2em;
}

.instruction-card ol,
.instruction-card ul {
    margin-bottom: 20px;
    padding-left: 20px;
}

.instruction-card li {
    margin-bottom: 8px;
    line-height: 1.6;
}

.instruction-card ul li {
    list-style-type: disc;
}

.instruction-card ol li {
    list-style-type: decimal;
}

.instruction-card code {
    background: rgba(100, 181, 246, 0.1);
    padding: 2px 6px;
    border-radius: 3px;
    font-family: monospace;
}

.instruction-card a {
    color: #64b5f6;
    text-decoration: none;
}

.instruction-card a:hover {
    text-decoration: underline;
}

@media (max-width: 768px) {
    .instruction-card {
        padding: 20px;
    }
    
    .update-content {
        padding: 10px;
    }
}
</style>

<?php include '../includes/footer.php'; ?> 