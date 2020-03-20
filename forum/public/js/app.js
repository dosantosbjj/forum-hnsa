
window.onload = function(){
    document.getElementById("save").disabled=true;
}

function check(){
    var state = 0;
    var senha = document.getElementById("password");
    var confirmacao = document.getElementById("confirmation");


    if(senha.value === confirmacao.value){
        senha.style.borderColor = "light-gray";
        confirmacao.style.borderColor = "light-gray";
        document.getElementById("save").disabled=false;  
    }else{
        alert('Confirmação deve ser igual à senha...');
        senha.value = '';
        confirmacao.value = '';
        senha.style.borderColor = "red";
        confirmacao.style.borderColor = "red";
        senha.focus();
    }
}
// document.getElementById("form").addEventListener("submit", function (event){
//     event.preventDefault();
//     

//     if(senha === confirmacao){
//         document.getElementById("save").disabled=true;
//     }  
// )





