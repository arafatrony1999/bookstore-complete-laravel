@extends('layouts.adminLayout')
@section('content')
    <main class="admin_main">
        <div class="d-flex justify-content-center bs-spinner">
            <div class="spinner-border bs-spinner-border" role="status">
              <span class="sr-only">Loading...</span>
            </div>
        </div>

        <div class="buttons-group">
            <div class="addNewButton first-group">
                <button id="addNewproduct" class="btn btn-primary button-g">Add New</button>
                <a href="/export" class="btn btn-primary button-g">Export Excel</a>
            </div>

            <div class="addNewButton import-group">
                <form action="/import" enctype="multipart/form-data" method="post">
                    @csrf
                    <input type="file" name="file">
                    <button type="submit" class="btn btn-primary">Import New Products by Excel</button>
                </form>
                {{-- <form action="/importExcel" enctype="multipart/form-data" method="post">
                    @csrf
                    <input type="file" name="file">
                    <button type="submit" class="btn btn-primary">Update Products by Excel</button>
                </form> --}}
            </div>
        </div>



        <table class="table" id="productuserTable">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Book Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Image</th>
                    <th scope="col">Prokashoni</th>
                    <th scope="col">Writer</th>
                    <th scope="col">Catagory</th>
                    <th scope="col">Availability</th>
                    <th scope="col">Pice</th>
                    <th scope="col">Update</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>


            <tbody id="productTR">

            </tbody>
            
        </table>




        
        <!-- Modal -->
        <div class="modal fade" id="addNewproductModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <h2 class="p-3">Add New item</h2>
                        
                        <form id="productform_id" enctype="multipart/form-data">
                            <div class="row my-3">
                                <div class="col">
                                    <label class="form-label">বইয়ের নাম</label>
                                    <input type="text" id="productName" class="form-control" />
                                </div>
                            
                                <div class="col">
                                    <label class="form-label">দাম</label>
                                    <input type="text" id="productPrice" class="form-control" />
                                </div>
                            </div>
                            
                            <div class="row my-3">
                                <div class="col">
                                    <label class="form-label">ছবি</label>
                                    <input type="file" id="productImage" class="form-control" />
                                </div>
                            
                                {{-- <div class="col">
                                    <label class="form-label">প্রকাশনী</label>
                                    <input type="text" id="productProkashoni" class="form-control" />
                                </div> --}}
                                <div class="form-group col">
                                    <label>প্রকাশনী</label>
                                    <select id="productProkashoni" class="form-control">
                                        <option selected>প্রকাশনী...</option>
                                        @foreach ($prokashoni_name as $prokashoni_name)
                                            <option value="{{$prokashoni_name->ProkashoniName}}">{{$prokashoni_name->ProkashoniName}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            
                            <div class="row my-3">
                                {{-- <div class="col">
                                    <label class="form-label">লেখক</label>
                                    <input type="text" id="productWriter" class="form-control" />
                                </div> --}}
                                <div class="form-group col">
                                    <label>লেখক</label>
                                    <select id="productWriter" class="form-control">
                                        <option selected>লেখক...</option>
                                        @foreach ($writer_name as $writer_name)
                                            <option value="{{$writer_name->WriterName}}">{{$writer_name->WriterName}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            
                                <div class="form-group col">
                                    <label>বিষয়</label>
                                    <select id="productCatagory" class="form-control">
                                        <option selected>বিষয়...</option>
                                        @foreach ($bishoy_name as $bishoy_name)
                                            <option value="{{$bishoy_name->bishoyName}}">{{$bishoy_name->bishoyName}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row my-3">
                                <div class="col">
                                    <label class="form-label">Availability</label>
                                    <select id="productAvail" class="form-control" />
                                        <option selected>In Stock</option>
                                        <option value="Out of Stock">Out of Stock</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <label class="form-label">Available Item</label>
                                    <input type="text" id="productItem" class="form-control" />
                                </div>
                            </div>
                            <div class="row my-3">
                                <div class="col">
                                    <label class="form-label">ISBN</label>
                                    <input type="text" id="productISBN" class="form-control" />
                                </div>
                            
                                <div class="col">
                                    <label class="form-label">Total Page</label>
                                    <input type="text" id="productPage" class="form-control" />
                                </div>
                            </div>

                            
                            <div class="row my-3">
                                <div class="col">
                                    <label class="form-label">Edition</label>
                                    <input type="text" id="productEdition" class="form-control" />
                                </div>

                                <div class="col">
                                    <label class="form-label">Publish Year</label>
                                    <input type="text" id="productPublishYear" class="form-control" />
                                </div>
                            </div>
                            
                            <div class="row my-3">
                                <div class="col">
                                    <label class="form-label">Country</label>
                                    <select id="productCountry" class="form-control">
                                        <option value="Bangladesh" selected>Bangladesh</option>
                                        <option value="India">India</option>
                                        <option value="Pakistan">Pakistan</option>
                                        <option value="USA">USA</option>
                                        <option value="England">England</option>
                                        <option value="Spain">Spain</option>
                                        <option value="Canada">Canada</option>
                                        <option value="Australia">Australia</option>
                                    </select>
                                </div>
                            
                                <div class="col">
                                    <label class="form-label">Language</label>
                                    <select id="productLanguage" class="form-control" />
                                        <option selected>Bangla</option>
                                        <option value="English">English</option>
                                        <option value="Hindi">Hindi</option>
                                        <option value="Arabic">Arabic</option>
                                        <option value="Spanish">Spanish</option>
                                    </select>
                                </div>
                            </div>

                            
                            <div class="form-group">
                                <label for="productDescription">Product Description</label>
                                <textarea class="form-control" id="productDescription" rows="3"></textarea>
                            </div>
                            

                            <div class="modal-footer">
                                <div class="d-none">
                                    <p style="color: red">
                                        <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
                                        দুঃখিত। আবার চেষ্টা করুণ !
                                    </p>
                                </div>
                                <div width="100%" class="d-none">
                                    <p style="color: green">
                                        <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
                                        ডাটা সফল ভাবে ডাটাবেজে সংরক্ষিত করা হয়েছে ।
                                    </p>
                                </div>
                                <div class="flexLeft">
                                    <button data-id="" id="productAddBtn" type="button" class="get btn btn-success">Add</button>
                                    <button onclick="$('#addNewproductModal').modal('hide')" type="button" class="btn btn-primary" data-mdb-dismiss="modal">
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
        <div class="modal fade" id="updateproductModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <h2 class="p-3">Add New item</h2>
                        
                        <form enctype="multipart/form-data">
                            <div class="row my-3">
                                <div class="col">
                                    <label class="form-label">বইয়ের নাম</label>
                                    <input type="text" id="productNameUpdate" class="form-control" />
                                </div>
                            
                                <div class="col">
                                    <label class="form-label">দাম</label>
                                    <input type="text" id="productPriceUpdate" class="form-control" />
                                </div>
                            </div>
                            
                            <div class="row my-3">
                                <div class="col">
                                    <label class="form-label">ছবি</label>
                                    <input type="file" id="productImageUpdate" class="form-control" />
                                </div>
                            
                                <div class="col">
                                    <label>প্রকাশনী</label>
                                    <select id="productProkashoniUpdate" class="form-control">
                                        <option selected>প্রকাশনী...</option>
                                        @foreach ($prokashoni_name_update as $prokashoni_name)
                                            <option value="{{$prokashoni_name->ProkashoniName}}">{{$prokashoni_name->ProkashoniName}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            {{-- <div class="showImageUpdateModal">
                                
                            </div> --}}
                            
                            <div class="row my-3">
                                <div class="col">
                                    <label class="form-label">লেখক</label>
                                    <select id="productWriterUpdate" class="form-control">
                                        <option selected>লেখক...</option>
                                        @foreach ($writer_name_update as $writer_name)
                                            <option value="{{$writer_name->WriterName}}">{{$writer_name->WriterName}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            
                                <div class="form-group col">
                                    <label>ক্যাটাগরি</label>
                                    <select id="productCatagoryUpdate" class="form-control">
                                        <option selected>ক্যাটাগরি...</option>
                                        @foreach ($bishoy_name_update as $bishoy_name)
                                            <option>{{$bishoy_name->bishoyName}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row my-3">
                                <div class="col">
                                    <label class="form-label">Availability</label>
                                    <select id="productAvailUpdate" class="form-control">
                                        <option value="In Stock" selected>In Stock</option>
                                        <option value="Out of Stock">Out of Stock</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <label class="form-label">Available Item</label>
                                    <input type="text" id="productItemUpdate" class="form-control" />
                                </div>
                            </div>

                            <div class="row my-3">
                                <div class="col">
                                    <label class="form-label">ISBN</label>
                                    <input type="text" id="productISBNUpdate" class="form-control" />
                                </div>
                                <div class="col">
                                    <label class="form-label">Total Page</label>
                                    <input type="text" id="productPageUpdate" class="form-control" />
                                </div>
                            </div>

                            <div class="row my-3">
                                <div class="col">
                                    <label class="form-label">Edition</label>
                                    <input type="text" id="productEditionUpdate" class="form-control" />
                                </div>

                                <div class="col">
                                    <label class="form-label">Publish Year</label>
                                    <input type="text" id="productPublishYearUpdate" class="form-control" />
                                </div>
                            </div>
                            
                            <div class="row my-3">
                                <div class="col">
                                    <label class="form-label">Country</label>
                                    <select id="productCountryUpdate" class="form-control">
                                        <option value="Bangladesh" selected>Bangladesh</option>
                                        <option value="India">India</option>
                                        <option value="Pakistan">Pakistan</option>
                                        <option value="USA">USA</option>
                                        <option value="England">England</option>
                                        <option value="Spain">Spain</option>
                                        <option value="Canada">Canada</option>
                                        <option value="Australia">Australia</option>
                                    </select>
                                </div>
                            
                                <div class="col">
                                    <label class="form-label">Language</label>
                                    <select id="productLanguageUpdate" class="form-control" />
                                        <option selected>Bangla</option>
                                        <option value="English">English</option>
                                        <option value="Hindi">Hindi</option>
                                        <option value="Arabic">Arabic</option>
                                        <option value="Spanish">Spanish</option>
                                    </select>
                                </div>
                            </div>

                            
                            <div class="form-group">
                                <label for="productDescriptionUpdate">Product Description</label>
                                <textarea class="form-control" id="productDescriptionUpdate" rows="3"></textarea>
                            </div>
                            
                            <h2 class="d-none" id="getproductUpdateDataID"></h2>

                            <div class="modal-footer">
                                <div class="d-none" id="warningproductUpdate">
                                    <p style="color: red">
                                        <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
                                        দুঃখিত। আপনি কোনো ডাটা আপডেট করেননি ।
                                    </p>
                                </div>
                                <div width="100%" class="d-none" id="SuccessproductUpdate">
                                    <p style="color: green">
                                        <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
                                        আপডেট সফল হয়েছে ।
                                    </p>
                                </div>
                                <div class="flexLeft">
                                    <button data-id="" id="productUpdateBtn" type="button" class="get btn btn-success">Update</button>
                                    <button onclick="$('#updateproductModal').modal('hide')" type="button" class="btn btn-primary" data-mdb-dismiss="modal">
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





        {{-- Catagory2 delete modal  --}}
        <div class="modal fade" id="productDeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body text-center">
                        <h2 class="p-3">Are you sure you want to delete this data?</h2>
                        <h2 class="d-none" id="productDeleteIDget"></h2>
                    </div>
                    <div class="modal-footer">
                        <button data-id="" id="productDeleteIDwork" type="button" class="get btn btn-danger">Delete</button>
                        <button onclick="$('#productDeleteModal').modal('hide')" type="button" class="btn btn-success" data-mdb-dismiss="modal">
                            Cancle
                        </button>
                    </div>
                </div>
            </div>
        </div>
        {{-- Catagory2 delete modal  --}}


        <!-- Catagory2 sorry modal -->
        <div class="modal fade" id="productsorryMessege" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <button onclick="$('#productsorryMessege').modal('hide')" type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close" ></button>
                    </div>
                    <div class="modal-body sorry-modal-body">

                    </div>
                    <div class="modal-footer">
                        <button type="button" id="refreshproductPage" class="btn btn-secondary" data-mdb-dismiss="modal">
                        Try Again
                        </button>
                        <button onclick="$('#productsorryMessege').modal('hide')" type="button" class="btn btn-primary">Cancle</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Catagory2 sorry modal -->


        <a href="/importPage">Import data by excel</a>


    </main>
@endsection



@section('script')

<script>
    getproductData();


    function getproductData(){
    $('#productUpdateBtn').html("Update");
    $('#productDeleteIDwork').html("Delete");
    
    axios.get('/getproductData')
    .then(function(response){

        var jsonData=response.data;

        $('#productTR').empty();
        $.each(jsonData,function(i){
            $('<tr>').html(
            "<td>"+jsonData[i].id+"</td>"+
            "<td>"+jsonData[i].bookName+"</td>"+
            "<td>৳"+jsonData[i].bookPrice+".00</td>"+
            "<td><img width='50px' src='"+jsonData[i].productImage+"'></td>"+
            "<td>"+jsonData[i].bookProkashoni+"</td>"+
            "<td>"+jsonData[i].bookWriter+"</td>"+
            "<td>"+jsonData[i].bookCatagory+"</td>"+
            "<td>"+jsonData[i].stockAvail+"</td>"+
            "<td>"+jsonData[i].productItem+"</td>"+
            "<td><button type='button' class='btn btn-success catchproductUpdateID' id='catchproductUpdateID' data-id="+jsonData[i].id+">"+"Update</button></td>"+
            "<td><button type='button' class='btn btn-danger catchproductDeleteID' id='catchproductDeleteID' data-id="+jsonData[i].id+">"+"Delete</button></td>"
            ).appendTo('#productTR');
        });

        $('.bs-spinner').addClass('d-none');


        // append id for delete book fair item 
        $('.catchproductDeleteID').on('click',function(){
            var deleteID = $(this).data('id');
            $('#productDeleteModal').modal('show');
            $('#productDeleteIDget').html(deleteID);
        });
        // append id for delete book fair item 


        
        // append id for update book fair item 
        $('.catchproductUpdateID').on('click',function(){
            if(!$('#warningproductUpdate').hasClass('d-none')){
                $('#warningproductUpdate').addClass('d-none');
            }
            if(!$('#SuccessproductUpdate').hasClass('d-none')){
                $('#SuccessproductUpdate').addClass('d-none');
            }
            var updateIDget = $(this).data('id');
            var updateURL = '/productUpdateURL';
            var updateID = {updateID:updateIDget};
            
            axios.post(updateURL,updateID)
            .then(function(response){
                var jsonDataUpdate = response.data;
                $('#productNameUpdate').val(jsonDataUpdate[0].bookName);
                $('#productPriceUpdate').val(jsonDataUpdate[0].bookPrice);
                $('#productProkashoniUpdate').val(jsonDataUpdate[0].bookProkashoni);
                $('#productWriterUpdate').val(jsonDataUpdate[0].bookWriter);
                $('#productCatagoryUpdate').val(jsonDataUpdate[0].bookCatagory);
                $('#productISBNUpdate').val(jsonDataUpdate[0].ISBN);
                $('#productAvailUpdate').val(jsonDataUpdate[0].stockAvail);
                $('#productEditionUpdate').val(jsonDataUpdate[0].productEdition);
                $('#productPublishYearUpdate').val(jsonDataUpdate[0].productPublishYear);
                $('#productPageUpdate').val(jsonDataUpdate[0].productPage);
                $('#productCountryUpdate').val(jsonDataUpdate[0].productCountry);
                $('#productLanguageUpdate').val(jsonDataUpdate[0].productLanguage);
                $('#productDescriptionUpdate').val(jsonDataUpdate[0].productDescription);
                $('#productItemUpdate').val(jsonDataUpdate[0].productItem);

                // var updateImage = "<img height='80px' src='"+jsonDataUpdate[0].productImage+"'>";
                // $('.showImageUpdateModal').html(updateImage);
        
                $('#getproductUpdateDataID').html(jsonDataUpdate[0].id);
                $('#updateproductModal').modal('show');
            })
            .catch(function(error){
                alert('Something went wrong!');
            });
        });
        // append id for update book fair item 

        $('#productuserTable').DataTable();
        $('.dataTables_length').addClass('bs-select');
        
    })
    .catch(function(error){
        var sorryModalText = "দুঃক্ষিত ! পেইজ রিফ্রেশ করুণ।";
        $('.sorry-modal-body').html(sorryModalText);
        $('#productsorryMessege').modal('show');
    });
}

// Book fair delete item function 
$('#productDeleteIDwork').on('click',function(){
    var deleteSpinner = "<div class='d-flex justify-content-center'><div class='spinner-border spinner-border-sm' role='status'></div></div>";
    $('#productDeleteIDwork').html(deleteSpinner);


    var productDeleteIDget = $('#productDeleteIDget').html();

    var productDeleteID = {productDeleteIDget:productDeleteIDget}
    var productDeleteURL = '/productDeleteURL';

    axios.post(productDeleteURL,productDeleteID)
    .then(function(response){
        if(response.data==1){
            getproductData();
            $('#productDeleteModal').modal('hide');
        }
        else{
            $('.modal-body').html("Something went wrong!");
        }
    })
    .catch(function(error){
        $('.modal-body').html("Something went wrong!");
    });
});


// Book Fair update function 
$('#productUpdateBtn').on('click',function(){
    var updateSpinner = "<div class='d-flex justify-content-center'><div class='spinner-border spinner-border-sm' role='status'></div></div>";
    $('#productUpdateBtn').html(updateSpinner);
    
    var productUpdateIDget = $('#getproductUpdateDataID').html();

    
    var bookNameUpdate = $('#productNameUpdate').val();

    var bookPriceUpdate = $('#productPriceUpdate').val();

    var productImageGetUpdate = $('#productImageUpdate').prop('files')[0];
    var productImageUpdate = new FormData();
    productImageUpdate.append('photoUpdate',productImageGetUpdate);

    var bookProkashoniUpdate = $('#productProkashoniUpdate').val();
    var bookWriterUpdate = $('#productWriterUpdate').val();
    var bookCatagoryUpdate = $('#productCatagoryUpdate').val();
    var productEditionUpdate = $('#productEditionUpdate').val();
    var productPublishYearUpdate = $('#productPublishYearUpdate').val();
    var productPageUpdate = $('#productPageUpdate').val();
    var productCountryUpdate = $('#productCountryUpdate').val();
    var productLanguageUpdate = $('#productLanguageUpdate').val();
    var productDescriptionUpdate = $('#productDescriptionUpdate').val();
    var productItemUpdate = $('#productItemUpdate').val();

    var productFinalUpdateURL = '/productFinalUpdateURL';
    var sendproductObject = {
        productUpdateID:productUpdateIDget,
        bookNameUpdate:bookNameUpdate,
        bookPriceUpdate:bookPriceUpdate,
        bookProkashoniUpdate:bookProkashoniUpdate,
        bookWriterUpdate:bookWriterUpdate,
        bookCatagoryUpdate:bookCatagoryUpdate,
        productEditionUpdate:productEditionUpdate,
        productPublishYearUpdate:productPublishYearUpdate,
        productPageUpdate:productPageUpdate,
        productCountryUpdate:productCountryUpdate,
        productLanguageUpdate:productLanguageUpdate,
        productDescriptionUpdate:productDescriptionUpdate,
        productItemUpdate:productItemUpdate
    };


    axios.post(productFinalUpdateURL,sendproductObject)
    .then(function(response){
        if(response.data==1){
            if(productImageGetUpdate==null){
                $('#SuccessproductUpdate').removeClass('d-none');
                $('#updateproductModal').modal('hide');
                getproductData();
            }
            else{
                var productImageFinalUpdateURL = '/productImageFinalUpdateURL';
                axios.post(productImageFinalUpdateURL,productImageUpdate)
                .then(function(response){
                    $('#SuccessproductUpdate').removeClass('d-none');
                    $('#updateproductModal').modal('hide');
                    getproductData();
                })
                .catch(function(error){
                    alert('Image update failed!');
                });
            }
        }else{
            $('#warningproductUpdate').removeClass('d-none');
            // $('#productUpdateBtn').html("Update");
        }
    })
    .catch(function(error){
        $('#warningproductUpdate').removeClass('d-none');
        // $('#productUpdateBtn').html("Update");
    });
});
// Book Fair update function

$('#refreshproductPage').on('click',function(){
    location.reload();
});




$(document).ready(function(){

$('#addNewproduct').on('click',()=>{
    $('#productform_id').trigger("reset");
    $('#productAddBtn').html("Add");
    $('#addNewproductModal').modal('show');
});


$('#productAddBtn').on('click',()=>{
    var addNewSpinner = "<div class='d-flex justify-content-center'><div class='spinner-border spinner-border-sm' role='status'></div></div>";
    $('#productAddBtn').html(addNewSpinner);


    var bookName = $('#productName').val();

    var bookPrice = $('#productPrice').val();

    var productImageGet = $('#productImage').prop('files')[0];
    var productImage = new FormData();
    productImage.append('photo',productImageGet);

    var bookProkashoni = $('#productProkashoni').val();
    var bookWriter = $('#productWriter').val();
    var bookCatagory = $('#productCatagory').val();
    var bookISBN = $('#productISBN').val();
    var bookAvail = $('#productAvail').val();
    var productEdition = $('#productEdition').val();
    var productPublishYear = $('#productPublishYear').val();
    var productPage = $('#productPage').val();
    var productCountry = $('#productCountry').val();
    var productLanguage = $('#productLanguage').val();
    var productDescription = $('#productDescription').val();
    var productItem = $('#productItem').val();
    

    var productData = {
        bookName:bookName,
        bookPrice:bookPrice,
        bookProkashoni:bookProkashoni,
        bookWriter:bookWriter,
        bookCatagory:bookCatagory,
        bookISBN:bookISBN,
        bookAvail:bookAvail,
        productEdition:productEdition,
        productPublishYear:productPublishYear,
        productPage:productPage,
        productCountry:productCountry,
        productLanguage:productLanguage,
        productDescription:productDescription,
        productItem:productItem
    }
    var productUrl = '/productAddNew';
    

    axios.post(productUrl,productData)
    .then(function(response){
        if(response.data==1){
            // var checkAddImageExistence = Object.keys('photo').length;
            if(productImageGet==null){
                $('#addNewproductModal').modal('hide');
                getproductData();
            }
            else{
                var productImageUrl = '/productImageUrl';
                axios.post(productImageUrl,productImage)
                .then(function(response){
                    if(response.data==1){
                        $('#addNewproductModal').modal('hide');
                        getproductData();
                    }
                })
                .catch(function(error){
                    alert("image upload failed");
                });
            }
            $('#addNewproductModal').modal('hide');
            getproductData();
        }
        else{
            $('#productAddBtn').html("Add");
            $('#SuccessAdd').removeClass('d-none');
            getproductData();
        }
    })
    .catch(function(error){
        $('#productAddBtn').html("Add");
        $('#SuccessAdd').removeClass('d-none');
        getproductData();
    });

});
});
</script>

@endsection