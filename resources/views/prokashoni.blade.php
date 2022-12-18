@extends('layouts.adminLayout')
@section('content')
    <main class="admin_main">
        <div class="d-flex justify-content-center bs-spinner">
            <div class="spinner-border bs-spinner-border" role="status">
              <span class="sr-only">Loading...</span>
            </div>
        </div>

        <div style="margin: 0 0 20px 20px" class="addNewButton">
            <button id="addNewProkashoni" class="btn btn-primary">Add New</button>
        </div>

        <form action="/prokashoniImport" enctype="multipart/form-data" method="post">
            @csrf
            <input type="file" name="prokashoniFile" id="">
            <button type="submit" class="btn btn-info">Upload via Excel</button>
        </form>

        <table class="table" id="ProkashoniTable">
            <thead>
                <tr>
                    <th scope="col">Prokashoni ID</th>
                    <th scope="col">Prokashoni Name</th>
                    <th scope="col">Update</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>


            <tbody id="prokashoniNameTR">

            </tbody>
            
        </table>




        
        <!-- Modal -->
        <div class="modal fade" id="addNewProkashoniModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <h2 class="p-3">নতুন প্রকাশনীর নাম যোগ করুন</h2>
                        
                        <form id="prokashoni_form" enctype="multipart/form-data">
                            <div class="row my-3">
                                <div class="col">
                                    <label class="form-label">প্রকাশনীর নাম</label>
                                    <input type="text" id="prokashoniName" class="form-control" />
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
                                    <button data-id="" id="prokashoniAddBtn" type="button" class="get btn btn-success">Add</button>
                                    <button onclick="$('#addNewProkashoniModal').modal('hide')" type="button" class="btn btn-primary" data-mdb-dismiss="modal">
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
        <div class="modal fade" id="updateProkashoniModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <h2 class="p-3">প্রকাশনীর নাম আপডেট করুন</h2>
                        
                        <form enctype="multipart/form-data">
                            <div class="row my-3">
                                <div class="col">
                                    <label class="form-label">প্রকাশনীর নাম</label>
                                    <input type="text" id="prokashoniNameUpdate" class="form-control" />
                                </div>
                            </div>


                            <h2 class="d-none" id="getUpdateProkashoniID"></h2>

                            <div class="modal-footer">
                                <div class="flexLeft">
                                    <button data-id="" id="prokashoniUpdateBtn" type="button" class="get btn btn-success">Update</button>
                                    <button onclick="$('#updateProkashoniModal').modal('hide')" type="button" class="btn btn-primary" data-mdb-dismiss="modal">
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
        <div class="modal fade" id="prokashoniDeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body text-center">
                        <h3 class="p-3">Are you sure you want to delete this data?</h3>
                        <h2 class="d-none" id="prokashoniDeleteIDget"></h2>
                    </div>
                    <div class="modal-footer">
                        <button data-id="" id="prokashoniDeleteIDwork" type="button" class="get btn btn-danger">Delete</button>
                        <button onclick="$('#prokashoniDeleteModal').modal('hide')" type="button" class="btn btn-success" data-mdb-dismiss="modal">
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
    getProkashoniNameData();
    

function getProkashoniNameData(){
    $('#prokashoniUpdateBtn').html('Update');
    $('#prokashoniDeleteIDwork').html('Delete');
    
    axios.get('/prokashoniNameData')
    .then(function(response){

        var jsonData=response.data;

        $('#prokashoniNameTR').empty();
        $.each(jsonData,function(i){
            $('<tr>').html(
            "<td>"+jsonData[i].prokashoniID+"</td>"+
            "<td>"+jsonData[i].ProkashoniName+"</td>"+
            "<td><button type='button' class='btn btn-success catchProkashoniUpdateID' id='catchProkashoniUpdateID' data-id="+jsonData[i].prokashoniID+">"+"Update</button></td>"+
            "<td><button type='button' class='btn btn-danger catchProkashoniDeleteID' id='catchProkashoniDeleteID' data-id="+jsonData[i].prokashoniID+">"+"Delete</button></td>"
            ).appendTo('#prokashoniNameTR');
        });

        $('.bs-spinner').addClass('d-none');


        // append id for delete book fair item 
        $('.catchProkashoniDeleteID').on('click',function(){
            var deleteID = $(this).data('id');
            $('#prokashoniDeleteModal').modal('show');
            $('#prokashoniDeleteIDget').html(deleteID);
        });
        // append id for delete book fair item 


        
        // append id for update book fair item 
        $('.catchProkashoniUpdateID').on('click',function(){
            if(!$('#warningProkashoniUpdate').hasClass('d-none')){
                $('#warningProkashoniUpdate').addClass('d-none');
            }
            if(!$('#SuccessProkashoniUpdate').hasClass('d-none')){
                $('#SuccessProkashoniUpdate').addClass('d-none');
            }
            var prokashoniUpdateIDget = $(this).data('id');
            var prokashoniUpdateURL = '/prokashoniUpdateURL';
            var prokashoniUpdateID = {prokashoniUpdateID:prokashoniUpdateIDget};
            
            axios.post(prokashoniUpdateURL,prokashoniUpdateID)
            .then(function(response){
                var jsonDataUpdate = response.data;
                $('#prokashoniNameUpdate').val(jsonDataUpdate[0].ProkashoniName);
        
                $('#getUpdateProkashoniID').html(jsonDataUpdate[0].prokashoniID);
                $('#updateProkashoniModal').modal('show');
            })
            .catch(function(error){

            });
        });
        // append id for update book fair item 

        $('#ProkashoniTable').DataTable();
        $('.dataTables_length').addClass('bs-select');
        
    })
    .catch(function(error){
        var sorryModalText = "দুঃক্ষিত ! পেইজ রিফ্রেশ করুণ।";
        $('.sorry-modal-body').html(sorryModalText);
        $('#sorryMessege').modal('show');
    });
}


