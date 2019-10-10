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
            {!! Form::open(['method' => 'delete', 'route' => ['blog.destroy', $post->id]]) !!}
            @csrf
              <a href="{{ route('blog.edit', $post->id) }}" class="btn btn-xs btn-default">
                <i class="fa fa-edit"></i>
              </a>
              <button type="submit" class="btn btn-xs btn-danger">
                <i class="fa fa-trash"></i>
              </button>
            {!! Form::close() !!}
          </td>
          <td>{{ $post->title }}</td>
          <td>{{ $post->author->name }}</td>
          <td>{{ $post->category->title }}</td>
          <td>
            <span title="{{ $post->dateFormatted(true) }}">{{ $post->dateFormatted() }}</span> |
            {!! $post->publicationLabel() !!}
          </td>
        </tr>

      @endforeach
    </tbody>
  </table>
