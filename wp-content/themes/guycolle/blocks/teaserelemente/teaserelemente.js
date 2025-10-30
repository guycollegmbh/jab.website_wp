jQuery(document).ready(function($) {
    console.log('teaserelemente');

    // Modal functionality
    const modal = $('#newsletterModal');
    const closeBtn = modal.find('.modal-close');
    const backdrop = modal.find('.modal-backdrop');

    // Function to open modal
    window.openNewsletterModal = function() {
        modal.addClass('active').css('display', 'block');
        $('body').css('overflow', 'hidden'); // Prevent background scrolling
    };

    // Function to close modal
    function closeModal() {
        modal.removeClass('active').css('display', 'none');
        $('body').css('overflow', ''); // Restore scrolling
    }

    // Close button click
    closeBtn.on('click', closeModal);

    // Backdrop click
    backdrop.on('click', closeModal);

    // ESC key press
    $(document).on('keydown', function(e) {
        if (e.key === 'Escape' && modal.hasClass('active')) {
            closeModal();
        }
    });
});