@extends('dashboard')

@section('content')
<main class="login-form">
    <div class="container">
        <div class="row justify-content-center">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Orders</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <th>{{ $user->id }}</th>
                        <th>{{ $user->name }}</th>
                        <th>{{ $user->email }}</th>
                        <th>
                            <a href="{{ route('orders.show', $user->id) }}">Chi tiết</a>
                        </th>
                        <th>
                            <a href="{{ route('user.listByRole', ['role' => $user->role]) }}">
                                {{ $user->role }}
                            </a>
                        </th>
                        <th>
                            <a href="{{ route('user.readUser', ['id' => $user->id]) }}">View</a> |
                            <a href="{{ route('user.updateUser', ['id' => $user->id]) }}">Edit</a> |
                            <a href="{{ route('user.deleteUser', ['id' => $user->id]) }}">Delete</a>
                        </th>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center mt-3">
                {{-- Nếu không ở trang đầu tiên, hiển thị << và < --}}
                @if ($users->onFirstPage() === false)
                <a href="{{ $users->url(1) }}" class="mx-1">&laquo;</a>
                <a href="{{ $users->previousPageUrl() }}" class="mx-1">&lsaquo;</a>
                @endif

                {{-- Hiển thị các số trang --}}
                @foreach ($users->getUrlRange(1, $users->lastPage()) as $page => $url)
                @if ($page == $users->currentPage())
                <span class="mx-1 text-primary fw-bold">{{ $page }}</span>
                @else
                <a href="{{ $url }}" class="mx-1">{{ $page }}</a>
                @endif
                @endforeach

                {{-- Nếu còn trang tiếp theo, hiển thị > và >> --}}
                @if ($users->hasMorePages())
                <a href="{{ $users->nextPageUrl() }}" class="mx-1">&rsaquo;</a>
                <a href="{{ $users->url($users->lastPage()) }}" class="mx-1">&raquo;</a>
                @endif
            </div>

        </div>
    </div>
</main>

<style>
    .d-flex a {
        text-decoration: none;
        color: black;
    }

    .d-flex a:hover {
        color: blue;
    }
</style>
@endsection