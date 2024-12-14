<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact's details</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Contact's details</h1>

        <div class="card">
            <div class="card-header">
                Contact from: {{ $contact->name }}
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ $contact->name }}</h5>
                <p class="card-text">
                    <strong>Contact:</strong> {{ $contact->contact }}<br>
                    <strong>Email:</strong> {{ $contact->email }}
                </p>
                <a href="{{ route('contacts.index') }}" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </div>
</body>
</html>
