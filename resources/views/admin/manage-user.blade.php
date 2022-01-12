@extends('layouts.main')

@push('styles')
    <link rel="stylesheet" href="{{ url('css/manageUser.css') }}">
@endpush

@section('content')
    <div class="container col-6 mt-4">
        <h2>Manage User</h2>
        <table class="table mt-2">
            <thead class="thead-light">
                <tr>
                    <th scope="col" class="userid">User ID</th>
                    <th scope="col" class="username">Username</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $c)
                    <tr>
                        <td class="userid">{{ $c->id }}</td>
                        <td class="username">{{ $c->user_name }}</td>
                        <td class="text-center delete-user">
                            <form action="/delete-user/{{ $c->id }}" method="POST">
                                {{ method_field('DELETE') }}
                                @csrf
                                <button class="btn btn-danger">Delete</button>
                                {{-- <button class="btn btn-danger" data-toggle="modal"
                                data-target="#confirmationModal">Delete</button> --}}
                            </form>
                        </td>
                    </tr>

                    <!-- Modal -->
                    {{-- <div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog"
                        aria-labelledby="confirmationModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="confirmationModalLabel">User Deletion</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Are you sure you want to delete user {{ $c->user_name }}?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <a href="/delete-user/{{ $c->id }}"><button type="button"
                                            class="btn btn-danger">Yes</button></a>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
