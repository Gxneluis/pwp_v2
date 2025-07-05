var i = 0;
var images = [];
var slideTime = 3000;
images[0] ='includes/img/img_01.png';
images[1] ='includes/img/img_02.jpeg';

function chngPic(){
    document.body.style.backgroundImage = "url('"+images[i]+"')";
    document.body.style.backgroundRepeat = "no-repeat";
    document.body.style.backgroundPosition = "center center";
    if(i<images.length-1){ i++; }
    else { i=0; }
}
function getAccess(){
    $.ajax({
        url:"query/usr_qry.php",
        method:"POST",
        data:{ type:"0" },
        success:function(data) {
            // chngPage(data);
            window.location.replace(data);
            // console.log(data);
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            console.log("Status: " + textStatus+"\nError: " + errorThrown);
        }
    });
}
function logIn(){
    sUname = document.getElementById("idUName").value;
    sPword = document.getElementById("idPWord").value;
    $.ajax({
        url:"query/usr_qry.php",
        method:"POST",
        dataType: "json",
        data:{ type:"1", username:sUname, password:sPword},
        success:function(data) {
            getAccess();
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            console.log("Status: " + textStatus+"\nError: " + errorThrown);
        }
    });
}
$( document ).ready(function() {
    // document.getElementById("idBtn_LogIn").addEventListener("click", function () { logIn(); });
    // chngPic();
});

// setInterval(chngPic, 1000);