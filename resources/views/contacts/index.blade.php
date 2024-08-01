@extends('layouts.app')

@section('content')
    <h1>Contacts</h1>

    <div class="mb-4">
        <form action="{{ route('contacts.index') }}" method="GET" class="form-inline">
            <input type="text" name="search" class="form-control mr-2" placeholder="Search by name or email" value="{{ request('search') }}">
            <button type="submit" class="btn btn-primary mt-1">Search</button>
        </form>
    </div>

    <div class="mb-4">
        <a href="{{ route('contacts.index', ['sort_by' => 'name', 'sort_order' => request('sort_order') == 'asc' ? 'desc' : 'asc']) }}" class="btn btn-secondary">
            Sort by Name {{ request('sort_by') == 'name' && request('sort_order') == 'asc' ? 'Z to A' : 'A to Z' }}
        </a>
        <a href="{{ route('contacts.index', ['sort_by' => 'created_at', 'sort_order' => request('sort_order') == 'asc' ? 'desc' : 'asc']) }}" class="btn btn-secondary">
            Sort by Date {{ request('sort_by') == 'created_at' && request('sort_order') == 'asc' ? '9 to 1' : '1 to 9' }}
        </a>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contacts as $contact)
                <tr>
                    <td>{{ $contact->name }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>{{ $contact->phone }}</td>
                    <td>{{ $contact->address }}</td>
                    <td>{{ $contact->created_at->format('Y-m-d H:i:s') }}</td>
                    <td>
                        <a href="{{ route('contacts.show', $contact->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
