@extends('layouts.adminLayout')
@section('content')
    <main class="admin_main">
        <div class="d-flex justify-content-center bs-spinner">
            <div class="spinner-border bs-spinner-border" role="status">
              <span class="sr-only">Loading...</span>
            </div>
        </div>

        <div style="margin: 0 0 20px 20px" class="addNewButton">
            <button id="addNewWriter" class="btn btn-primary">Add New</button>
        </div>

        <form action="/writerImport" enctype="multipart/form-data" method="post">
            @csrf
            <input type="file" name="writerFile" id="">
            <button type="submit" class="btn btn-info">Upload via Excel</button>
        </form>

        <table class="table" id="WriterTable">
            <thead>
                <tr>
                    <th scope="col">Writer ID</th>
                    <th scope="col">Writer Name</th>
                    <th scope="col">Update</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>


            <tbody id="writerNameTR">

            </tbody>
            
        </table>




        
        <!-- Modal -->
        <div class="modal fade" id="addNewWriterModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <h2 class="p-3">নতুন লেখকের নাম যোগ করুন</h2>
                        
                        <form id="writer_form" enctype="multipart/form-data">
                            <div class="row my-3">
                                <div class="col">
                                    <label class="form-label">লেখকের নাম</label>
                                    <input type="text" id="writerName" class="form-control" />
                                </div>
                            </div>
                            

                            <div class="modal-footer">
                                {{-- <div class="d-none" id="warningWriterAdd">
                                    <p style="color: red">
                                        <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
                                        দুঃখিত। আবার চেষ্টা করুণ !
                                    </p>
                                </div>
                                <div width="100%" class="d-none" id="AddWriterUpdate">
                                    <p style="color: green">
                                        <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
                                        ডাটা সফল ভাবে ডাটাবেজে সংরক্ষিত করা হয়েছে ।
                                    </p>
                                </div> --}}
                                <div class="flexLeft">
                                    <button data-id="" id="writerAddBtn" type="button" class="get btn btn-success">Add</button>
                                    <button onclick="$('#addNewWriterModal').modal('hide')" type="button" class="btn btn-primary" data-mdb-dismiss="modal">
                                        Cancle
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>





                
        <!--Update Modal -->
        <div class="modal fade" id="updateWriterModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <h2 class="p-3">লেখকের নাম আপডেট করুন</h2>
                        
                        <form enctype="multipart/form-data">
                            <div class="row my-3">
                                <div class="col">
                                    <label class="form-label">লেখকের নাম</label>
                                    <input type="text" id="writerNameUpdate" class="form-control" />
                                </div>
                            </div>


                            <h2 class="d-none" id="getUpdateWriterID"></h2>

                            <div class="modal-footer">
                                <div class="flexLeft">
                                    <button data-id="" id="writerUpdateBtn" type="button" class="get btn btn-success">Update</button>
                                    <button onclick="$('#updateWriterModal').modal('hide')" type="button" class="btn btn-primary" data-mdb-dismiss="modal">
                                        Cancle
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        {{-- Update Modal  --}}





        {{-- Book Fair delete modal  --}}
        <div class="modal fade" id="writerDeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body text-center">
                        <h3 class="p-3">Are you sure you want to delete this data?</h3>
                        <h2 class="d-none" id="writerDeleteIDget"></h2>
                    </div>
                    <div class="modal-footer">
                        <button data-id="" id="writerDeleteIDwork" type="button" class="get btn btn-danger">Delete</button>
                        <button onclick="$('#writerDeleteModal').modal('hide')" type="button" class="btn btn-success" data-mdb-dismiss="modal">
                            Cancle
                        </button>
                    </div>
                </div>
            </div>
        </div>
        {{-- Book Fair delete modal  --}}


        <!-- Book Fair sorry modal -->
        <div class="modal fade" id="sorryMessege" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <button onclick="$('#sorryMessege').modal('hide')" type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close" ></button>
                    </div>
                    <div class="modal-body sorry-modal-body">

                    </div>
                    <div class="modal-footer">
                        <button type="button" id="refreshBookFairPage" class="btn btn-secondary" data-mdb-dismiss="modal">
                        Try Again
                        </button>
                        <button onclick="$('#sorryMessege').modal('hide')" type="button" class="btn btn-primary">Cancle</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Book Fair sorry modal -->


    </main>
@endsection



@section('script')

<script>
    getWriterNameData();

    
