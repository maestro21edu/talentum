<?php
global $theme_sidebars;
$places = array();
foreach ($theme_sidebars as $sidebar){
    if ($sidebar['group'] !== 'footer')
        continue;
    $widgets = theme_get_dynamic_sidebar_data($sidebar['id']);
    if (!is_array($widgets) || count($widgets) < 1)
        continue;
    $places[$sidebar['id']] = $widgets;
}
$place_count = count($places);
$needLayout = ($place_count > 1);
if (theme_get_option('theme_override_default_footer_content')) {
    if ($place_count > 0) {
        $centred_begin = '<div class="art-center-wrapper"><div class="art-center-inner">';
        $centred_end = '</div></div><div class="clearfix"> </div>';
        if ($needLayout) { ?>
<div class="art-content-layout">
    <div class="art-content-layout-row">
        <?php 
        }
        foreach ($places as $widgets) { 
            if ($needLayout) { ?>
            <div class="art-layout-cell art-layout-cell-size<?php echo $place_count; ?>">
            <?php 
            }
            $centred = false;
            foreach ($widgets as $widget) {
                 $is_simple = ('simple' == $widget['style']);
                 if ($is_simple) {
                     $widget['class'] = implode(' ', array_merge(explode(' ', theme_get_array_value($widget, 'class', '')), array('art-footer-text')));
                 }
                 if (false === $centred && $is_simple) {
                     $centred = true;
                     echo $centred_begin;
                 }
                 if (true === $centred && !$is_simple) {
                     $centred = false;
                     echo $centred_end;
                 }
                 theme_print_widget($widget);
            } 
            if (true === $centred) {
                echo $centred_end;
            }
            if ($needLayout) {
           ?>
            </div>
        <?php 
            }
        } 
        if ($needLayout) { ?>
    </div>
</div>
        <?php 
        }
    }
?>
<div class="art-footer-text">
<?php
global $theme_default_options;
echo do_shortcode(theme_get_option('theme_override_default_footer_content') ? theme_get_option('theme_footer_content') : theme_get_array_value($theme_default_options, 'theme_footer_content'));
} else { 
?>
<div class="art-footer-text">
<?php theme_ob_start() ?>
  
<div class="art-content-layout layout-item-0">
    <div class="art-content-layout-row">
    <div class="art-layout-cell layout-item-1" style="width: 67%"><?php if (false === theme_print_sidebar('footer-1-widget-area')) { ?>
        <h4>Most Popular Themes&nbsp;<br /></h4>
    <?php } ?></div><div class="art-layout-cell layout-item-2" style="width: 33%"><?php if (false === theme_print_sidebar('footer-2-widget-area')) { ?>
        <h4>our Services<br /></h4>
    <?php } ?></div>
    </div>
</div>
<div class="art-content-layout-wrapper layout-item-3">
<div class="art-content-layout layout-item-0">
    <div class="art-content-layout-row">
    <div class="art-layout-cell layout-item-4" style="width: 67%"><?php if (false === theme_print_sidebar('footer-3-widget-area')) { ?>
        <table class="art-article" style="width: 100%; "><tbody><tr><td style="width: 50%; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; "><ul><li><span style="color: rgb(255, 255, 255); -webkit-border-horizontal-spacing: 20px; ">Curabitur ullamcorper gravida felis.&nbsp;</span><br /></li><li><span style="color: rgb(255, 255, 255); -webkit-border-horizontal-spacing: 20px; ">Sit amet scelerisque lorem iaculis sed.</span><br /></li><li><span style="color: rgb(255, 255, 255); -webkit-border-horizontal-spacing: 20px; ">Donec vel neque in neque porta venenatis.</span><br /></li></ul></td><td style="width: 50%; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; "><ul><li><span style="color: rgb(255, 255, 255); -webkit-border-horizontal-spacing: 20px; ">Ullamcorper gravida felis scelerisque lorem.</span></li><li><span style="color: rgb(255, 255, 255); -webkit-border-horizontal-spacing: 20px; ">Donec vel neque in neque porta venenatis.&nbsp;</span><br /></li><li><span style="color: rgb(255, 255, 255); -webkit-border-horizontal-spacing: 20px; ">Sed sit amet lectus.</span><br /></li></ul></td></tr></tbody></table>
    <?php } ?></div><div class="art-layout-cell layout-item-5" style="width: 33%"><?php if (false === theme_print_sidebar('footer-4-widget-area')) { ?>
        <p><a href="#">Curabitur ullamcorper gravida&nbsp;</a></p><p><a href="#">Sit amet scelerisque sed.</a>&nbsp;</p><p><a href="#">Donec vel neque in neque lectus.</a><br /></p>
    <?php } ?></div>
    </div>
</div>
</div>
<div class="art-content-layout">
    <div class="art-content-layout-row">
    <div class="art-layout-cell" style="width: 100%"><?php if (false === theme_print_sidebar('footer-5-widget-area')) { ?>
        <p style="text-align: center;">Talentum Bussines School &nbsp; &nbsp;informes@talentumbs.edu.pe &nbsp; &nbsp;Telf: 2222222</p>
    <?php } ?></div>
    </div>
</div>

  
<?php echo do_shortcode(theme_ob_get_clean()) ?>
<?php } ?>

</div>
