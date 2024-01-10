$(document).ready(function () {
  // toggle icon change
  $(document).on('click','.searching',function() {
    let searchres=$('#search').val();
      $.ajax({
        type: "POST",
        url: "Searching.php",
        data:{search:searchres,action:"search"},
        success: function (response) {
          if(response){
            $("#searchresult").append(response);
          }
        }
      });
      window.location.href="searchresult.php";
  });
  $("#menu").click(function () {
    $(this).toggleClass("fa-times");
    $(".navbar").toggleClass("nav-toggle");
  });
  // when stroll navigation bar fixed in top
  $(window).on("scroll load", function () {
    $("#menu").removeClass("fa-times");
    $(".navbar").removeClass("nav-toggle");

    if ($(window).scrollTop() > 30) {
      $("header .header-2").addClass("header-active");
    } else {
      $("header .header-2").removeClass("header-active");
    }
  });
  // function end
  // when responsive manu bar
  $("section").each(function () {
    let height = $(this).height();
    let offset = $(this).offset().top - 200;
    let top = $(window).scrollTop();
    let id = $(this).attr("id");

    if (top >= offset && top < offset + height) {
      $(".navbar ul li a").removeClass("active");
      $(".navbar").find(`[href="#${id}"]`).addClass("active");
    }
  });
  // end responsive bar
});

previewBox.forEach((close) => {
  close.querySelector(".fa-times").onclick = () => {
    close.classList.remove("active");
    preveiwContainer.style.display = "none";
  };
});



