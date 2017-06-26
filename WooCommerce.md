# Audience

This document is for use by OIT's WP Support team. Creating and configuring a Woocommerce site is fairly technical, so the content here isn't useful to site admins.

# Description

Woocommerce (woocommerce.com) is a shopping cart plugin that allows site admins to create and sell products on a WordPress site. Woocommerce is OIT’s only supported shopping cart. 

Woocommerce handles inventory and the user's shopping experience. Payment gateways, such as uPay and PayPal, process the payments. Woocommerce extensions are available to support various payment gateways. The university’s only approved payment gateway is Touchnet uPay. 

In several cases on campus, Woocommerce is useful without a payment gateway; it can stand alone and serve as a shopping cart to allow users to order free items or download digital materials. (See radarcart.boisestate.edu and oshconcart.boisestate.edu.)

# Creating a New WooCommerce Site

Follow these steps to create and configure a new Woocommerce site.
 ## Site Creation

Create a new site or subsite via our standard procedures. (See Setting Up New Sites and Subsites.)
## Themes and Plugins

1. Install and activate the WooCommerce Storefront theme.
1. Install and activate the Customizer Export/Import plugin.
1. Install and activate the Boise State Woocommerce Breadcrumb Fix plugin.
1. Install and activate the Scripts-n-Styles plugin.
1. Optionally install and activate the Disable WooCommerce Reviews plugin.

## Storefront Customizations

The Storefront theme's default colors and typefaces don't match the university standard, so we need to customize the theme.
1. Download the storefront-export.dat file. (File is stored on Google Drive, and has been shared with WP Support group and Shad Jessen.) Import it into the new Woocommerce site (Appearance -> Customize -> Export/Import).
1. Paste the following CSS into the Additional CSS form (Appearance -> Customize -> Additional CSS):

```css
	body {
		font-family: "Helvetica Neue", sand-serif;	
	}

	.product_title  {
		font-family: 'Montserrat', sans-serif;
	}

	.woocommerce-products-header__title {
		font-family: 'Montserrat', sans-serif;
	}

	.related {
		font-family: 'Montserrat', sans-serif;
	}
```
1. Create a Scripts-n-Styles hoop to include the necessary external stylesheet for the Google font:
Click Tools > Scripts n Styles, the click the Hoops tab.
Add a new Hoop named "add_googlefonts" with the following content:
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
Edit the Woocommerce shop page (see Woocommerce > Settings > Products > Display). Paste the following shortcode at the top of the page: `[hoops name="add_googlefonts"]`
