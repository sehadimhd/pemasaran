$(document).ready(function()
{
    $('.datatables-table1').DataTable( 
    {
        dom: 'Bfrtip',
        aaSorting: [],
        scrollX: true, 
        scrollY: true,
        info: true,
        responsive: false,
        autoFill: false,
        searching: true,
        stateSave: true,
        ordering: true,
        paging: false,
        select: false,
        buttons: 
        [
        {
            extend: 'copy',
            exportOptions: 
            {
                columns: ':visible'
            }
        },
        {
            text: 'JSON',
            exportOptions: 
            {
                columns: ':visible'
            },
            action: function ( e, dt, button, config ) {
                var data = dt.buttons.exportData();

                $.fn.dataTable.fileSave(
                    new Blob( [ JSON.stringify( data ) ] ),
                    'Export.json'
                );
            }
        },
        {
            extend: 'csv',
            exportOptions: 
            {
                columns: ':visible'
            }
        },
        {
            extend: 'excel',
            exportOptions: 
            {
                columns: ':visible'
            }
        }, 
        {
            extend: 'pdf',
            exportOptions: 
            {
                columns: ':visible'
            }
        },
        {
            extend: 'print',
            exportOptions: 
            {
                columns: ':visible'
            }
        }
        , 'colvis'
        ]
    });

    $('.datatables-table2').DataTable( 
    {
        dom: 'Bfrtip',
        aaSorting: [],
        scrollX: false, 
        scrollY: false,
        info: true,
        select: true,
        responsive: true,
        autoFill: false,
        searching: true,
        stateSave: true,
        ordering: true,
        pageLength: 25,
        lengthMenu: 
        [
          [ 25, 50, 100, -1],
          [ '25 rows', '50 rows', '100 rows', 'Show all' ]
        ],
        buttons: 
        ['copy', 'csv', 'excel', 'pdf', 'print', 'pageLength']
    });

    $('.datatables-table3').DataTable( 
    {
        dom: 'Bfrtip',
        aaSorting: [],
        scrollX: false, 
        scrollY: false,
        info: false,
        select: false,
        responsive: true,
        autoFill: false,
        searching: false,
        stateSave: false,
        ordering: false,
        pageLength: -1,
        lengthMenu: 
        [
          [ 10, 25, 50, 100, 200, -1 ],
          [ '10 rows', '25 rows', '50 rows', '100 rows', '200 rows', 'Show all' ]
        ],
        buttons: 
        ['copy', 'csv', 'excel', 'pdf', 'print']
    });

});