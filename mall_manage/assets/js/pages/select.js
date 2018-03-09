// JavaScript Document
$(function() {
    $('#select_1').on('click',
    function() {
        if (this.checked) {
            $('.checkitem1').each(function() {
                this.checked = true;
            });
        } else {
            $('.checkitem1').each(function() {
                this.checked = false;
            });
        }
    });

    $('.checkitem1').on('click',
    function() {
        if ($('#checkitem1:checked').length == $('.checkitem1').length) {
            $('#select_1').prop('checked', true);
        } else {
            $('#select_1').prop('checked', false);
        }
    });
});

$(function() {
    $('#select_2').on('click',
    function() {
        if (this.checked) {
            $('.checkitem2').each(function() {
                this.checked = true;
            });
        } else {
            $('.checkitem2').each(function() {
                this.checked = false;
            });
        }
    });

    $('.checkitem2').on('click',
    function() {
        if ($('#checkitem2:checked').length == $('.checkitem2').length) {
            $('#select_2').prop('checked', true);
        } else {
            $('#select_2').prop('checked', false);
        }
    });
});

$(function() {
    $('#select_3').on('click',
    function() {
        if (this.checked) {
            $('.checkitem3').each(function() {
                this.checked = true;
            });
        } else {
            $('.checkitem3').each(function() {
                this.checked = false;
            });
        }
    });

    $('.checkitem3').on('click',
    function() {
        if ($('#checkitem3:checked').length == $('.checkitem3').length) {
            $('#select_3').prop('checked', true);
        } else {
            $('#select_3').prop('checked', false);
        }
    });
});

$(function() {
    $('#select_3').on('click',
    function() {
        if (this.checked) {
            $('.checkitem_sub1').each(function() {
                this.checked = true;
            });
        } else {
            $('.checkitem_sub1').each(function() {
                this.checked = false;
            });
        }
    });

    $('.checkitem_sub1').on('click',
    function() {
        if ($('#checkitem_sub1:checked').length == $('.checkitem_sub1').length) {
            $('#select_3').prop('checked', true);
        } else {
            $('#select_3').prop('checked', false);
        }
    });
});

$(function() {
    $('#select_sub1').on('click',
    function() {
        if (this.checked) {
            $('.checkitem_sub1').each(function() {
                this.checked = true;
            });
        } else {
            $('.checkitem_sub1').each(function() {
                this.checked = false;
            });
        }
    });

    $('.checkitem_sub1').on('click',
    function() {
        if ($('#checkitem_sub1:checked').length == $('.checkitem_sub1').length) {
            $('#select_sub1').prop('checked', true);
        } else {
            $('#select_sub1').prop('checked', false);
        }
    });
});