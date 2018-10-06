
$(document).ready(function(){
    var parent;
    var data1;
    var data2;
    var data3;
    var data4;
    var data5;
    var data6;
    var data7;
    
    $('#update').click(function(){
        var brand = $("#brand").val();
        var type = $("#type").val();
        var shade =  $("#shade").val();
        var size =  $("#size").val();
        var price =  $("#price").val();
        
        


         var myData = {
             'brand': brand, 'type': type, 'shade': shade, 'size': size, 'price': price
         }


             $.ajax({
                 type: "POST",
                 url: "update.php",
                 data: myData,
                 cache: false,
                 success: function(html){
                     $('#addModal').modal('hide');
                     location.reload(true);
                 }
             });
        
        return false;
    });


$(".delete_class").click(function() {

var id = $(this).attr('value');


 

   // alert(id)

$.ajax({
                 type: "POST",
                 url: "delete.php",
                 data: "id="+id,
                 success: function(html){
                     //$('#addModal').modal('hide');
                     location.reload(true);
                 }
             });


}
)
 


$(".edit_class").click(function() {

parent = $(this).closest('tr');
data1 = parent.find('td').eq(0).html();
data2 = parent.find('td').eq(1).html();
data3 = parent.find('td').eq(2).html();
data4 = parent.find('td').eq(3).html();
data5 = parent.find('td').eq(4).html();
data6 = parent.find('td').eq(5).html();
data7 = parent.find('td').eq(6).html();


$('#ebrand').val(data2);
$('#etype').val(data3);
$('#eshade').val(data4);
$('#esize').val(data5);
$('#eprice').val(data6);


}
)
$("#eUpdate").click(function() {
var pcode = data1;
var brand =  $("#ebrand").val();
var type =  $("#etype").val();
var shade= $("#eshade").val();
var size =   $("#esize").val();
var price =    $("#eprice").val();

var dataString = 'pcode='+pcode + ' brand='+brand + ' type:' + type + ' shade:' + shade + ' size:' + size + ' price:' + price;
var myData = {
             'pcode': pcode, 'brand': brand, 'type': type, 'shade': shade, 'size': size, 'price': price
         }


         if(data1 == '') {
             alert("Please fill all fields");
         } else {
             $.ajax({
                 type: "POST",
                 url: "edit.php",
                 data: myData,
                 cache: false,
                 success: function(response){
                     $('#editModal').modal('hide');
                     location.reload(true);
                 }
             });
        }
        return false;

}
)   
});    // 'create product form' handle will be here