$('#prokashoniUpdateBtn').on('click',function(){
    var updateSpinner = "<div class='d-flex justify-content-center'><div class='spinner-border spinner-border-sm' role='status'></div></div>";
    $('#prokashoniUpdateBtn').html(updateSpinner);

    let id = $('#getUpdateProkashoniID').html();
    let name = $('#prokashoniNameUpdate').val();

    let prokashoniUpdateURLsend = '/prokashoniUpdateURLsend';
    let prokashoniUpdateObjectSend = {id:id,name:name}
    axios.post(prokashoniUpdateURLsend,prokashoniUpdateObjectSend)
    .then(function(response){
        if(response.data==1){
            $('#updateProkashoniModal').modal('hide');
            tata.success('আপডেট সফল হয়েছে',' ')
            getProkashoniNameData();
        }
        else{
            tata.error('দুঃখিত। আপনি কোনো ডাটা আপডেট করেননি',' ');
        }
    })
    .catch(function(error){
        tata.error('দুঃখিত। আপনি কোনো ডাটা আপডেট করেননি',' ');
    });
});


$('prokashoniDeleteIDwork').on('click',function(){
    var updateSpinner = "<div class='d-flex justify-content-center'><div class='spinner-border spinner-border-sm' role='status'></div></div>";
    $('#prokashoniDeleteIDwork').html(updateSpinner);

    let prokashoniDeleteIDget = $('#prokashoniDeleteIDget').html();
    url = '/prokashoniDeleteURL';
    data = {id:prokashoniDeleteIDget};
    
    axios.post(url,data)
    .then(function(response){
        if(response.data==1){
            $('#prokashoniDeleteModal').modal('hide');
            tata.success('ডিলিট সফল হয়েছে',' ')
            getProkashoniNameData();
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

$('#addNewProkashoni').on('click',function(){
    $('#prokashoni_form').trigger("reset");
    $('#prokashoniAddBtn').html("Add");
    $('#addNewProkashoniModal').modal('show');
});


$('#prokashoniAddBtn').on('click',function(){
    var addNewSpinner = "<div class='d-flex justify-content-center'><div class='spinner-border spinner-border-sm' role='status'></div></div>";
    $('#prokashoniAddBtn').html(addNewSpinner);


    var prokashoniName = $('#prokashoniName').val();


    var prokashoniNameData = {prokashoniName:prokashoniName};
    var prokashoniNameUrl = '/prokashoniNameAddNew';

    

    axios.post(prokashoniNameUrl,prokashoniNameData)
    .then(function(response){
        if(response.data==1){
            tata.success('ডাটা সফল ভাবে ডাটাবেজে সংরক্ষিত করা হয়েছে',' ');
            getProkashoniNameData();
            $('#prokashoniAddBtn').html('Add');
            $('#prokashoni_form').trigger("reset");
        }
        else{
            tata.error('দুঃখিত। আবার চেষ্টা করুণ',' ');
            $('#prokashoniAddBtn').html('Add');
        }
    })
    .catch(function(error){
        tata.error('দুঃখিত। আবার চেষ্টা করুণ',' ');
        $('#prokashoniAddBtn').html('Add');
    });
});


});

</script>

@endsection