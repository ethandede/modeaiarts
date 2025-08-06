<?php
/*
Template Name: Terms of Service
*/
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Terms of Service for our AI portrait gallery - understand the rules and guidelines for using our website and viewing our AI-generated art collection.">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<header class="site-header">
    <div class="container">
        <?php if (function_exists('the_custom_logo')) : ?>
            <?php the_custom_logo(); ?>
        <?php else : ?>
            <h1 class="site-title">
                <a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
            </h1>
            <?php if (get_bloginfo('description')) : ?>
                <p class="site-description"><?php bloginfo('description'); ?></p>
            <?php endif; ?>
        <?php endif; ?>
        
        <nav class="main-navigation">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'container' => false,
                'fallback_cb' => 'ai_portraits_fallback_menu'
            ));
            ?>
        </nav>
    </div>
</header>

<main class="main-content">
    <div class="container">
        <article class="blog-post">
            <h1>Terms of Service</h1>
            <p class="blog-post-meta">Last updated: <?php echo date('F j, Y'); ?></p>
            
            <div class="blog-post-content">
                <p>Welcome to <?php bloginfo('name'); ?>. These Terms of Service ("Terms") govern your use of our website and services. By accessing or using our website, you agree to be bound by these Terms.</p>
                
                <h2>Acceptance of Terms</h2>
                <p>By accessing and using this website, you accept and agree to be bound by the terms and provision of this agreement. If you do not agree to abide by the above, please do not use this service.</p>
                
                <h2>Description of Service</h2>
                <p><?php bloginfo('name'); ?> is a digital art gallery featuring AI-generated portraits. Our website provides:</p>
                <ul>
                    <li>A curated collection of AI-generated portrait artwork</li>
                    <li>Information about AI art creation techniques and technology</li>
                    <li>Educational content about digital art and artificial intelligence</li>
                    <li>Gallery navigation and viewing experience</li>
                </ul>
                
                <h2>Intellectual Property Rights</h2>
                
                <h3>AI-Generated Artwork</h3>
                <p>All portraits displayed on this website are created using artificial intelligence and represent original digital artwork. While these images are AI-generated, the curation, presentation, and accompanying content are our intellectual property.</p>
                
                <h3>Website Content</h3>
                <p>The website design, layout, text content, and overall presentation are protected by copyright and other intellectual property laws. You may not reproduce, distribute, or create derivative works without our express written permission.</p>
                
                <h3>Fair Use</h3>
                <p>You may view, download for personal use, and share individual portraits for non-commercial purposes, provided you:</p>
                <ul>
                    <li>Credit our website as the source</li>
                    <li>Do not claim ownership of the artwork</li>
                    <li>Do not use the images for commercial purposes</li>
                    <li>Do not modify or edit the images without permission</li>
                </ul>
                
                <h2>Prohibited Uses</h2>
                <p>You agree not to use the website for any of the following prohibited activities:</p>
                <ul>
                    <li>Commercial use of AI-generated portraits without explicit permission</li>
                    <li>Creating derivative works or modifications of our content</li>
                    <li>Reverse engineering our AI generation processes</li>
                    <li>Attempting to download or scrape large quantities of images</li>
                    <li>Using automated tools to access or interact with the website</li>
                    <li>Violating any applicable laws or regulations</li>
                    <li>Infringing on intellectual property rights</li>
                    <li>Spreading malware or harmful code</li>
                </ul>
                
                <h2>AI-Generated Content Disclaimer</h2>
                <p>Important information about our AI-generated portraits:</p>
                <ul>
                    <li>All portraits are artificially generated and do not depict real people</li>
                    <li>Any resemblance to actual persons is purely coincidental</li>
                    <li>Images are created using machine learning models trained on artistic datasets</li>
                    <li>We make no claims about the accuracy or realism of depicted individuals</li>
                    <li>Content is suitable for general audiences and complies with community standards</li>
                </ul>
                
                <h2>Privacy and Data Collection</h2>
                <p>Your privacy is important to us. Please review our Privacy Policy, which also governs your use of the website, to understand our practices regarding your personal information.</p>
                
                <h2>User Conduct</h2>
                <p>When using our website, you agree to:</p>
                <ul>
                    <li>Use the service for lawful purposes only</li>
                    <li>Respect intellectual property rights</li>
                    <li>Not attempt to gain unauthorized access to our systems</li>
                    <li>Not interfere with the proper working of the website</li>
                    <li>Follow all applicable laws and regulations</li>
                </ul>
                
                <h2>Third-Party Services</h2>
                <p>Our website may contain links to third-party websites or services, including:</p>
                <ul>
                    <li>Google Analytics for website statistics</li>
                    <li>Google AdSense for advertising</li>
                    <li>Social media platforms for sharing</li>
                    <li>External resources and references</li>
                </ul>
                <p>We are not responsible for the content, privacy policies, or practices of third-party services.</p>
                
                <h2>Disclaimers</h2>
                <p>The information on this website is provided on an "as is" basis. We make no warranties, expressed or implied, regarding:</p>
                <ul>
                    <li>The accuracy or completeness of information</li>
                    <li>The suitability of content for any particular purpose</li>
                    <li>The uninterrupted operation of the website</li>
                    <li>The security of data transmission</li>
                </ul>
                
                <h2>Limitation of Liability</h2>
                <p>To the fullest extent permitted by law, <?php bloginfo('name'); ?> shall not be liable for any direct, indirect, incidental, special, consequential, or punitive damages resulting from your use of the website or inability to use the website.</p>
                
                <h2>Content Moderation</h2>
                <p>We reserve the right to:</p>
                <ul>
                    <li>Remove or modify any content at our sole discretion</li>
                    <li>Suspend or terminate access to users who violate these terms</li>
                    <li>Monitor and review user activity for compliance</li>
                    <li>Report illegal activities to appropriate authorities</li>
                </ul>
                
                <h2>Changes to Terms</h2>
                <p>We reserve the right to modify these Terms at any time. Changes will be posted on this page with an updated revision date. Continued use of the website after changes constitutes acceptance of the new Terms.</p>
                
                <h2>Termination</h2>
                <p>We may terminate or suspend your access to the website immediately, without prior notice, if you breach these Terms or engage in prohibited activities.</p>
                
                <h2>Governing Law</h2>
                <p>These Terms shall be governed by and construed in accordance with the laws of [Your Jurisdiction], without regard to conflict of law principles.</p>
                
                <h2>Severability</h2>
                <p>If any provision of these Terms is found to be unenforceable or invalid, that provision shall be limited or eliminated to the minimum extent necessary so that the Terms shall otherwise remain in full force and effect.</p>
                
                <h2>Contact Information</h2>
                <p>If you have any questions about these Terms of Service, please contact us at:</p>
                <p>Email: legal@<?php echo str_replace('www.', '', parse_url(home_url(), PHP_URL_HOST)); ?></p>
                
                <p>By using our website, you acknowledge that you have read, understood, and agree to be bound by these Terms of Service.</p>
            </div>
        </article>
    </div>
</main>

<footer class="site-footer">
    <div class="container">
        <nav class="footer-navigation">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'footer',
                'container' => false,
                'fallback_cb' => false
            ));
            ?>
        </nav>
        <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.</p>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>