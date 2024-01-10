function scrollleft(){
      var left=document.querySelector(".reviews");
	left.scrollBy(350,0);
}
function scrollright(){
      var right=document.querySelector(".reviews");
	right.scrollBy(-350,0);
}
$(document).ready(function(){
$(document).on('click','.seebtn',function(){
      let id=$(this).attr('id');
      let obj;
      $.ajax({
            type: "POST",
            url: "Searching.php",
            data: {id:id,action:"seemore"},
            success: function (response) {
                  obj=JSON.parse(response);
                  $('#Show-details img').attr('src', "uploaded_img/"+obj.Product_Image);
                  $('#Show-details h3').text(obj.Product_Name);
                  $('#Show-details h4').text("RS ."+obj.Product_Price+"/=");
                  $('#Show-details p').text(obj.Product_Details);
                  $('.Show-details #card').attr('href', `view_page.php?pid=${obj.Product_ID}`);
                  $('#Show-details').modal();
            }
      });
     
});
$(document).on('click','.Latest',function(){
      let id=$(this).attr('id');
      let obj;
      $.ajax({
            type: "POST",
            url: "Searching.php",
            data: {id:id,action:"seemore"},
            success: function (response) {
                  obj=JSON.parse(response);

                  $('#Show-details img').attr('src', "uploaded_img/"+obj.Product_Image);
                  $('#Show-details h3').text(obj.Product_Name);
                  $('#Show-details h4').text("RS ."+obj.Product_Price+"/=");
                  $('#Show-details p').text(obj.Product_Details);
                  $('.Show-details #card').attr('href', `view_page.php?pid=${obj.Product_ID}`);
                $('#Show-details').modal();
            }
      });
     
});
		
});

