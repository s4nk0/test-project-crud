<span>
<x-slot name="css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.css">
</x-slot>

<x-slot name="js">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.js"></script>
    @isset($tables)
    <script>
            @foreach($tables as $table_id)
            window.$('#{{$table_id}}').DataTable();
            @endforeach
    </script>
    @endif
</x-slot>
</span>
