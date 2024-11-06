@extends('layouts.squelette')

@section('content')
<div class="wrapper">
    @include('dashbordadmin.sidebar.sidebar')
    @include('dashbordadmin.header.header')
    
    <div id="content-page" class="content-page">
        <div class="container-fluid">
            @if (session('success-suppression'))
                <div class="alert alert-success">
                    {{ session('success-suppression') }}
                </div>
            @endif
            
            <div class="col-lg-12 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Liste des agents</h4>
                       
                        <div class="table-responsive pt-3">
                            <table class="table table-bordered">
                                <thead>
                                    <tr class="table-primary">
                                        <th>#</th>
                                        <th>Nom des agents</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($all_user as $user)
                                        <tr class="table-warning">
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->username }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->phone }}</td>
                                            <td>
                                                <form action="{{ route('deletecommissaire', $user->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('dashbordadmin.footer.footer')
@endsection
