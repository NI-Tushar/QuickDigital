// PRODUCT FILTER
$("body").on("click", ".category-item:not(.active)", function () {
    var category = $(this).attr("category");
    var visibleItem = 0;
    $(this).addClass("active").siblings().removeClass("active");
    $(".open-category-list span").text($(this).text());
  
    if (category != "*") {
      $(".product-item").hide();
      $(".product-item[category='" + category + "']").show();
      visibleItem = $(".product-item[category='" + category + "']").length;
    } else {
      $(".product-item").show();
      visibleItem = $(".product-item").length;
    }
  
    visibleItem == 0 ? $(".no-item").show() : $(".no-item").hide();
  
    if (isOpened == 1) {
      $(".category-group.active .category-list").slideUp(300);
      $(".category-group.active").removeClass("active");
    }
  });
  
  var isOpened = 0;
  $(".open-category-list").click(function () {
    $(this).parent().toggleClass("active");
    $(this).siblings(".category-list").slideToggle(300);
    isOpened = 1;
  });
  