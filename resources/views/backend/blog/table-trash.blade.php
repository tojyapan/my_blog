<table class="table table-bordered">
    <thead>
      <tr>
        <td width="80">Action</td>
        <td>Title</td>
        <td width="120">Author</td>
        <td width="150">Category</td>
        <td width="170">Date</td>
      </tr>
    </thead>
    <tbody>

      @foreach ($posts as $post)
          
        <tr>
          <td>
            {!! Form::open(['style' => 'display: inline-block;', 'method' => 'put', 'route' => ['blog.restore', $post->id]]) !!}
            @csrf
              <button title="Restore" type="submit" class="btn btn-xs btn-default">
                <i class="fa fa-refresh"></i>
              </button>
            {!! Form::close() !!}
            {!! Form::open(['style' => 'display: inline-block;', 'method' => 'delete', 'route' => ['blog.force-destroy', $post->id]]) !!}
              <button title="Delete Permanent" onclick="return confirm('You are about to delete a post permanetly. Are you sure?')" type="submit" class="btn btn-xs btn-danger">
                <i class="fa fa-times"></i>
              </button>
            {!! Form::close() !!}
          </td>
          <td>{{ $post->title }}</td>
          <td>{{ $post->author->name }}</td>
          <td>{{ $post->category->title }}</td>
          <td>
            <span title="{{ $post->dateFormatted(true) }}">{{ $post->dateFormatted() }}</span> |
          </td>
        </tr>

      @endforeach
    </tbody>
  </table>
