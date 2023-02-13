@extends('news.master')


@section('title','newsdetails')



@section('styles')

{{-- <link rel="stylesheet" href="{{asset('Front/plugins/toastr/toastr.min.css')}}"> --}}

@endsection

@section('content')

    <!-- Page Content -->
    <div class="container">

       <h1 class="mt-4 mb-3">{{$articaldetails->title}}</h1>
             <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Home</a>
        </li>
        <li class="breadcrumb-item active">news deatiles</li>
      </ol>
      <div class="row">
        <!-- Post Content Column -->
        <div class="col-lg-8">
          <!-- Preview Image -->
          <img class="img-fluid rounded" src="{{Storage::url('image/article/'.$articaldetails->image_id)}}" alt="">
          <hr>
          <!-- Date/Time -->
          <p>post at {{$articaldetails->created_at}}</p>
          <hr>

          <!-- Post Content -->
          <p class="lead">{{$articaldetails->short_description}}</p>
          <p>{{$articaldetails->full_description}}</p>

          <br>

          <!-- Comments Form -->
          <div class="card my-4">
            <h5 class="card-header">Leave a Comment:</h5>
            <div class="card-body">

                <form name="sendComment" id="commentForm" action="{{route('news.newsdetailes',$articaldetails->id)}}">
                    <input type="text" name="article_id" id="article_id" value={{$id}}
                    class="form-control form-control-solid" placeholder="Enter Name" required hidden>
                    <div class="form-group">
                  <textarea class="form-control" rows="3" id="comment" name="comment"
                  placeholder="Enter Comment"></textarea>
                </div>
                {{-- <button type="button" onclick="performStore('{{route('news.newsdetailes',$articaldetails->id)}}')" class="btn btn-primary">Send Comment</button> --}}
                <button type="button" onclick="performStore()" class="btn btn-primary">Send Comment</button>
              </form>
            </div>
          </div>
          <!-- Single Comment -->

          @foreach ($comments as $comment)
          <div class="media mb-4">
         <img class="d-flex mr-3 rounded-circle" src="#" alt="">
         <div class="media-body">
           <h5 class="mt-0">Commenter Name</h5>  {{$comment->comment}}
           post at ({{$comment->created_at}})
         </div>
       </div>
       @endforeach
        </div>
        {{-- </div> --}}

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">
          <!-- Side Widget -->
          <div class="card my-4">
            <h5 class="card-header">Side Widget</h5>
            <div class="card-body">
              You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
            </div>
          </div>

        </div>

      </div>

      <!-- /.row -->

    </div>
    <!-- /.container -->

@endsection

@section('script')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
   <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
   {{-- <script src="{{asset('Front/plugins/toastr/toastr.min.js') }}"></script> --}}
   {{-- <script src="{{asset('js/crud.js')}}"></script> --}}


<script>

//   function performStore(url){

//     let data = {
//           article_id: document.getElementById('article_id').value,
//           comment: document.getElementById('comment').value,

//         };
//     // let form=$('#commentForm');
//     // let data=form.serialize();
//     // let action=form.attr('action')
//     // var url = $('#commentForm').attr('action');

// // console.log(data) // دالة خاصة بمعرفة هل تم تمرير القيم أم لا
// store(url, data);
//   }
function performStore(){

let data = {
      article_id: document.getElementById('article_id').value,
      comment: document.getElementById('comment').value,

    };
// let form=$('#commentForm');
// let data=form.serialize();
// let action=form.attr('action')
var url = $('#commentForm').attr('action');

// console.log(data) // دالة خاصة بمعرفة هل تم تمرير القيم أم لا
store(url, data);
}


</script>

@endsection
