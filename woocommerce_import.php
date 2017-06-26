<?php

	$mysqli = new mysqli('localhost:3306', 'wp_radarcart_test', '*******', 'wp_radarcart_test'); 
	if ($mysqli->connect_errno) {
    	echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	}

	$query_text = "select product_to_category.category_id, product_description.product_id, 0, 'published' as post_status, product_description.name as post_title, product_description.description as post_excerpt, product.image as featured_image, product.featured, category_description.name as category from product_description, product, category_description, product_to_category, category where product.product_id = product_description.product_id and product.product_id = product_to_category.product_id and product_to_category.category_id = category_description.category_id and category_description.category_id = category.category_id order by product_description.product_id";
	$res = $mysqli->query($query_text);

	$output_array = array();
	$last_product_id = -1;

	while($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
		$array = $res->fetch_array(MYSQLI_ASSOC);

		$last_product_tags_string = '';
		
		if (
			($array["category"] == 'Printed Materials') || 
			($array["category"] == 'Video Library') || 
			($array["category"] == 'Posters') || 
			($array["category"] == 'Download Only')
		) {
			$last_product_tags_string .= '|' . $array["category"];
		}
		
		$categories_array = array();
		if (
			($array["category"] != 'Topic') && 
			($array["category"] != 'Type') && 
			($array["category"] != 'Audience') && 
			($array["category"] != 'Printed Materials') && 
			($array["category"] != 'Video Library') && 
			($array["category"] != 'Posters') && 
			($array["category"] != 'Download Only')
		) {
			$categories_array[] = $array["category"];
		}
		
		$parent_category_id = $array["category_id"]; // Just to get the while loop started 
		$featured_image = strip_tags(html_entity_decode($array["featured_image"]), '<a>');

		while($parent_category_id <> 0) {
			$query2 = "select category_description.name, category_description.category_id, category.category_id, category.parent_id from category_description, category where category.category_id = $parent_category_id and category.parent_id = category_description.category_id";
			$res2 = $mysqli->query($query2);

			$row2 = mysqli_fetch_array($res2, MYSQLI_ASSOC);
			$parent_category_id = $row2["parent_id"];
			$parent_category = $row2["name"];

			if (
				($parent_category == 'Printed Materials') || 
				($parent_category == 'Video Library') || 
				($parent_category == 'Posters') || 
				($parent_category == 'Download Only')
			) {
				$last_product_tags_string .= '|' . $parent_category;
			}

			if (
				($parent_category != 'Topic') && 
				($parent_category != 'Type') && 
				($parent_category != 'Audience') && 
				($parent_category != 'Printed Materials') && 
				($parent_category != 'Video Library') && 
				($parent_category != 'Posters') && 
				($parent_category != 'Download Only')
			) {
				if ($parent_category_id > 0) {
					$categories_array[] = $parent_category;
				}
			}
			$res2->close();
		}

		$categories_string = '';
		while(!empty($categories_array)) {
			$categories_string .= array_pop($categories_array);
			$categories_string .= " > ";
		}

		$categories_string = substr($categories_string, 0, strlen($categories_string)-3);

		// Our query will return one row for each product id / category combination
		// A product with multiple categories will show up more than once.
		// Concatenate the category strings, and only put the product into the 
		// output_array one time.
		if ($array["product_id"] == $last_product_id) {
			$last_product_categories_string .= "|" . $categories_string;
		} else {
			$last_product_categories_string = $categories_string;
		}

		$last_product_id = $array["product_id"];
		$post_excerpt = strip_tags(html_entity_decode($array["post_excerpt"]));

        // If post_excerpt includes 'Download PDF</a>' apply tag and category of "Download Only":
        $pattern1 = '/Download PDF\<\/a\>/i';
        $pattern2 = '/View PDF\<\/a\>/i';
        $pattern3 = '/Download&nbps;PDF\<\/a\>/i';
        $pattern4 = '/"\>view\<\/a\>/i';
        $pattern5 = '/"\>download fotonovela\<\/a\>/i';
        $pattern6 = '/"\>download transcripcion\<\/a\>/i';
        $pattern7 = '/"\>download comic book pdf\<\/a\>/i';
		if(
			(preg_match($pattern1, $post_excerpt, '<a>')) || 
			preg_match($pattern2, $post_excerpt, '<a>') || 
			preg_match($pattern3, $post_excerpt, '<a>') || 
			preg_match($pattern4, $post_excerpt, '<a>') || 
			preg_match($pattern5, $post_excerpt, '<a>') || 
			preg_match($pattern6, $post_excerpt, '<a>') || 
			preg_match($pattern7, $post_excerpt, '<a>')
		) {
			$last_product_tags_string .= "|Download Only";
			$pattern = '/\/radar\/pdfs\/file\/(.*).pdf/';
			$replacement = "/library/files/2017/06/${1}.pdf";
			$post_excerpt = preg_replace($pattern, $replacement, $post_excerpt);
        }

		if(strstr($last_product_categories_string, 'Poster')) {
			$last_product_tags_string .= "|Poster"; 
		}

		if(strstr($last_product_categories_string, 'Spanish')) {
			$last_product_tags_string .= "|Spanish"; 
		}

		if(strstr($last_product_categories_string, 'Multicultural')) {
			$last_product_tags_string .= "|Multicultural"; 
		}

		$tags_array = array_unique(explode('|', $last_product_tags_string));

		// This should be discussed: I say that if something is "Download Only"
		// it shouldn't also be tagged "Printed Materials" because it's digital, not physical.
		if (in_array('Download Only', $tags_array) && in_array('Printed Materials', $tags_array)) {
			$target_index = array_search('Printed Materials', $tags_array);
			if ($target_index) {
				unset($tags_array[$target_index]);
			}
		}

		$tags_string_final = implode('|', $tags_array);
		if (substr($tags_string_final, 0, 1) == '|') {
			$tags_string_final = substr($tags_string_final, 1);
		}

		if(strstr($tags_string_final, 'Video Library')) {
			$featured_image = 'video-placeholder.png';
		}
		
		// If tag includes 'Download' leave the price empty so there's no Add To Cart:
		$regular_price = '0';
		if (stristr($last_product_tags_string, 'Download')) {
			$regular_price = '';
		}

		$output_array[$array["product_id"]] = array(
			"sku" => $array["product_id"], 
			"post_status" => strip_tags(html_entity_decode($array["post_status"]), '<a>'), 
			"post_title" => strip_tags(html_entity_decode($array["post_title"]), '<a>'), 
			"post_excerpt" => strip_tags(html_entity_decode($array["post_excerpt"]), '<a>'), 
			"regular_price" => $regular_price, 
			"manage_stock" => 'no', 
			"backorders" => 'no', 
			"featured_image" => $featured_image, 
			"comment_status" => 'closed',
			"category" => $last_product_categories_string, 
			"tag" => $tags_string_final, 
			"featured" => $array["featured"]
		);
	}

	header('Content-Type: text/csv');
	header('Content-Disposition: attachment; filename=output.csv');
	header('Pragma: no-cache');
	header("Expires: 0");

	$outstream = fopen("php://output", "w");

	$headers = array("sku", "post_status", "post_title", "post_excerpt", "regular_price", "manage_stock", "backorders", "featured_image", "comment_status", "category", "tags", "featured");

	fputcsv($outstream, $headers);

	foreach ($output_array as $product) {
		fputcsv($outstream, $product);
	}

	$res->close();
	fclose($outstream);
	$mysqli->close();
?>