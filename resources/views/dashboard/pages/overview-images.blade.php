<div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="ImageModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Uploaded images</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div class="container-fluid">
        @foreach($media as $image)
            <div class="row py-3">
                <div class="col-md-4">
                    <h5>Title: {{$image->title}}</h5>
                    <img src="{{asset('images/uploads/medium-'.$image->file)}}" class="img-thumbnail">
                </div>
                <div class="col-md-8" style="font-size:12px;">

                <table class="table table-sm">
                  <thead>
                    <tr>
                      <th scope="col">size</th>
                      <th scope="col">url</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Original image</td>
                      <td><span class="badge badge-light copy-link px-2 py-1" id="original{{$image->id}}" onclick="copyLink(this)" >{{$image->url}}</span></td>
                    </tr>
                    <tr>
                      <td>small(150x150)</td>
                      <td><span class="badge badge-light copy-link px-2 py-1" id="small{{$image->id}}" onclick="copyLink(this)" >{{asset('images/uploads/small-'.$image->file)}}</span></td>
                    </tr>
                    <tr>
                      <td>medium(300x150)</td>
                      <td><span class="badge badge-light copy-link px-2 py-1" id="medium{{$image->id}}" onclick="copyLink(this)" >{{asset('images/uploads/medium-'.$image->file)}}</span></td>
                    </tr>
                    <tr>
                      <td>large(1024x512)</td>
                      <td><span class="badge badge-light copy-link px-2 py-1" id="large{{$image->id}}" onclick="copyLink(this)" >{{asset('images/uploads/large-'.$image->file)}}</span></td>
                    </tr>
                    <tr>
                      <td>full(1200x600)</td>
                      <td><span class="badge badge-light copy-link px-2 py-1" id="full{{$image->id}}" onclick="copyLink(this)" >{{asset('images/uploads/full-'.$image->file)}}</span></td>
                      
                    </tr>
                  </tbody>
                </table>
                    
                
                    
                </div>
            </div>
          @endforeach    
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>