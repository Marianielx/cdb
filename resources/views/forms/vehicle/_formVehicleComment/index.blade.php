<div class="form-group">
    <div class="form-floating mb-3">
        <p>Digite um comentário</p>
        <textarea name="body" style="min-height:50px; min-width:50%" class="form-control">{{ isset($data->body) ? $data->body : old('body') }}</textarea>
    </div>
    <div class="col-md-6 mb-1">
        <button type="submit" class="btn btn-primary btn-sm">Publicar</button>
    </div>
</div>