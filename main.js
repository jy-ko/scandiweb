$("#productType").on("change", function() {
    $("#" + $(this).val()).show().siblings().hide();
})