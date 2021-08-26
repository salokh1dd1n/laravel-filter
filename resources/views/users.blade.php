<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <title>Laravel Filter</title>
</head>
<body>
<div class="container">
    <h1 class="display-4 text-center my-4">Laravel Filter</h1>
    <div class="row">
        <div class="col-3">
            <h3 class="text-center">Filter: </h3>
            <form action="" method="GET">
                <div class="mb-3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ request()->get('name') }}">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email address:</label>
                    <input type="email" class="form-control" id="email" name="email"
                           value="{{ request()->get('email') }}">
                </div>
                <div class="mb-3">
                    <label for="gender" class="form-label">Gender:</label>
                    <select class="form-select" id="gender" name="gender">
                        <option value selected>Select Gender</option>
                        <option value="male" @if(request()->get('gender') == 'male') selected @endif>Male</option>
                        <option value="female" @if(request()->get('gender') == 'female') selected @endif>Female</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="date" class="form-label">Birthday:</label>
                    <input type="date" class="form-control" id="date" name="birthday"
                           value="{{ request()->get('birthday') }}">
                </div>
                <div class="mb-3">
                    <label for="isActive" class="form-label">Is Active:</label>
                    <div id="isActive">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="is_active" id="inlineRadio1"
                                   value="1" @if (request()->get('is_active') == '1')
                                   checked
                                @endif>
                            <label class="form-check-label" for="inlineRadio1">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="is_active" id="inlineRadio2"
                                   value="0" @if (request()->get('is_active') == 0)
                                   checked
                                @endif>
                            <label class="form-check-label" for="inlineRadio2">No</label>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('users') }}" type="submit" class="btn btn-secondary">Reset</a>
            </form>
        </div>
        <div class="col-9">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Is active</th>
                    <th scope="col">Birthday</th>
                    <th scope="col">Gender</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $id => $user)
                    <tr>
                        <th scope="row">{{ $id+1 }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ ($user->is_active) ? "Yes" : "No" }}</td>
                        <td>{{ $user->birthday }}</td>
                        <td>{{ $user->gender }}</td>
                    </tr>
                @endforeach

                </tbody>
            </table>
            {{ $users->links('vendor.pagination') }}
        </div>
    </div>
</div>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
</body>
</html>
