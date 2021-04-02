function wcagContrastHandle(e) {
    var $this = $(this);

    if ($this.hasClass('active')) {
        $this.removeClass('active');
        $('html').removeClass('high-contrast');
    } else {
        $this.addClass('active');
        $('html').addClass('high-contrast');
    }
}


function wcagFontSizeHandle(e) {
    var $this = $(this);

    if ($this.hasClass('active')) {
        $this.removeClass('active');
        $('html').removeClass('large-font');
    } else {
        $this.addClass('active');
        $('html').addClass('large-font');
    }
}

$(function() {
    $('#wcag-btns .contrast-btn').click(wcagContrastHandle);

    $('#wcag-btns .fontsize-btn').click(wcagFontSizeHandle);
})