@extends('layouts.adminLayout')
@section('content')
    <main class="admin_main">
        <div class="d-flex justify-content-center bs-spinner">
            <div class="spinner-border bs-spinner-border" role="status">
              <span class="sr-only">Loading...</span>
            </div>
        </div>

        <div style="margin: 0 0 20px 20px" class="addNewButton">
            <button id="addNewbishoy" class="btn btn-primary">Add New</button>
        </div>
        
        <form action="/bishoyImport" enctype="multipart/form-data" method="post">
            @csrf
            <input type="file" name="bishoyFile" id="">
            <button type="submit" class="btn btn-info">Upload via Excel</button>
        </form>

        <table class="table" id="bishoyTable">
            <thead>
                <tr>
                    <th scope="col">Bishoy ID</th>
                    <th scope="col">Bishoy Name</th>
                    <th scope="col">Update</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>


            <tbody id="bishoyNameTR">

            </tbody>
            
        </table>




        
        <!-- Modal -->
        <div class="modal fade" id="addNewbishoyModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <h2 class="p-3">নতুন বিষয়ের নাম যোগ করুন</h2>
                        
                        <form id="bishoy_form" enctype="multipart/form-data">
                            <div class="row my-3">
                                <div class="col">
                                    <label class="form-label">বিষয়ের নাম</label>
                                    <input type="text" id="bishoyName" class="form-control" />
                                </div>
                            </div>
                            

                            <div class="modal-footer">
                                <div class="flexLeft">
                                    <button data-id="" id="bishoyAddBtn" type="button" class="get btn btn-success">Add</button>
                                    <button onclick="$('#addNewbishoyModal').modal('hide')" type="button" class="btn btn-primary" data-mdb-dismiss="modal">
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
        <div class="modal fade" id="updatebishoyModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <h2 class="p-3">বিষয়ের নাম আপডেট করুন</h2>
                        
                        <form enctype="multipart/form-data">
                            <div class="row my-3">
                                <div class="col">
                                    <label class="form-label">বিষয়ের নাম</label>
                                    <input type="text" id="bishoyNameUpdate" class="form-control" />
                                </div>
                            </div>


                            <h2 class="d-none" id="getUpdatebishoyID"></h2>

                            <div class="modal-footer">
                                <div class="flexLeft">
                                    <button data-id="" id="bishoyUpdateBtn" type="button" class="get btn btn-success">Update</button>
                                    <button onclick="$('#updatebishoyModal').modal('hide')" type="button" class="btn btn-primary" data-mdb-dismiss="modal">
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
        <div class="modal fade" id="bishoyDeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body text-center">
                        <h3 class="p-3">Are you sure you want to delete this data?</h3>
                        <h2 class="d-none" id="bishoyDeleteIDget"></h2>
                    </div>
                    <div class="modal-footer">
                        <button data-id="" id="bishoyDeleteIDwork" type="button" class="get btn btn-danger">Delete</button>
                        <button onclick="$('#bishoyDeleteModal').modal('hide')" type="button" class="btn btn-success" data-mdb-dismiss="modal">
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
    getbishoyNameData();
    

