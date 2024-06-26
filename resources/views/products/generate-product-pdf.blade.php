<legend>
    <h2>Title: {{ $title }} </h2>
    <h2>Date: {{ $date }} </h2>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Brand</th>
                <th>Size</th>
                <th>Price</th>
                <th>Order Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->brand }}</td>
                    <td>{{ $item->size }}</td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->created_at->format('d-m-Y') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <hr>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Order Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $userData)
                <tr>
                    <td>{{ $userData->id }}</td>
                    <td>{{ $userData->username }}</td>
                    <td>{{ $userData->email }}</td>
                    <td>{{ $userData->created_at->format('d-m-Y') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</legend>
