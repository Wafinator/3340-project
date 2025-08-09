// Main JavaScript for WafiTechParts

document.addEventListener('DOMContentLoaded', function () {
    // Initialize all components
    initMobileMenu();
    initThemeSwitcher();
    initFormValidation();
    initProductFilters();
    initBuildCalculator();
    initSearchFunctionality();
    initCartBadgeUpdater();
});

// Mobile Menu Toggle
function initMobileMenu() {
    const mobileToggle = document.querySelector('.mobile-menu-toggle');
    const navLinks = document.querySelector('.nav-links');

    if (mobileToggle && navLinks) {
        mobileToggle.addEventListener('click', function () {
            navLinks.classList.toggle('active');
            mobileToggle.classList.toggle('active');
        });

        // Close mobile menu when clicking outside
        document.addEventListener('click', function (event) {
            if (!mobileToggle.contains(event.target) && !navLinks.contains(event.target)) {
                navLinks.classList.remove('active');
                mobileToggle.classList.remove('active');
            }
        });
    }
}

// Theme Switcher
function initThemeSwitcher() {
    const themeSelect = document.getElementById('theme-select');
    if (themeSelect) {
        themeSelect.addEventListener('change', function () {
            changeTheme(this.value);
        });
    }
}

function changeTheme(theme) {
    // Show loading indicator
    const loadingIndicator = document.createElement('div');
    loadingIndicator.className = 'loading';
    loadingIndicator.style.position = 'fixed';
    loadingIndicator.style.top = '50%';
    loadingIndicator.style.left = '50%';
    loadingIndicator.style.transform = 'translate(-50%, -50%)';
    loadingIndicator.style.zIndex = '9999';
    document.body.appendChild(loadingIndicator);

    // Send AJAX request to update theme
    fetch('user/update-theme.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'theme=' + theme
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Reload page to apply new theme
                window.location.reload();
            } else {
                showAlert('Error changing theme. Please try again.', 'error');
            }
        })
        .catch(error => {
            console.error('Error changing theme:', error);
            showAlert('Error changing theme. Please try again.', 'error');
        })
        .finally(() => {
            document.body.removeChild(loadingIndicator);
        });
}

// Cart badge updater
function initCartBadgeUpdater() {
    // Watch for cart changes via events from cart page
    document.addEventListener('cart-updated', function(e) {
        const count = e.detail && e.detail.count ? e.detail.count : null;
        if (count !== null) {
            const badge = document.getElementById('cart-count');
            if (badge) badge.textContent = count;
        }
    });
}

// Form Validation
function initFormValidation() {
    const forms = document.querySelectorAll('form[data-validate]');

    forms.forEach(form => {
        form.addEventListener('submit', function (e) {
            if (!validateForm(this)) {
                e.preventDefault();
            }
        });
    });
}

function validateForm(form) {
    let isValid = true;
    const requiredFields = form.querySelectorAll('[required]');

    requiredFields.forEach(field => {
        if (!field.value.trim()) {
            showFieldError(field, 'This field is required.');
            isValid = false;
        } else {
            clearFieldError(field);
        }

        // Email validation
        if (field.type === 'email' && field.value.trim()) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(field.value)) {
                showFieldError(field, 'Please enter a valid email address.');
                isValid = false;
            }
        }

        // Password validation
        if (field.type === 'password' && field.value.trim()) {
            if (field.value.length < 6) {
                showFieldError(field, 'Password must be at least 6 characters long.');
                isValid = false;
            }
        }
    });

    return isValid;
}

function showFieldError(field, message) {
    clearFieldError(field);

    const errorDiv = document.createElement('div');
    errorDiv.className = 'field-error';
    errorDiv.style.color = '#f44336';
    errorDiv.style.fontSize = '0.9em';
    errorDiv.style.marginTop = '5px';
    errorDiv.textContent = message;

    field.parentNode.appendChild(errorDiv);
    field.style.borderColor = '#f44336';
}

function clearFieldError(field) {
    const existingError = field.parentNode.querySelector('.field-error');
    if (existingError) {
        existingError.remove();
    }
    field.style.borderColor = '';
}

