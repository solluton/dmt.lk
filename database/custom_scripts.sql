-- Custom Scripts Table
-- This table stores custom JavaScript and HTML code for injection into website pages

CREATE TABLE IF NOT EXISTS custom_scripts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT NULL,
    script_head TEXT NULL,
    script_body TEXT NULL,
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Insert some sample scripts for demonstration
INSERT INTO custom_scripts (name, description, script_head, script_body, is_active) VALUES
('Google Analytics', 'Google Analytics tracking code', '<!-- Google Analytics --><script async src="https://www.googletagmanager.com/gtag/js?id=GA_MEASUREMENT_ID"></script><script>window.dataLayer = window.dataLayer || [];function gtag(){dataLayer.push(arguments);}gtag(\'js\', new Date());gtag(\'config\', \'GA_MEASUREMENT_ID\');</script>', '', TRUE),
('Facebook Pixel', 'Facebook conversion tracking pixel', '', '<!-- Facebook Pixel Code --><script>!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version=\'2.0\';n.queue=[];t=b.createElement(e);t.async=!0;t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window, document,\'script\',\'https://connect.facebook.net/en_US/fbevents.js\');fbq(\'init\', \'YOUR_PIXEL_ID\');fbq(\'track\', \'PageView\');</script><noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=YOUR_PIXEL_ID&ev=PageView&noscript=1" /></noscript>', FALSE),
('Custom Chat Widget', 'Live chat widget for customer support', '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/livechat-widget@latest/dist/livechat.css">', '<script src="https://cdn.jsdelivr.net/npm/livechat-widget@latest/dist/livechat.js"></script><script>LiveChat.init({license: \'YOUR_LICENSE_ID\', group: \'YOUR_GROUP_ID\'});</script>', TRUE);
