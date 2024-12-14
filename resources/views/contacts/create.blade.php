<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Contato</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Adicionar Novo Contato</h1>

        <form action="{{ route('contacts.store') }}" method="POST">
            @csrf <!-- Token de segurança do Laravel -->
            <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input type="text" class="form-control" id="name" name="name" required minlength="5">
            </div>

            <div class="mb-3">
                <label for="contact" class="form-label">Contato</label>
                <input type="text" class="form-control" id="contact" name="contact" required pattern="\d{9}" title="Deve conter exatamente 9 dígitos">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="{{ route('contacts.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>
</html>
