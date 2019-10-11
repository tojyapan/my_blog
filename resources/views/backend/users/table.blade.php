<table class="table table-bordered">
    <thead>
      <tr>
        <td width="80">Action</td>
        <td>Name</td>
        <td>Email</td>
        <td>Role/td>
      </tr>
    </thead>
    <tbody>

      @foreach ($users as $user)
          
        <tr>
          <td>
            @csrf
            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-xs btn-default">
              <i class="fa fa-edit"></i>
            </a>
            @if ($user->id == config('cms.default_user_id'))
              <button onclick="return false" type="submit" class="btn btn-xs btn-danger disabled">
                <i class="fa fa-times"></i>
              </button>  
            @else
              <a href="{{ route('users.confirm', $user->id) }}" onclick="return confirm('Are you sure?')" type="submit" class="btn btn-xs btn-danger">
                <i class="fa fa-times"></i>
              </a>  
            @endif
          </td>
          <td>{{ $user->name }}</td>
          <td>{{ $user->email }}</td>
          <td>-</td>
        </tr>

      @endforeach
    </tbody>
  </table>
