
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
        var cid =  $("#CID").val();
        var sname = $("#SNAME").val();
        var cname = $("#CNAME").val();
        var address =  $("#Address").val();
        var area =  $("#Area").val();
        var cno =  $("#CNO").val();
        var gc =  $("#GC").val();
        var sid = $("#sid option:selected").attr("nameid");
        

         var myData = {
             'cid': cid, 'sname': sname, 'cname': cname, 'address': address, 'area': area, 'cno': cno, 'gc': gc, 'sid': sid
         }

         if(cid == '') {
             alert("Please fill all fields");
         } else {
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
        }
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


$('#eCID').val(data1);
$('#eSNAME').val(data2);
$('#eCNAME').val(data3);
$('#eCNO').val(data4);
$('#eAddress').val(data5);
$('#eArea').val(data6);
$('#eGC').val(data7);


}
)
$("#eUpdate").click(function() {


var cid =    $("#eCID").val();
var sname =  $("#eSNAME").val();
var cname =  $("#eCNAME").val();
var address= $("#eCNO").val();
var area =   $("#eAddress").val();
var cno =    $("#eArea").val();
var gc =     $("#eGC").val();
var sid = $("#esid option:selected").attr("nameid");;

var dataString = 'CID='+cid + ' SNAME='+sname + ' CNAME:' + cname + ' ADDRESS:' + address + ' AREA:' + area + ' CNO:' + cno + ' GC:' + gc;
var myData = {
             'cid': cid, 'sname': sname, 'cname': cname, 'address': address, 'area': area, 'cno': cno, 'gc': gc,'sid': sid
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
                     //$('#addModal').modal('hide');
                     
                     location.reload(true);
                 }
             });
        }
        return false;

}
)   
});    // 'create product form' handle will be here