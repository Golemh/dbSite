
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
        var uid = $("#uid").val();
        var password = $("#password").val();
        var active =  $("#active").val();
        var sid =  $("#sid").val();
        


         var myData = {
             'uid': uid, 'password': password, 'active': active, 'sid': sid
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


$('#euid').val(data1);
$('#epassword').val(data2);
$('#eactive').val(data3);
$('#esid').val(data4);



}
)
$("#eUpdate").click(function() {
var uid = data1;
var euid = $('#euid').val();
var password =  $("#epassword").val();
var active =  $("#eactive").val();
var sid= $("#esid").val();


var myData = {
              'euid': euid, 'password': password, 'active': active, 'sid': sid, 'uid': uid
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