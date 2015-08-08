<?php
/**
 * @package WordPress
 * @subpackage themetastic_Theme
 */
?>

<?php $themetastic_searchfieldtext = __('Search the site...', 'themetastic'); ?>

<div>   
    <form class="searchform" method="get" action="<?php echo home_url(); ?>/">
        <input name="s" type="text" placeholder="<?php echo $themetastic_searchfieldtext ?>" />
    </form>
</div>