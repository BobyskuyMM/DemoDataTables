<!DOCTYPE html>
<html>
<head>


    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.2.1/css/select.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="/extensions/css/editor.dataTables.min.css">


    <script type="text/javascript" src="//code.jquery.com/jquery-1.12.4.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/select/1.2.1/js/dataTables.select.min.js"></script>
    <script type="text/javascript" src="/extensions/js/dataTables.editor.min.js"></script>

    <script>

        var editor; // use a global for the submit and return data rendering in the examples

        $(document).ready(function() {
            editor = new $.fn.dataTable.Editor( {
                ajax: "../php/staff.php",
                table: "#example",
                fields: [ {
                    label: "First name:",
                    name: "first_name"
                }, {
                    label: "Last name:",
                    name: "last_name"
                }, {
                    label: "Position:",
                    name: "position"
                }, {
                    label: "Office:",
                    name: "office"
                }, {
                    label: "Extension:",
                    name: "extn"
                }, {
                    label: "Start date:",
                    name: "start_date",
                    type: "datetime"
                }, {
                    label: "Salary:",
                    name: "salary"
                }
                ]
            } );

            // Activate an inline edit on click of a table cell
            $('#example').on( 'click', 'tbody td:not(:first-child)', function (e) {
                editor.inline( this );
            } );

            $('#example').DataTable( {
                dom: "Bfrtip",
                ajax: "../php/staff.php",
                order: [[ 1, 'asc' ]],
                columns: [
                    {
                        data: null,
                        defaultContent: '',
                        className: 'select-checkbox',
                        orderable: false
                    },
                    { data: "first_name" },
                    { data: "last_name" },
                    { data: "position" },
                    { data: "office" },
                    { data: "start_date" },
                    { data: "salary", render: $.fn.dataTable.render.number( ',', '.', 0, '$' ) }
                ],
                select: {
                    style:    'os',
                    selector: 'td:first-child'
                },
                buttons: [
                    { extend: "create", editor: editor },
                    { extend: "edit",   editor: editor },
                    { extend: "remove", editor: editor }
                ]
            } );
        } );

    </script>


</head>
<body>

<div class="container">

    <header>
        <h1>Demo project</h1>
    </header>




    <table id="example" class="display" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th></th>
            <th>First name</th>
            <th>Last name</th>
            <th>Position</th>
            <th>Office</th>
            <th width="18%">Start date</th>
            <th>Salary</th>
        </tr>
        </thead>
    </table>

    <footer>Copyright &copy; W3Schools.com</footer>

</div>

</body>
</html>
