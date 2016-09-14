Switching a WordPress Site From Jetpack-Based Subscriptions to Mailchimp

1. Export your existing Jetpack subscriber list(s)  
See also [How to Switch from JetPack Subscription to MailChimp](http://www.wpbeginner.com/wp-tutorials/how-to-switch-from-jetpack-subscription-to-mailchimp-aweber-etc/)
 1. Log in to your WordPress site.
 2. Navigate to Site Dashboard.
 1. Click the "Jetpack" item in the left nav.
 1. Click "View Old Stats" button.
 1. Click "blog" link in the Subscriptions box to see that list’s subscribers.
 1. Click "Download all email-only followers as CSV.”
 1. Log in to WordPress.com. Once you’ve logged in, the names will automatically download in a CSV file.
1. [Create a Mailchimp account.](http://eepurl.com/b2Q7G9)
1. [Create your Mailchimp list.](http://kb.mailchimp.com/lists/growth/create-a-new-list)
1. Import Jetpack subscribers into your Mailchimp lists
 - From the Mailchimp dashboard, click View lists.
 - Click the name of the list to which you'll add the subcribers.
 - Click Add subscribers.
 - Click Import subscribers.
 - Upload your CSV file.
1. [Get your Mailchimp API key.](http://kb.mailchimp.com/integrations/api-integrations/about-api-keys)
 - Copy your API key to your clipboard.
1. Install and configure the plugin "MailChimp for WordPress By ibericode"
 - Install the plugin.
 - Go to your Site Dashboard
 - In the left nav, click "Mailchimp for WP."
 - Paste your API Key into the appropriate field and click “Save Changes."
 - On the left nav, under "Mailchimp for WP," click "Forms."
 - Click the Settings tab.
 - Select the Mailchimp lists to which this form should add users by checking the appropriate box(es) on the "Lists this form subscribes to” list.
1. In mailchimp:
 - Create an RSS campaign
 - enter the address of your site’s RSS feed
 - set the schedule—when should the campaign send emails?
 - For the campaign’s recipients, identify the list...

**Notes**
 - jetpack sends an email to subscribers as soon as the new post is published. Mailchimp will on a predetermined schedule, no more than once per day