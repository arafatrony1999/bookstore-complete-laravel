@extends('layouts.adminLayout')
@section('content')



<main class="admin_main">
    <div class="d-flex justify-content-center bs-spinner">
        <div class="spinner-border bs-spinner-border" role="status">
          <span class="sr-only">Loading...</span>
        </div>
    </div>

    <table class="table" id="orderTable">
        <thead>
            <tr>
                <th scope="col">Order ID</th>
                <th scope="col">Product ID</th>
                <th scope="col">Book Name</th>
                <th scope="col">Price</th>
                <th scope="col">Subtotal</th>
                <th scope="col">Customer Name</th>
                <th scope="col">Phone No.</th>
                <th scope="col">Email</th>
                <th scope="col">Address</th>
                <th scope="col">Order Time</th>
                <th scope="col">Status</th>
            </tr>
        </thead>


        <tbody id="orderTR">

        </tbody>
        
    </table>





    <div class="modal fade" id="orderModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <h2 class="p-3">What is the current status of this order?</h2>
                    <select class="form-select" id="myStatus" aria-label="Default select example">
                        <option selected>Select Status</option>
                        <option value="In Progress">In Progress</option>
                        <option value="Delivered">Delivered</option>
                      </select>
                    <h2 class="d-none" id="orderIDget"></h2>
                </div>
                <div class="modal-footer">
                    <button data-id="" id="orderStatusUpdate" type="button" class="get btn btn-danger">Update Status</button>
                    <button onclick="$('#orderModal').modal('hide')" type="button" class="btn btn-success" data-mdb-dismiss="modal">
                        Cancle
                    </button>
                </div>
            </div>
        </div>
    </div>


</main>




@endsection



@section('script')


<script>
    getorderData();


    function getorderData(){
    
    axios.get('/getorderData')
    .then(function(response){
        var jsonData=response.data;

        $('#orderTR').empty();
        $.each(jsonData,function(i){
            if(jsonData[i].status=="In Progress"){
                $('<tr>').html(
                    "<td>"+jsonData[i].orderID+"</td>"+
                    "<td>"+jsonData[i].productID+"</td>"+
                    "<td>"+jsonData[i].productName+"</td>"+
                    "<td>"+jsonData[i].productPrice+"</td>"+
                    "<td>"+jsonData[i].subtotal+"</td>"+
                    "<td>"+jsonData[i].orderName+"</td>"+
                    "<td>"+jsonData[i].orderPhone+"</td>"+
                    "<td>"+jsonData[i].orderEmail+"</td>"+
                    "<td>"+jsonData[i].userAddress+"</td>"+
                    "<td>"+jsonData[i].created_at+"</td>"+
                    "<td><button class='btn btn-info open-modal' data-id='"+jsonData[i].orderID+"'>"+jsonData[i].status+"</button></td>"
                ).appendTo('#orderTR');
            }else{
                $('<tr>').html(
                    "<td>"+jsonData[i].orderID+"</td>"+
                    "<td>"+jsonData[i].productID+"</td>"+
                    "<td>"+jsonData[i].productName+"</td>"+
                    "<td>"+jsonData[i].productPrice+"</td>"+
                    "<td>"+jsonData[i].subtotal+"</td>"+
                    "<td>"+jsonData[i].orderName+"</td>"+
                    "<td>"+jsonData[i].orderPhone+"</td>"+
                    "<td>"+jsonData[i].orderEmail+"</td>"+
                    "<td>"+jsonData[i].userAddress+"</td>"+
                    "<td>"+jsonData[i].created_at+"</td>"+
                    "<td><button disabled class='btn btn-success' data-id='"+jsonData[i].orderID+"'>"+jsonData[i].status+"</button></td>"
                ).appendTo('#orderTR');
            }
        });

        $('.bs-spinner').addClass('d-none');


        $('.open-modal').on('click',function(){
            var orderIDget = $(this).data('id');
            $('#orderIDget').html(orderIDget);
            $('#orderModal').modal('show');
        });

        $('#orderStatusUpdate').on('click',function(){
            var orderId = $('#orderIDget').html();
            var status = $('#myStatus').val();

            var url = '/orderUpdate';
            var data = {orderId:orderId,status:status};

            axios.post(url,data)
            .then(function(response){
                alert(response.data);
                if(response.data==1){
                    tata.success('','Status updated successfully');
                    $('#orderModal').modal('hide');
                    getorderData();
                }
                else{
                    tata.error('','Status updated failed');
                }
            })
            .catch(function(error){
                tata.error('','Status updated failed');
            });

        });
        
        $('#orderTable').DataTable();
        $('.dataTables_length').addClass('bs-select');
        
    })
    .catch(function(error){
        alert('something wrong');
    });
}
</script>

<script>
</script>

@endsection