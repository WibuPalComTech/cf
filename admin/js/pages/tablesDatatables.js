/*
 *  Document   : tablesDatatables.js
 *  Author     : pixelcave
 *  Description: Custom javascript code used in Tables Datatables page
 */

var TablesDatatables = function() {

    return {
        init: function(a) {
            /* Initialize Bootstrap Datatables Integration */
            App.datatables();

            /* Initialize Datatables */
            $(a).dataTable({
				//"aoColumnDefs": [ { "bSortable": false, "aTargets": [ 1, 5 ] } ]
                "bSort" : false,
                "iDisplayLength": 20,
                "aLengthMenu": [[10, 20, 30, 40, 50, -1], [10, 20, 30, 40, 50, "All"]]
            });

            /* Add Bootstrap classes to select and input elements added by datatables above the table */
            $('.dataTables_filter input').addClass('form-control').attr('placeholder', 'Pencarian...');
            $('.dataTables_length select').addClass('form-control');
        }
    };
}();