// Empty JS for your own code to be here

$("#cuenta").change(function(){
var op = $("#cuenta option:selected").val();
if(op==1){
    $('.ocultar').hide();
}else{
    $('.ocultar').show();
}
});
