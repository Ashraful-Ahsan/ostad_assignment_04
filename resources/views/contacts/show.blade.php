@extends('layouts.app')

@section('content')
<h1>Contact Details</h1>

<table class="table table-bordered">
    <tr>
        <th>Name:</th>
        <td>{{ $contact->name }}</td>
    </tr>
    <tr>
        <th>Email:</th>
        <td>{{ $contact->email }}</td>
    </tr>
    <tr>
        <th>Phone:</th>
        <td>{{ $contact->phone }}</td>
    </tr>
    <tr>
        <th>Address:</th>
        <td>{{ $contact->address }}</td>
    </tr>
    <tr>
        <th>Created At:</th>
        <td>{{ $contact->created_at }}</td>
    </tr>
</table>

<a href="{{ route('contacts.index') }}" class="btn btn-secondary">Back to Contacts</a>
@endsection
