
    <form action="{{ route('store_comment_path') }}" method="POST">

    {{ csrf_field() }}


    <!-- Description Input -->
    <div class="form-group">
        <label for="content">Comentario:</label>
        <textarea rows="4" name="content" class="form-control"/>{{ $comment->content or old('content') }}</textarea>
        <input type="hidden" name="user_id_where_comment" value="{{ $comment->user_id_where_comment }}">

    </div>

    <div class="form-group">
        <button type="submit" class='btn btn-primary'>Enviar</button>
    </div>
</form>