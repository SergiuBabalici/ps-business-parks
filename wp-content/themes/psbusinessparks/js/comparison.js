$('html').on("click", ".compare", function() {
    var park_id = $("input[name='park_id']").val();

    var str = "";

    $("input[name='space']:checked").each(function(){
        str = str + this.value + ",";
    });

    window.location.href = "/parks-comparison/?park_id=" + park_id + "&suit_id=" + str;
});