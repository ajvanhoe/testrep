<div class="card boxed">
    <div class="card-header main-area text-white text-center px-2 py-2">
        <div class="head-panel py-2">
            <h4 class="card-title"><strong>Mix URL Words</strong></h4>
        </div>
    </div>
        <div class="card-body">

<form method="POST" action="{{ route('urlwords.mixer') }}" accept-charset="UTF-8" role="form">
{{ csrf_field() }}
    
<div class="form-group mu-3 mb-3 mr-2 ml-2">
          <label for="name" class="control-label"><strong>New Keyword Category name</strong></label>
          <input type="text" class="form-control" name="name" placeholder="..." required>
          <p class="help-block text-muted"><small>Category name.</small></p>
        </div>

        <div class="form-group mu-3 mb-3 mr-2 ml-2">
          <label for="description" class="control-label"><strong>Description</strong></label>
          <textarea name="description" class="form-control" required></textarea>
          <p class="help-block text-muted"><small>Short description of new category and its content.</small></p>
        </div>


    <hr>

    <label for="urlwords" class="control-label bg-success text-white py-1 px-2"><strong>Select URL Words</strong></label>
    <hr>
    
    <div class="row my-3">

        <div class="col-md-4">
            <h5>URL Word Category 1</h5>
            <select class="form-control form-control-sm" name="category[][id]">
                <option value="0" selected>None</option>
                @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-4">
            <h5>URL Word Category 2</h5>
            <select class="form-control form-control-sm" name="category[][id]">
                <option value="0" selected>None</option>
                @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-4">
            <h5>URL Word Category 3</h5>
            <select class="form-control form-control-sm" name="category[][id]">
                <option value="0" selected>None</option>
                @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        
    </div>

    <p class="help-block text-muted"><small>Select URL Words</small></p>
    <hr>
    <div class="form-group">
        <button type="submit" class="btn main-btn btn-block"><strong><i class="fas fa-fw fa-angle-double-right"></i> Mix URL Words</strong></button>
    </div> 
</form>

</div>
</div>