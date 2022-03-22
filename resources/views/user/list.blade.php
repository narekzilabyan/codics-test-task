<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script>
        function clearFilter(){
            document.getElementById("country").value = "";
            document.getElementById("age").value = "";
        }
    </script>
</head>

<form action="#" method="get" class="pb-4">
    <div class="row g-3 align-items-center">
        <div class="col-auto">
            <input
                type="text"
                name="q"
                class="form-control"
                placeholder="Search..."
                value="{{ request('q') }}"
            />
        </div>
        <div class="col-auto">
            <button class="btn btn-success" type="submit">Search</button>
        </div>
        <div class="col-auto">
            <label class="col-form-label">Filter by country:</label>
        </div>
        <div class="col-auto">
            <select name="country" id="country" class="form-control mb-1">
                <option value="{{ request('country') }}">{{ request('country') }}</option>
                @foreach ($countries as $country)
                    <option value="{{ $country }}">{{ $country }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-auto">
            <label class="col-form-label">Filrer by age:</label>
        </div>
        <div class="col-auto">
            <select name="age" id="age" class="form-control mb-1">
                <option value="{{ request('age') }}">{{ request('age') }}</option>
                @for ($i = 1; $i < 100; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>
        </div>
        <div class="col-auto">
            <button class="btn btn-success" type="submit">Filter</button>
        </div>
        <div class="col-auto">
            <button class="btn btn-secondary" type="submit" onclick="clearFilter()">Clear filters</button>
        </div>
    </div>
</form>
<table class="table">
    <tr>
        <th>Name</th>
        <th>LastName</th>
        <th>Age</th>
        <th>Country</th>
        <th>Phone</th>
        <th>Email</th>
    </tr>

    @foreach ($users as $user)
        <tr>
            <td>{{ $user['name'] }}</td>
            <td>{{ $user['lastName'] }}</td>
            <td>{{ $user['age'] }}</td>
            <td>{{ $user['country'] }}</td>
            <td>{{ $user['phone'] }}</td>
            <td>{{ $user['email'] }}</td>
        </tr>
    @endforeach
</table>
</html>
