<table class="table table-bordered">
    <thead>
      <tr>
        <td width="80">Action</td>
        <td>Category Name</td>
        <td width="120">Post Count</td>
      </tr>
    </thead>
    <tbody>

      @foreach ($categories as $category)
          
        <tr>
          <td>
            {!! Form::open(['method' => 'delete', 'route' => ['categories.destroy', $category->id]]) !!}
            @csrf
              <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-xs btn-default">
                <i class="fa fa-edit"></i>
              </a>
              <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-xs btn-danger">
                <i class="fa fa-times"></i>
              </button>
            {!! Form::close() !!}
          </td>
          <td>{{ $category->title }}</td>
          <td>{{ $category->posts->count() }}</td>
        </tr>

      @endforeach
    </tbody>
  </table>
