/**
 * Created by nhan on 08/04/2017.
 */
jQuery(document).ready(function() {
    //console.log('test')
    jQuery("#mega-menu-title").click(function() {
        jQuery("#mega_menu").toggleClass("active")
    })
    jQuery("body").click(function(evt) {
        var click_target = jQuery(evt.target)
        if (click_target.attr("id") != "mega-menu-title") {
            jQuery("#mega_menu.active").removeClass("active")
        }
    })
    jQuery("#mega_menu ul.sub-menu").each(function(i) {
        jQuery(this).css("margin-top", -i*39 + "px")
        jQuery(this).siblings(".menu-image").css("margin-top", -i*39 + "px")
        jQuery(this).children("li").each(function(index) {
            jQuery(this).children(".menu-image").css("margin-top", -index*38 + "px")
        })
    })
})