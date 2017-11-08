<?php
/*qq
Plugin Name: API Routes
Description: Custom route for API - depend du thème API
Version: 0.1
Author: Kevin JANIKY
*/

require_once dirname(__FILE__) . '/routes/prestations.php';
require_once dirname(__FILE__) . '/routes/about.php';
require_once dirname(__FILE__) . '/routes/faq.php';
require_once dirname(__FILE__) . '/routes/articles.php';
require_once dirname(__FILE__) . '/routes/portfolio.php';
require_once dirname(__FILE__) . '/routes/email.php';




add_filter( 'allowed_http_origin', '__return_true' );