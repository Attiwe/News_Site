@extends('layout.frontend.app')
@section('title')
    {{config('app.name')}} - Profile
@endsection

@section('body')
 
    <!-- Dashboard Start-->
    <div class="dashboard container">
        <!-- Sidebar -->
         @include('frontend.dashboard._sidebar',[  'notification_active' => 'active'])

        {{-- Notifications --}}
        <div class="main-content">
            <div class="container py-4">
                <h2 class="mb-4 text-primary">Notifications</h2>

                {{-- Modal Delete All --}}
                <button type="button" class="btn btn-primary btn-sm mb-3" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">
                    Delete All
                </button>

                <!-- Modal Delete All notifications -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel"> Delete All Notifications </h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('frontend.delete-all') }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="id" value = 1>
                                    <p class="text-primary ">Are you sure you want to delete all notifications?</p>
                                    
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-danger">Delete All</button>
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                     </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- End delete all notifications -->
 
                @forelse (Auth::user()->notifications as $notification)
                    <div class="notification alert alert-light border shadow-sm mb-3 p-3">
                        <div class="d-flex justify-content-between align-items-start   "  >
                            <div>
                                <strong>{{ $notification->data['title'] }}</strong>
                                <p class="mb-1"><strong>Commit:</strong> {{ $notification->data['commit'] }}</p>
                                <p class="mb-0"><strong>Post:</strong> <a href="{{ $notification->data['link'] }}"
                                        class="text-primary">View Post</a></p>
                                <span class="text-info">{{ $notification->created_at->diffForHumans() }}</span>        
                            </div>
                            <form action="{{ route('frontend.delete-notification') }}" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="id" value="{{ $notification->id }}">
                                <button title="Delete" type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </div>
                    </div>

                @empty
                    <div class="alert alert-info text-center">
                        No notifications available.
                    </div>
                @endforelse
            </div>
        </div>
    </div>
    {{-- Notifications --}}

    <!-- Dashboard End-->
@endsection