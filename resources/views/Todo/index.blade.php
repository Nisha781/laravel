<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
        }

        .input {
            border-color: black;
            border-radius: 0;
        }
    </style>

</head>

<body class="bg-info">
    <div class="container">
        <div class="row justify-content-center align-items-center min-vh-100">
            <div class="col-lg-8">
                <div class="card shadow">
                    <div class="card-body">
                        <h1 class="text-center text-info">Todo Application</h1>
                        <form action="{{ route('task.store') }}" method="post">
                            @csrf
                            <div class="row">
                                @if (session ('success'))
                                <div class="alert alert-success">
                                    <b>Success!</b> {{ session ('success')}}
                                </div>
                                @endif
                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                                <div class="col-lg-12">
                                    <input type="text" name="task" id="task" class="form-control mt-4 input ">
                                </div>
                                <div class="col-lg-12">
                                    <button type="submit" name="submit" id="submit" class="btn btn-lg btn-info text-white mt-3">Add Task</button>
                                </div>
                            </div>
                        </form>
                        <table class="table mt-4 ">
                            <tr>
                                <th>Task</th>
                                <th>Delete</th>
                            </tr>
                            @foreach($tasks as $task)
                            <tr class="text-align-center">
                                <td>
                                    {{ $task->tasks }}
                                    <br>
                                </td>
                                <td>
                                    <form action="{{ route('task.destroy', $task->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>