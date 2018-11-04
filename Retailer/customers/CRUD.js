
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
        //var cid =  $("#CID").val();
        var sname = $("#SNAME").val();
        var cname = $("#CNAME").val();
        var address =  $("#Address").val();
        var area =  $("#Area").val();
        var cno =  $("#CNO").val();
        var gc =  $("#GC").val();
        var sid = $("#sid option:selected").attr("nameid");
        

        var myData = {
             //'cid': cid,
             'sname': sname, 'cname': cname, 'address': address, 'area': area, 'cno': cno, 'gc': gc, 'sid': sid
         }

        // if (cid == '' || cid == null ||  /^\d+$/.test(val))
        //     alert("invalid CID. please enter an integer as CID");
         
        if  (sname == '' || sname == null)
            alert("No shop name given. Please enter a name");

        else if  (cname == '' || cname == null)
            alert("No Customer name given. Please enter a name");

        else if  (address == '' || address == null)
            alert("No address given given. Please enter a name");

        else if  (area == '' || area == null)
            alert("No area given. Please enter an area");

        else if  (cno == '' || cno == null)
            alert("No contact number given. Please enter a number");

        else if  (gc == '' || gc == null)
            alert("Empty shop name given. Please enter a name");

        else {
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

$("#addModal.in").keypress(function(){
    if(e.which == 13){
        $('#update').click();
    }
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


var cid =    data1;
var sname =  $("#eSNAME").val();
var cname =  $("#eCNAME").val();
var address= $("#eCNO").val();
var area =   $("#eAddress").val();
var cno =    $("#eArea").val();
var gc =     $("#eGC").val();
var sid = $("#esid option:selected").attr("nameid");;




//var dataString = 'CID='+cid + ' SNAME='+sname + ' CNAME:' + cname + ' ADDRESS:' + address + ' AREA:' + area + ' CNO:' + cno + ' GC:' + gc;
var myData = {
             'cid': cid, 'sname': sname, 'cname': cname, 'address': address, 'area': area, 'cno': cno, 'gc': gc,'sid': sid
         }


        if  (sname == '' || sname == null)
            alert("No shop name given. Please enter a name");

        else if  (cname == '' || cname == null)
            alert("No Customer name given. Please enter a name");

        else if  (address == '' || address == null)
            alert("No address given given. Please enter a name");

        else if  (area == '' || area == null)
            alert("No area given. Please enter an area");

        else if  (cno == '' || cno == null)
            alert("No contact number given. Please enter a number");

        else if  (gc == '' || gc == null)
            alert("No Geographic coordinates given. Please enter a name");
        
        else {
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