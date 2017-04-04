# Switching a WordPress Site From Jetpack-Based Subscriptions to Mailchimp
Some sites are using Jetpack to allow users to subscribe to their blog. We want to discontinue use of Jetpack, so we need to help those sites move to Mailchimp to handle their blog subscriptions.

1. Export your existing Jetpack subscriber list(s).  
(See also [How to Switch from JetPack Subscription to MailChimp](http://www.wpbeginner.com/wp-tutorials/how-to-switch-from-jetpack-subscription-to-mailchimp-aweber-etc/).)
 1. Log in to your WordPress site.
 2. Navigate to Site Dashboard.
 1. Click the "Jetpack" item in the left nav.
 1. Click the "View Old Stats" button.
 1. Click the "blog" link in the Subscriptions box to see that list’s subscribers.
 1. Click "Download all email-only followers as CSV.”
 1. Log in to WordPress.com. Once you’ve logged in, the names will automatically download in a CSV file.  
 **Note:** this does not download WordPress.com users. Those email addresses are not available for export.
1. [Create a Mailchimp account.](http://eepurl.com/b2Q7G9)

1. [Create your Mailchimp list.](http://kb.mailchimp.com/lists/growth/create-a-new-list)
1. Import Jetpack subscribers into your Mailchimp lists:
 1. From the Mailchimp dashboard, click "View lists."
 1. Click the name of the list to which you'll add the subcribers.
 1. Click "Add subscribers."
 1. Click "Import subscribers."
 1. Upload your CSV file.  
 **Note:** Mailchimp's import page includes the following disclaimers: "Duplicate addresses will be removed. We do not send confirmation emails to imported addresses and trust that you’ve gathered proper permission to send to every address on your list."
1. [Get your Mailchimp API key](http://kb.mailchimp.com/integrations/api-integrations/about-api-keys), and copy it to your clipboard.
1. Install and configure the plugin "MailChimp for WordPress By ibericode."
 1. Install the plugin.
 1. Go to your Site Dashboard
 1. In the left nav, click "Mailchimp for WP."
 1. Paste your API Key into the appropriate field and click “Save Changes."
1. Create a new subscription form to add to your WordPress site.
 1. On the left nav, under "Mailchimp for WP," click "Forms."
 1. Give the form a name.
 1. Check the box next to the list this form will subcribe to.
 1. Click the "Add new form" button.
 1. Copy the short code from this page to embed this form into your WordPress pages.
 1. Click "Save Changes."
1. In Mailchimp:
 - [Create an RSS campaign](http://kb.mailchimp.com/campaigns/rss-in-campaigns/create-an-rss-campaign). In the Recipients Step, select the list you created above.

## Notes

 - Jetpack sends an email to subscribers as soon as the new post is published. Mailchimp will send on a user-defined schedule, no more than once per day.
