$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
    }
});

if (WEBURL == API + "/shop") {
    $(function() {
        readShop();
    });

    let productId = 0;
    let quantity = 0;
    let name = "";
    let price = 0;
    $(document).on("click", ".add_cart", function() {
        $("#shop_table_group").addClass("d-none");
        $("#shop_form_group").removeClass("d-none");

        productId = $(this).attr("product_id");
        quantity = $(this).attr("product_name");
        name = $(this).attr("product_quantity");
        price = $(this).attr("product_price");

        $("#product_name").text(quantity);
        $("#in_stock").text(name);
        $("#product_price").text(price);
    });

    $(document).on("click", "#close_add_cart", function() {
        $("#shop_table_group").removeClass("d-none");
        $("#shop_form_group").addClass("d-none");
        resetForm("#shop_form");
    });

    $(document).on("click", "#add_to_cart", function() {
        let data = {
            product_id: productId,
            reserved_quantity: $("#quantity").val()
        };

        $.ajax({
            dataType: "json",
            type: "POST",
            url: API + `/shop/add_cart`,
            data,
            success: function(res) {
                console.log(res);
            },
            error: function(xhr, status, error) {
                console.log("ERROR: " + status + "/" + xhr.responseText);
            }
        });
    });
}

function readShop() {
    $.ajax({
        dataType: "json",
        type: "GET",
        url: API + `/products/read`,
        success: function(res) {
            console.log(res);
            fillTable({
                moduleTable: "shop_table",
                tbodyId: "#shop_tbody",
                data: res
            });
        },
        error: function(xhr, status, error) {
            console.log("ERROR: " + status + "/" + xhr.responseText);
        }
    });
}
