

$(function() {


    // Basic examples
    // ------------------------------

    // Default initialization
    $('.select').select2({
        minimumResultsForSearch: "-1"
    });


    // Select with search
    $('.select-search').select2();


    // Fixed width
    $('.select-fixed').select2({
        minimumResultsForSearch: "-1",
        width: 250
    });


    // Minimum input length
    $(".select-minimum").select2({
        minimumInputLength: 2,
        minimumResultsForSearch: "-1"
    });


    // Allow clear selection
    $('.select-clear').select2({
        placeholder: "Select a State",
        allowClear: true
    });



    // Styling options
    // ------------------------------

    // Custom menu color
    $('.select-menu-color').select2({
        dropdownCssClass: 'bg-teal'
    });


    // Combine custom colors
    $('.select-menu2-color').select2({
        dropdownCssClass: 'bg-indigo-400'
    });


    // Multiselect item colors
    $('.select-items-color').select2({
        formatSelectionCssClass: function (data, container) { return "bg-danger"; }
    });


    // Menu border color
    $('.select-border-color').select2({
        dropdownCssClass: 'border-warning'
    });


    // Tagging support
    $(".select-multiple-tags").select2({
        width: '100%',
        tags:['red', 'green', 'blue', 'cyan', 'brown', 'pink']
    });


    // Maximum input length
    $(".select-multiple-maximum-length").select2({
        width: '100%',
        tags:['red', 'green', 'blue', 'cyan', 'brown', 'pink'],
        maximumInputLength: 4
    });


    // Tokenization
    $(".select-multiple-tokenization").select2({
        width: '100%',
        tags:['red', 'green', 'blue', 'cyan', 'brown', 'pink'],
        tokenSeparators: [",", " "]
    });


});
