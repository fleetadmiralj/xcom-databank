$('.mission-box').find('a[href="#"]').on('click', function (e) {
    e.preventDefault();
    this.expand = !this.expand;
    $(this).text(this.expand?"Collapse":"Read More");
    $(this).closest('.mission-box').find('.hidden, .no-hide').toggleClass('hidden no-hide');
});

/* $(function() {
	$('.mission-box').matchHeight();
}); */