function getbishoyNameData(){
    $('#bishoyUpdateBtn').html('Update');
    $('#bishoyDeleteIDwork').html('Delete');
    
    axios.get('/bishoyNameData')
    .then(function(response){

        var jsonData=response.data;

        $('#bishoyNameTR').empty();
        $.each(jsonData,function(i){
            $('<tr>').html(
            "<td>"+jsonData[i].bishoyID+"</td>"+
            "<td>"+jsonData[i].bishoyName+"</td>"+
            "<td><button type='button' class='btn btn-success catchBishoyUpdateID' id='catchBishoyUpdateID' data-id="+jsonData[i].bishoyID+">"+"Update</button></td>"+
            "<td><button type='button' class='btn btn-danger catchbishoyDeleteID' id='catchbishoyDeleteID' data-id="+jsonData[i].bishoyID+">"+"Delete</button></td>"
            ).appendTo('#bishoyNameTR');
        });

        $('.bs-spinner').addClass('d-none');


        // append id for delete book fair item 
        $('.catchbishoyDeleteID').on('click',function(){
            var deleteID = $(this).data('id');
            $('#bishoyDeleteModal').modal('show');
            $('#bishoyDeleteIDget').html(deleteID);
        });
        // append id for delete book fair item 


        
        // append id for update book fair item 
        $('.catchBishoyUpdateID').on('click',function(){
            if(!$('#warningbishoyUpdate').hasClass('d-none')){
                $('#warningbishoyUpdate').addClass('d-none');
            }
            if(!$('#SuccessbishoyUpdate').hasClass('d-none')){
                $('#SuccessbishoyUpdate').addClass('d-none');
            }
            var bishoyUpdateIDget = $(this).data('id');
            var bishoyUpdateURL = '/bishoyUpdateURL';
            var bishoyUpdateID = {bishoyUpdateID:bishoyUpdateIDget};
            
            axios.post(bishoyUpdateURL,bishoyUpdateID)
            .then(function(response){
                var jsonDataUpdate=response.data;
                $('#bishoyNameUpdate').val(jsonDataUpdate[0].bishoyName);
        
                $('#getUpdatebishoyID').html(jsonDataUpdate[0].bishoyID);
                $('#updatebishoyModal').modal('show');
            })
            .catch(function(error){
                alert('something went wrong');
            });
        });
        // append id for update book fair item 

        $('#bishoyTable').DataTable();
        $('.dataTables_length').addClass('bs-select');
        
    })
    .catch(function(error){
        var sorryModalText = "দুঃক্ষিত ! পেইজ রিফ্রেশ করুণ।";
        $('.sorry-modal-body').html(sorryModalText);
        $('#sorryMessege').modal('show');
    });
}


$('#bishoyUpdateBtn').on('click',function(){
    var updateSpinner = "<div class='d-flex justify-content-center'><div class='spinner-border spinner-border-sm' role='status'></div></div>";
    $('#bishoyUpdateBtn').html(updateSpinner);

    let id = $('#getUpdatebishoyID').html();
    let name = $('#bishoyNameUpdate').val();

    let bishoyUpdateURLsend = '/bishoyUpdateURLsend';
    let bishoyUpdateObjectSend = {id:id,name:name}
    axios.post(bishoyUpdateURLsend,bishoyUpdateObjectSend)
    .then(function(response){
        if(response.data==1){
            $('#updatebishoyModal').modal('hide');
            tata.success('আপডেট সফল হয়েছে',' ')
            getbishoyNameData();
        }
        else{
            tata.error('দুঃখিত। আপনি কোনো ডাটা আপডেট করেননি',' ');
        }
    })
    .catch(function(error){
        tata.error('দুঃখিত। আপনি কোনো ডাটা আপডেট করেননি',' ');
    });
});


$('bishoyDeleteIDwork').on('click',function(){
    var updateSpinner = "<div class='d-flex justify-content-center'><div class='spinner-border spinner-border-sm' role='status'></div></div>";
    $('#bishoyDeleteIDwork').html(updateSpinner);

    let bishoyDeleteIDget = $('#bishoyDeleteIDget').html();
    url = '/bishoyDeleteURL';
    data = {id:bishoyDeleteIDget};
    
    axios.post(url,data)
    .then(function(response){
        if(response.data==1){
            $('#bishoyDeleteModal').modal('hide');
            tata.success('ডিলিট সফল হয়েছে',' ')
            getbishoyNameData();
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

$('#addNewbishoy').on('click',function(){
    $('#bishoy_form').trigger("reset");
    $('#bishoyAddBtn').html("Add");
    $('#addNewbishoyModal').modal('show');
});


$('#bishoyAddBtn').on('click',function(){
    var addNewSpinner = "<div class='d-flex justify-content-center'><div class='spinner-border spinner-border-sm' role='status'></div></div>";
    $('#bishoyAddBtn').html(addNewSpinner);


    var bishoyName = $('#bishoyName').val();


    var bishoyNameData = {bishoyName:bishoyName};
    var bishoyNameUrl = '/bishoyNameAddNew';

    

    axios.post(bishoyNameUrl,bishoyNameData)
    .then(function(response){
        if(response.data==1){
            tata.success('ডাটা সফল ভাবে ডাটাবেজে সংরক্ষিত করা হয়েছে',' ');
            getbishoyNameData();
            $('#bishoyAddBtn').html('Add');
            $('#bishoy_form').trigger("reset");
        }
        else{
            tata.error('দুঃখিত। আবার চেষ্টা করুণ',' ');
            $('#bishoyAddBtn').html('Add');
        }
    })
    .catch(function(error){
        tata.error('দুঃখিত। আবার চেষ্টা করুণ',' ');
        $('#bishoyAddBtn').html('Add');
    });
});
});
</script>

@endsection