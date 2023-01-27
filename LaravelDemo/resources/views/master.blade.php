<!DOCTYPE html>
<html>
<link>
    <title>@yield('title')</title>
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.13.1/datatables.min.css"/>

    <script src="https://code.jquery.com/jquery-3.6.2.min.js"
            integrity="sha256-2krYZKh//PcchRtd+H+VyyQoZ/e3EcrkxhM8ycwASPA=" crossorigin="anonymous"></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.13.1/datatables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
</head>
<body>
	<div id="header">
		<img src="{{ asset('logo.png') }}" width="75" height="75">
		<h1>Invoice</h1>
	</div>
    <div id="content">
        @yield('content')
    </div>
	<div id="footer">
		<a href="#">impressum</a>
		{{ date('d.m.Y') }}
	</div>
    <script>
        //DataTable ohne AJAX
        //$(document).ready(function(){
        //    $('#invoice-table').DataTable({
        //        "autoWidth": true,
        //        "lengthChange":false,
        //        "pageLength": 5
        //    });
        //});

        //DataTable mit AJAX

        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            }
        });

        $(document).ready(function(){
            $('#invoice-table').DataTable({
                "autoWidth": true,
                "lengthChange":false,
                "pageLength": 5,
                ajax: {
                    "url": "{{route('api.get-invoice-data')}}",
                    "type": "Get"
                },
                columns: [
                    {
                        data: "id"
                    },
                    {
                        data: "name"
                    },
                    {
                        data: "price_net"
                    },
                    {
                        data: "price_gross"
                    },
                    {
                        data: "vat"
                    },
                    {
                        data: "clearing_date",
                        render: function(data, type, row){
                            var day = moment(data)

                            if(!day.isValid){
                                return "";
                            }
                            return day.format("{{ isset($settings->DateTimeFormat) ? $settings->DateTimeFormat : "DD.MM.YYYY"}}");
                        }
                    },
                    {
                        data: "created_at",
                        render: function(data, type, row){
                            var day = moment(data)

                            if(!day.isValid){
                                return "";
                            }
                            return day.format("{{ isset($settings->DateTimeFormat) ? $settings->DateTimeFormat : "DD.MM.YYYY"}}");
                        }
                    },
                    {
                        data: "updated_at",
                        render: function(data, type, row){
                            var day = moment(data)

                            if(!day.isValid){
                                return "";
                            }
                            return day.format("{{ isset($settings->DateTimeFormat) ? $settings->DateTimeFormat : "DD.MM.YYYY"}}");
                        }
                    },
                    {
                        render: function(data,type,row){
                            return  `<a href='invoice/${row.id}/edit'><button>Edit</button></a>`
                        }
                    },
                    {
                        render: function(data,type,row){
                            return  `<a href='invoice/${row.id}'><button>Details</button></a>`
                        }
                    },
                    {
                        render: function(data, type, row){
                            return `<form action='invoice/${row.id}' method="post">
                                @method("DELETE")
                                @csrf
                                <button type="submit"  onclick="return confirm('Löschen?')">Delete</button>
                            </form>`
                        }
                    }
                ],
            })

        })
    </script>
</body>
</html>
