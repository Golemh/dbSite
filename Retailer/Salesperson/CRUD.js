
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
        var name = $("#name").val();
        var cno = $("#cno").val();
        
        


         var myData = {
             'name': name, 'cno': cno
         }


             $.ajax({
                 type: "POST",
                 url: "update.php",
                 data: myData,
                 cache: false,
                 success: function(data){
                    alert(data);
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


$('#ename').val(data2);
$('#ecno').val(data3);


}
)
$("#eUpdate").click(function() {
var sid = data1;
var name =  $("#ename").val();
var cno =  $("#ecno").val();


var myData = {
             'sid': sid, 'name': name, 'cno': cno
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