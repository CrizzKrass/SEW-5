<html>
<head>
    <title>Edit</title>
</head>
<body>
    <form action="{{ route('invoice.store') }}">
        @csrf
        <label for="id">Id</label>
        <input type="text" name="id" readonly />
        <br />
        <label for="name">Name</label>
        <input type="text" name="name"/>
        <br />
        <label for="price_net">Price Net</label>
        <input type="number" name="price_net"/>
        <br />
        <label for="price_gross">Price Gross</label>
        <input type="number" name="price_gross" readonly />
        <br />
        <label for="vat">Vat</label>
        <input type="number" name="vat"/>
        <br />
        <label for="user_clearing">User Clearing</label>
        <input type="text" name="user_clearing"/>
        <br />
        <label for="clearing_date">Clearing Date</label>
        <input type="date" name="clearing_date"/>
        <br />
        <input type="submit" value="Absenden">

    </form>
</body>
</html>