function getWriterNameData(){
    $('#writerUpdateBtn').html('Update');
    $('#writerDeleteIDwork').html('Delete');
    
    axios.get('/writerNameData')
    .then(function(response){

        var jsonData=response.data;

        $('#writerNameTR').empty();
        $.each(jsonData,function(i){
            $('<tr>').html(
            "<td>"+jsonData[i].writerID+"</td>"+
            "<td>"+jsonData[i].WriterName+"</td>"+
            "<td><button type='button' class='btn btn-success catchWriterUpdateID' id='catchWriterUpdateID' data-id="+jsonData[i].writerID+">"+"Update</button></td>"+
            "<td><button type='button' class='btn btn-danger catchWriterDeleteID' id='catchWriterDeleteID' data-id="+jsonData[i].writerID+">"+"Delete</button></td>"
            ).appendTo('#writerNameTR');
        });

        $('.bs-spinner').addClass('d-none');


        // append id for delete book fair item 
        $('.catchWriterDeleteID').on('click',function(){
            var deleteID = $(this).data('id');
            $('#writerDeleteModal').modal('show');
            $('#writerDeleteIDget').html(deleteID);
        });
        // append id for delete book fair item 


        
        // append id for update book fair item 
        $('.catchWriterUpdateID').on('click',function(){
            if(!$('#warningWriterUpdate').hasClass('d-none')){
                $('#warningWriterUpdate').addClass('d-none');
            }
            if(!$('#SuccessWriterUpdate').hasClass('d-none')){
                $('#SuccessWriterUpdate').addClass('d-none');
            }
            var writerUpdateIDget = $(this).data('id');
            var writerUpdateURL = '/writerUpdateURL';
            var writerUpdateID = {writerUpdateID:writerUpdateIDget};
            
            axios.post(writerUpdateURL,writerUpdateID)
            .then(function(response){
                var jsonDataUpdate = response.data;
                $('#writerNameUpdate').val(jsonDataUpdate[0].WriterName);
        
                $('#getUpdateWriterID').html(jsonDataUpdate[0].writerID);
                $('#updateWriterModal').modal('show');
            })
            .catch(function(error){

            });
        });
        // append id for update book fair item 

        $('#WriterTable').DataTable();
        $('.dataTables_length').addClass('bs-select');
        
    })
    .catch(function(error){
        var sorryModalText = "দুঃক্ষিত ! পেইজ রিফ্রেশ করুণ।";
        $('.sorry-modal-body').html(sorryModalText);
        $('#sorryMessege').modal('show');
    });
}


$('#writerUpdateBtn').on('click',function(){
    var updateSpinner = "<div class='d-flex justify-content-center'><div class='spinner-border spinner-border-sm' role='status'></div></div>";
    $('#writerUpdateBtn').html(updateSpinner);

    let id = $('#getUpdateWriterID').html();
    let name = $('#writerNameUpdate').val();

    let writerUpdateURLsend = '/writerUpdateURLsend';
    let writerUpdateObjectSend = {id:id,name:name}
    axios.post(writerUpdateURLsend,writerUpdateObjectSend)
    .then(function(response){
        if(response.data==1){
            $('#updateWriterModal').modal('hide');
            tata.success('আপডেট সফল হয়েছে',' ')
            getWriterNameData();
        }
        else{
            tata.error('দুঃখিত। আপনি কোনো ডাটা আপডেট করেননি',' ');
        }
    })
    .catch(function(error){
        tata.error('দুঃখিত। আপনি কোনো ডাটা আপডেট করেননি',' ');
    });
});


$('#writerDeleteIDwork').on('click',function(){
    var updateSpinner = "<div class='d-flex justify-content-center'><div class='spinner-border spinner-border-sm' role='status'></div></div>";
    $('#writerDeleteIDwork').html(updateSpinner);

    let writerDeleteIDget = $('#writerDeleteIDget').html();
    url = '/writerDeleteURL';
    data = {id:writerDeleteIDget};
    
    axios.post(url,data)
    .then(function(response){
        if(response.data==1){
            $('#writerDeleteModal').modal('hide');
            tata.success('ডিলিট সফল হয়েছে',' ')
            getWriterNameData();
        }
        else{
            tata.error('দুঃখিত। ডাটা ডিলিট হয়নি',' ')
        }
    })
    .catch(function(error){
        tata.error('দুঃখিত। ডাটা ডিলিট হয়নি',' ')
    });
});


$(document).ready(function(){

$('#addNewWriter').on('click',function(){
    $('#writer_form').trigger("reset");
    $('#writerAddBtn').html("Add");
    $('#addNewWriterModal').modal('show');
});


$('#writerAddBtn').on('click',function(){
    var addNewSpinner = "<div class='d-flex justify-content-center'><div class='spinner-border spinner-border-sm' role='status'></div></div>";
    $('#writerAddBtn').html(addNewSpinner);


    var writerName = $('#writerName').val();


    var writerNameData = {writerName:writerName};
    var writerNameUrl = '/writerNameAddNew';

    

    axios.post(writerNameUrl,writerNameData)
    .then(function(response){
        if(response.data==1){
            tata.success('ডাটা সফল ভাবে ডাটাবেজে সংরক্ষিত করা হয়েছে',' ');
            getWriterNameData();
            $('#writerAddBtn').html('Add');
            $('#writer_form').trigger("reset");
        }
        else{
            // $('#warningWriterAdd').removeClass('d-none');
            tata.error('দুঃখিত। আবার চেষ্টা করুণ',' ');
            $('#writerAddBtn').html('Add');
        }
    })
    .catch(function(error){
        tata.error('দুঃখিত। আবার চেষ্টা করুণ',' ');
        $('#writerAddBtn').html('Add');
    });
});


});


</script>

@endsection