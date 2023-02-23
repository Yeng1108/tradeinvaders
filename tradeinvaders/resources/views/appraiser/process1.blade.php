<tbody id="customerlist">
    @foreach ($data as $customer)
    <tr>
        <td>
            <a href="{{ route('trade-in.assignvehicle', $customer->id) }}" class="btn btn-primary">Assign Vehicle</a>
        </td>
        <td>{{ $customer->CustomerName }}</td>
        <td>{{ $customer->Contact }}</td>
        <td>{{ $customer->birthday }}</td>
        <td>
            <a href="{{ route('trade-in.viewcustomer', $customer->id) }}" class="btn btn-primary">View</a>
        </td>
    </tr>
    @endforeach
</tbody>

{{ $data->links() }}