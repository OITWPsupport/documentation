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
1. Create a new subscription form to add to your WordPress site.
 - On the left nav, under "Mailchimp for WP," click "Forms."
 - Give the form a name.
 - Check the box next the list this form will submit to.
 - Click the "Add new form" button.
 - Copy the short code from this page to embed this form into your WordPress pages.
 - Click "Save Changes."
1. In Mailchimp:
 - [Create an RSS campaign](http://kb.mailchimp.com/campaigns/rss-in-campaigns/create-an-rss-campaign). In the Recipients Step, select the liast you created above.

**Notes**
 - jetpack sends an email to subscribers as soon as the new post is published. Mailchimp will on a predetermined schedule, no more than once per day