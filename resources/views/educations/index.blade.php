{{-- resources/views/educations/index.blade.php --}}

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            
            <div class="p-2">
                <a href="{{ route('educations.create') }}" class="btn btn-primary">Add New Education</a>
            </div>
            <div class="p-2 text-center flex-grow-1">
                <h1>Educations List</h1>
            </div>
            @if (session('success'))
            <div class="alert alert-success" id="success-alert">
                {{ session('success') }}
            </div>
        
            <script type="text/javascript">
                setTimeout(function() {
                    $('#success-alert').fadeOut('slow');
                }, 3000); // 3 secondes
            </script>
            @endif
            <table class="table mt-2 table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Diploma</th>
                        <th>School</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Description</th>
                        <th>cv_id</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($educations as $education)
                    <tr>
                        <td class="small-id">{{ $education->id }}</td>
                        <td>{{ $education->diplome }}</td>
                        <td>{{ $education->école }}</td>
                        <td>{{ $education->getFormattedStartDateAttribute() }}</td>
                        <td>{{ $education->getFormattedEndDateAttribute() }}</td>
                        <td>{{ $education->description }}</td>
                        <td>{{$education->cv_id}}</td>
                        <td>
                            <a href="{{ route('educations.show', $education->id) }}" class="btn btn-info">Show</a>
                            <a href="{{ route('educations.edit', $education->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('educations.destroy', $education->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" >Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
