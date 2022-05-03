
<?php
get_header();
if(is_front_page()){
?>

<div class="site-content">

    <?php do_action('online_magazine_front_page_template');?>
    
</div>

<?php
}else{

do_action('online_magazine_home_template');

}
get_footer();
