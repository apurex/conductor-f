@foreach($comments as $comment)
        <div class="row">
            <div class="col-md-12">
                <h2>
                    
                    @if($comment->wasCreatedBy( Auth::user() ))
                    <small class="pull-right">
                        <a href="#" class="btn btn-info">Edit</a>
                        <form action="{{ route('delete_comment_path', ['comment' => $comment->id]) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class='btn btn-danger'>Delete</button>
                        </form>
                    </small>
                    @endif
                </h2>
                <p><b>{{ $comment->name }} {{ $comment->last_name }}</b> <small>{{ $comment->created_at->diffForHumans() }}</small> </p>
                <p>{{ $comment->content }}</p>
            </div>
        </div>
        <hr>
    @endforeach