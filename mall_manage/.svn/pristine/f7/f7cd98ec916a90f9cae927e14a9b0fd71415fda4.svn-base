/* ------------------------------------------------------------------------------
*
* userlist
*
* ---------------------------------------------------------------------------- */

$(function() {


    // Table setup
    // ------------------------------

    // Setting datatable defaults
    $.extend( $.fn.dataTable.defaults, {
        autoWidth: false,
		/*searching: false,*/
        columnDefs: [{ 
            orderable: false,
            width: '100px',
            targets: [0,5,6]
        }],
     //   dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
		dom: '<"datatable-scroll"t><"datatable-footer"ip>',
        language: {
            search: '<span>搜索:</span> _INPUT_',
            lengthMenu: '<span>显示:</span> _MENU_',
            paginate: { 'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' }
        },
        drawCallback: function () {
            $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
        },
        preDrawCallback: function() {
            $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
        }
    });


    // Basic datatable
    $('.datatable-basic').DataTable();


    // Alternative pagination
    $('.datatable-pagination').DataTable({
        pagingType: "simple",
        language: {
            paginate: {'next': 'Next &rarr;', 'previous': '&larr; Prev'}
        }
    });


    // Datatable with saving state
    $('.datatable-save-state').DataTable({
        stateSave: true
    });


    // Scrollable datatable
    $('.datatable-scroll-y').DataTable({
        autoWidth: true,
        scrollY: 300
    });



    // External table additions
    // ------------------------------

    // Add placeholder to the datatable filter option
    $('.dataTables_filter input[type=search]').attr('placeholder','请输入关键词...');


    // Enable Select2 select for the length option
    $('.dataTables_length select').select2({
        minimumResultsForSearch: "-1"
    });
	

    
});