// Product Filters
function initProductFilters() {
    const filterButtons = document.querySelectorAll('.filter-btn');
    const productCards = document.querySelectorAll('.product-card');

    filterButtons.forEach(button => {
        button.addEventListener('click', function () {
            const category = this.dataset.category;

            // Update active filter button
            filterButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');

            // Filter products
            productCards.forEach(card => {
                if (category === 'all' || card.dataset.category === category) {
                    card.style.display = 'block';
                    card.style.animation = 'fadeIn 0.5s ease';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    });
}

// Build Calculator
function initBuildCalculator() {
    const calculatorForm = document.getElementById('build-calculator');
    if (calculatorForm) {
        calculatorForm.addEventListener('submit', function (e) {
            e.preventDefault();
            calculateBuild();
        });

        // Update total when components change
        const componentSelects = calculatorForm.querySelectorAll('select[data-price]');
        componentSelects.forEach(select => {
            select.addEventListener('change', updateBuildTotal);
        });
    }
}

function calculateBuild() {
    const form = document.getElementById('build-calculator');
    const formData = new FormData(form);
    const components = {};

    // Collect selected components
    formData.forEach((value, key) => {
        if (key.startsWith('component_')) {
            components[key] = value;
        }
    });

    // Calculate total
    let total = 0;
    const componentSelects = form.querySelectorAll('select[data-price]');
    componentSelects.forEach(select => {
        const selectedOption = select.options[select.selectedIndex];
        if (selectedOption && selectedOption.dataset.price) {
            total += parseFloat(selectedOption.dataset.price);
        }
    });

    // Display results
    const resultsDiv = document.getElementById('build-results');
    if (resultsDiv) {
        resultsDiv.innerHTML = `
            <h3>Your Build Summary</h3>
            <div class="build-summary">
                <p><strong>Total Cost:</strong> $${total.toFixed(2)}</p>
                <p><strong>Estimated Performance:</strong> ${getPerformanceRating(total)}</p>
            </div>
            <button type="button" class="btn" onclick="saveBuild()">Save This Build</button>
        `;
        resultsDiv.style.display = 'block';
    }
}

function updateBuildTotal() {
    const form = document.getElementById('build-calculator');
    let total = 0;

    const componentSelects = form.querySelectorAll('select[data-price]');
    componentSelects.forEach(select => {
        const selectedOption = select.options[select.selectedIndex];
        if (selectedOption && selectedOption.dataset.price) {
            total += parseFloat(selectedOption.dataset.price);
        }
    });

    const totalDisplay = document.getElementById('build-total');
    if (totalDisplay) {
        totalDisplay.textContent = `$${total.toFixed(2)}`;
    }
}

function getPerformanceRating(total) {
    if (total >= 2000) return 'High-End Gaming';
    if (total >= 1500) return 'Mid-Range Gaming';
    if (total >= 1000) return 'Entry-Level Gaming';
    if (total >= 800) return 'Office/Productivity';
    return 'Basic Computing';
}

// Search Functionality
function initSearchFunctionality() {
    const searchInput = document.getElementById('search-input');
    if (searchInput) {
        searchInput.addEventListener('input', function () {
            const searchTerm = this.value.toLowerCase();
            const productCards = document.querySelectorAll('.product-card');

            productCards.forEach(card => {
                const title = card.querySelector('.product-title').textContent.toLowerCase();
                const description = card.querySelector('.product-description').textContent.toLowerCase();

                if (title.includes(searchTerm) || description.includes(searchTerm)) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    }
}

// Alert System
function showAlert(message, type = 'info') {
    const alertDiv = document.createElement('div');
    alertDiv.className = `alert alert-${type}`;
    alertDiv.textContent = message;

    // Add close button
    const closeBtn = document.createElement('span');
    closeBtn.innerHTML = '&times;';
    closeBtn.style.float = 'right';
    closeBtn.style.cursor = 'pointer';
    closeBtn.style.fontWeight = 'bold';
    closeBtn.onclick = function () {
        document.body.removeChild(alertDiv);
    };

    alertDiv.appendChild(closeBtn);
    document.body.insertBefore(alertDiv, document.body.firstChild);

    // Auto-remove after 5 seconds
    setTimeout(() => {
        if (document.body.contains(alertDiv)) {
            document.body.removeChild(alertDiv);
        }
    }, 5000);
}

// Utility Functions
function formatPrice(price) {
    return new Intl.NumberFormat('en-US', {
        style: 'currency',
        currency: 'USD'
    }).format(price);
}

function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}

// Save build to localStorage
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
    savedBuilds.push({
        id: Date.now(),
        name: `Build ${savedBuilds.length + 1}`,
        components: buildData,
        date: new Date().toISOString()
    });

    localStorage.setItem('savedBuilds', JSON.stringify(savedBuilds));
    showAlert('Build saved successfully!', 'success');
}

// Add CSS animations
const style = document.createElement('style');
style.textContent = `
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    .product-card {
        animation: fadeIn 0.5s ease;
    }
    
    .filter-btn.active {
        background-color: #64b5f6;
        color: white;
    }
`;
document.head.appendChild(style); 