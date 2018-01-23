<?php
/**
 * Template for displaying search forms
 *
 * @package WordPress
 * @subpackage Buscemi
 * @version 1.0
 */
$searchPlaceholder = get_field('field_5a19bef32617f', 'options');
$searchButton      = get_field('field_5a19befc26180', 'options');

?>

<?php $unique_id = esc_attr(uniqid('search-form-'));?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
	<label for="<?php echo $unique_id; ?>">
		<span class="screen-reader-text"><?php echo $searchPlaceholder; ?></span>
	</label>
	<input type="search" id="<?php echo $unique_id; ?>" class="search-field" placeholder="<?php echo $searchPlaceholder; ?>" value="<?php echo get_search_query(); ?>" name="s" />
	<button type="submit" class="search-submit screen-reader-text"><?php echo $searchButton; ?></button>
</form>
