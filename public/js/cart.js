$('.crossBtn').on('click',function(){
    var getCrossID = $(this).data('id');
    url = '/axiosCartDelete';
    data = {getCrossID:getCrossID};

    axios.post(url,data)
    .then(function(response){
        console.log(response.data);
        if(response.data==1){
            tata.success('Data deleted successfully!','');
            location.reload();
        }
        else{
            tata.error('Something went wrong. Try again1','');
        }
    })
    .catch(function(error){
        tata.error('Something went wrong. Try again2','');
    })
});




// $(".getRowID").on('click',function(){
//     var getRowID = $(this).data('id');

    
//     url = '/axiosCartUpdate';
//     data = {getRowID:getRowID,getRowqty:getRowqty};

//     axios.post(url,data)
//     .then(function(response){
//         if(response.data==1){
//             tata.success('Data Updated successfully!','');
//         }
//         else{
//             tata.error('Something went wrong. Try again1','');
//         }
//     })
//     .catch(function(error){
//         tata.error('Something went wrong. Try again2','');
//     });
// })