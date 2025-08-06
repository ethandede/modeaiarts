<?php
/*
Template Name: Privacy Policy
*/
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Privacy Policy for our AI portrait gallery - learn how we collect, use, and protect your personal information when you visit our website.">
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
            <h1>Privacy Policy</h1>
            <p class="blog-post-meta">Last updated: <?php echo date('F j, Y'); ?></p>
            
            <div class="blog-post-content">
                <p>This Privacy Policy describes how <?php bloginfo('name'); ?> ("we," "us," or "our") collects, uses, and protects your personal information when you visit our website and view our AI-generated portrait collection.</p>
                
                <h2>Information We Collect</h2>
                
                <h3>Automatically Collected Information</h3>
                <p>When you visit our website, we automatically collect certain information about your device and interaction with our site, including:</p>
                <ul>
                    <li>IP address and general location information</li>
                    <li>Browser type and version</li>
                    <li>Operating system</li>
                    <li>Pages visited and time spent on each page</li>
                    <li>Referring website</li>
                    <li>Date and time of visits</li>
                </ul>
                
                <h3>Cookies and Tracking Technologies</h3>
                <p>We use cookies and similar tracking technologies to enhance your browsing experience and analyze website traffic. These technologies help us:</p>
                <ul>
                    <li>Remember your preferences and settings</li>
                    <li>Analyze website usage patterns</li>
                    <li>Improve website performance and user experience</li>
                    <li>Serve relevant advertisements through Google AdSense</li>
                </ul>
                
                <h3>Google Analytics</h3>
                <p>We use Google Analytics to understand how visitors interact with our website. Google Analytics collects information such as how often users visit the site, what pages they visit, and what other sites they used prior to coming to our site. This information helps us improve our website and content.</p>
                
                <h2>How We Use Your Information</h2>
                <p>We use the collected information for the following purposes:</p>
                <ul>
                    <li>To provide and maintain our website and services</li>
                    <li>To analyze website usage and improve user experience</li>
                    <li>To display relevant advertisements through Google AdSense</li>
                    <li>To detect and prevent fraud or abuse</li>
                    <li>To comply with legal obligations</li>
                </ul>
                
                <h2>Google AdSense and Third-Party Advertising</h2>
                <p>We use Google AdSense to display advertisements on our website. Google AdSense uses cookies to serve ads based on your prior visits to our website or other websites. You may opt out of personalized advertising by visiting Google's Ads Settings at <a href="https://www.google.com/settings/ads" target="_blank" rel="noopener">https://www.google.com/settings/ads</a>.</p>
                
                <p>Third-party vendors, including Google, may show your ads on sites across the Internet based on your visits to our website. These third-party vendors use cookies to serve ads based on your previous visits to our website and other websites.</p>
                
                <h2>Data Sharing and Disclosure</h2>
                <p>We do not sell, trade, or otherwise transfer your personal information to third parties, except in the following circumstances:</p>
                <ul>
                    <li>With service providers who assist us in operating our website (such as hosting providers)</li>
                    <li>With advertising partners like Google AdSense for ad serving purposes</li>
                    <li>When required by law or to protect our rights and safety</li>
                    <li>In connection with a business transfer or merger</li>
                </ul>
                
                <h2>Data Security</h2>
                <p>We implement appropriate security measures to protect your personal information against unauthorized access, alteration, disclosure, or destruction. However, no internet transmission or electronic storage method is 100% secure, and we cannot guarantee absolute security.</p>
                
                <h2>Your Rights and Choices</h2>
                <p>You have the right to:</p>
                <ul>
                    <li>Disable cookies in your browser settings (note that this may affect website functionality)</li>
                    <li>Opt out of personalized advertising through Google's Ads Settings</li>
                    <li>Request information about the data we collect about you</li>
                    <li>Request correction or deletion of your personal information</li>
                </ul>
                
                <h2>Children's Privacy</h2>
                <p>Our website is not directed at children under the age of 13, and we do not knowingly collect personal information from children under 13. If we become aware that we have collected personal information from a child under 13, we will delete such information promptly.</p>
                
                <h2>International Users</h2>
                <p>If you are accessing our website from outside the United States, please be aware that your information may be transferred to, stored, and processed in the United States where our servers are located and our central database is operated.</p>
                
                <h2>Changes to This Privacy Policy</h2>
                <p>We may update this Privacy Policy from time to time to reflect changes in our practices or for other operational, legal, or regulatory reasons. We will notify you of any material changes by posting the new Privacy Policy on this page with a new effective date.</p>
                
                <h2>AI-Generated Content</h2>
                <p>All portraits displayed on our website are created using artificial intelligence and do not depict real individuals. No personal data from real people is used in the creation of these AI-generated images.</p>
                
                <h2>Contact Us</h2>
                <p>If you have any questions about this Privacy Policy or our data practices, please contact us at:</p>
                <p>Email: privacy@<?php echo str_replace('www.', '', parse_url(home_url(), PHP_URL_HOST)); ?></p>
                
                <p>By using our website, you consent to the collection and use of information in accordance with this Privacy Policy.</p>
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