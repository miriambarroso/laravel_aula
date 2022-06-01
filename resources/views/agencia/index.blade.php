<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>AULA</title>
</head>
<body>
    <h1 class="text-center">CRUD</h1>
    <hr>
    <div class="col-8 m-auto">
        <h6 class="text">BANCO</h6>
        <table class="table">
            <thead class="thread-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">NOME</th>
                    <th scope="col">ISPB</th>
                </tr>
            </thead>
            <tbody>
                <script>
                    @foreach($banco as $bancos)
                        {{$bancos->nome}}
                    @endforeach
                </script>
                <tr>
                    <th scope="row"></th>
                    <th scope="row"></th>
                    <th scope="row"></th>
                </tr>
            </tbody>
        </table>
    </div>
    <hr>
    <div class="row d-flex justify-content-between align-items-center">
        <div class="col-auto">
            <a href="/" role="button" class="btn btn-primary">HOME</a>
        <div>
        <div class="col-auto">
            <a href="/banco/create" role="button" class="btn btn-dark">ADICIONAR BANCO</a>
        <div>
    </div>
</body>
