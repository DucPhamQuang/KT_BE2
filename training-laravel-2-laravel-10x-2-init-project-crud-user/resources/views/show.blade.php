@section('content')
<div class="container">
    <h1>Chi tiết người dùng: {{ $user->name }}</h1>

    <ul>
        <li>Email: {{ $user->email }}</li>
        <li>Orders: {{ $user->orders }}</li>
        <li>Role: {{ $user->role }}</li>
        <!-- Thêm thông tin chi tiết khác nếu cần -->
    </ul>

    <a href="{{ route('users.index') }}">Trở lại danh sách người dùng</a>
</div>
@endsection