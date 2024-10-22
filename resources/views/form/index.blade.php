@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    <table class="table">
        <thead>
            <tr>
            <th scope="col">Id</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">DNI</th>
            <th scope="col">Fecha de Nacimiento</th>
            <th scope="col">Sexo</th>
            </tr>
        </thead>
        <tbody>
        @foreach ( $data as $d )
            <tr>
            <th scope="row">{{ $d->user_id }}</th>
            <td>{{ $d->first_name }}</td>
            <td>{{ $d->last_name }}</td>
            <td>{{ $d->dni }}</td>
            <td>{{ $d->date }}</td>
            <td>{{ $d->sex }}</td>
            <form method="POST" action="{{ route('form.destroy')}}" style="display:inline;" >
                @crsf
                @method('DELETE')
                <button type="submit"  class="btn btn-danger">Eliminar</button>
            </form>
            <form method="POST" action="{{ route('form.update')}}" style="display:inline;" >
                @crsf
                @method('UPDATE')
                <button type="submit"  class="btn btn-danger">Actualizar</button>
            </form>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
</div>
@endsection
