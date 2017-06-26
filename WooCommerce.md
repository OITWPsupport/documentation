# Audience

This document is for use by OIT's WP Support team. Creating and configuring a Woocommerce site is fairly technical, so the content here isn't useful to site admins.

# Description

[Woocommerce](https://woocommerce.com/) is a shopping cart plugin that allows site admins to create and sell products on a WordPress site. Woocommerce is OIT’s only supported shopping cart. 

Woocommerce handles inventory and the user's shopping experience. Payment gateways, such as uPay and PayPal, process the payments. Woocommerce extensions are available to support various payment gateways. The university’s only approved payment gateway is Touchnet uPay. 

In several cases on campus, Woocommerce is useful without a payment gateway; it can stand alone and serve as a shopping cart to allow users to order free items or download digital materials. (See radarcart.boisestate.edu and oshconcart.boisestate.edu.)

# Creating a New WooCommerce Site

Follow these steps to create and configure a new Woocommerce site.
 ## Site Creation

Create a new site or subsite via our standard procedures. (See [Setting Up New Sites and Subsites](https://sites.google.com/a/boisestate.edu/wordpress-support/setting-up-new-sites-and-subsites).)
## Themes and Plugins

1. Install and activate the [WooCommerce Storefront theme](https://woocommerce.com/storefront/).
1. Install and activate the [Customizer Export/Import plugin](https://wordpress.org/plugins/customizer-export-import/).
1. Install and activate the [Boise State Woocommerce Breadcrumb Fix plugin](https://sites.google.com/a/boisestate.edu/wordpress-support/plugins/boise-state-custom-plugins/plugin-boise-state-woocommerce-breadcrumb-fix).
1. Install and activate the [Scripts-n-Styles plugin](https://wordpress.org/plugins/scripts-n-styles/).
1. Optionally install and activate the [Disable WooCommerce Reviews plugin](https://wordpress.org/plugins/disable-woocommerce-reviews/).

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
3. Create a Scripts-n-Styles hoop to include the necessary external stylesheet for the Google font:
Click Tools > Scripts n Styles, the click the Hoops tab.
Add a new Hoop named "add_googlefonts" with the following content:
`<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">`
Edit the Woocommerce shop page (see Woocommerce > Settings > Products > Display). Paste the following shortcode at the top of the page: `[hoops name="add_googlefonts"]`

## Optional Customizations

Often, Woocommerce is used to allow users to order free items. You can hide the price-related page elements described below by adding the CSS code from the example into the Additional CSS form (Appearance -> Customize -> Additional CSS).

To hide a product's price from the product info page:

![alt text](https://github.com/OITWPsupport/documentation/blob/master/images/screenshot1.png "On-screen location of price info to be hidden.")
```css
.woocommerce-Price-amount {
    display: none !important;
}
```
To hide the dollar amount in the top-right shopping cart summary:

![alt text](https://github.com/OITWPsupport/documentation/blob/master/images/screenshot2.png "On-screen location of shopping cart summary to be hidden.")
```css
.amount {
    display: none !important;
}
```

To hide price-related elements from the checkout page:

![alt text](https://github.com/OITWPsupport/documentation/blob/master/images/screenshot3.png "On-screen location of price elements to be hidden.")
```css
.cart-subtotal {
    display: none !important;
}

.order-total {
    display: none !important;
}

.product-price {
    display: none !important;
}

.product-subtotal {
    display: none !important;
}

.cart_totals h2 {
    display: none !important;
}
```

## Inventory

There are a couple ways you can add inventory to your new Woocommerce site.
+ **Add items manually.** [WooCommerce documentation] (https://docs.woocommerce.com/documentation/plugins/woocommerce/getting-started/setup-products/) provides guidance on this process.
+ **Import items from a legacy shopping cart.**
1. On the new site, install the [WP All Import plugin] (https://wordpress.org/plugins/wp-all-import/) and the [WP All Import Woocommerce Add-On plugin]. (https://wordpress.org/plugins/woocommerce-xml-csv-product-import/)
1. Export inventory from the legacy site into a CSV file. The process for doing this will vary depending on the legacy shopping cart software. It will likely require some custom scripting or development. (PHP is one way to do this. Attached is a PHP script that was used to export inventory from an OpenCart site’s database and format it as a CSV.)
1. Use the WordPress Media Uploader to add any images referenced by the CSV file. It's important to do this before importing the CSV data.
1. Import the CSV data using the WP All Import plugin.
