<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Contact List</h1>
            @auth
                <div class="d-flex align-items-center">
                    <h3 class="me-3">Welcome, {{ auth()->user()->name }}</h3>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger">Logout</button>
                    </form>
                </div>
            @else

                <a href="{{ route('login') }}" class="btn btn-primary">Sign In</a>
            @endauth
        </div>

        <div class="mb-4">
            @auth
                <a href="{{ route('contacts.create') }}" class="btn btn-primary">Add a new Contact</a>
            @endauth
        </div>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Contact</th>
                    <th>Email</th>
                    @auth
                        <th>Actions</th>
                    @endauth
                </tr>
            </thead>
            <tbody>
                @forelse ($contacts as $contact)
                    <tr>
                        <td>{{ $contact->id }}</td>
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->contact }}</td>
                        <td>{{ $contact->email }}</td>
                        @auth
                            <td>
                                <a href="{{ route('contacts.show', $contact->id) }}" class="btn btn-info btn-sm">View</a>
                                <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this contact?')">Delete</button>
                                </form>
                            </td>
                        @endauth
                    </tr>
                @empty
                    <tr>
                        <td colspan="{{ auth()->check() ? 5 : 4 }}" class="text-center">No contacts found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-4 text-center">
            {{ $contacts->links('pagination::bootstrap-5') }}
        </div>        
    </div>
</body>
</html>
