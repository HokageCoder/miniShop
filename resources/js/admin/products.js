$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
    }
});

if (WEBURL == API + "/products") {
    $(function() {
        /**
         * Initialize product table
         */
        readProduct("all");

        $(document).on("click", "#add_products", function() {
            $("#products_table_group").addClass("d-none");
            $("#products_form_group").removeClass("d-none");
            $("#save_product").attr("mode", "create");
        });

        $(document).on("click", "#close_add_products", function() {
            $("#products_table_group").removeClass("d-none");
            $("#products_form_group").addClass("d-none");
            resetForm("#product_form");
        });

        $(document).on("click", "#save_product", function() {
            let data = $("#product_form").serialize();
            let mode = $(this).attr("mode");

            if (mode == "create") {
                $.ajax({
                    dataType: "json",
                    type: "POST",
                    url: API + `/products/create`,
                    data,
                    success: function(res) {
                        console.log(res);

                        if (res.error == false) {
                            $("#close_add_products").click();
                            resetForm("#product_form");
                            readProduct("all");
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log(
                            "ERROR: " + status + "/" + xhr.responseText
                        );
                    }
                });
            } else {
                // update

                $.ajax({
                    dataType: "json",
                    type: "POST",
                    url: API + `/products/update/${$(this).attr("product_id")}`,
                    data,
                    success: function(res) {
                        console.log(res);

                        if (res.error == false) {
                            $("#close_add_products").click();
                            resetForm("#product_form");
                            readProduct("all");
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log(
                            "ERROR: " + status + "/" + xhr.responseText
                        );
                    }
                });
            }
        });

        $(document).on("click", ".view_product", function() {
            $("#save_product")
                .attr("mode", "update")
                .attr("product_id", $(this).attr("product_id"));

            let data = {
                id: $(this).attr("product_id"),
                name: $(this).attr("product_name"),
                quantity: $(this).attr("product_quantity"),
                price: $(this).attr("product_price"),
                category: $(this).attr("product_category")
            };

            console.log(data);
            fillForms("#product_form", data);
            $("#products_table_group").addClass("d-none");
            $("#products_form_group").removeClass("d-none");
        });

        $(document).on("click", ".delete_product", function() {
            $.ajax({
                dataType: "json",
                type: "POST",
                url: API + `/products/delete/${$(this).attr("product_id")}`,
                success: function(res) {
                    console.log(res);

                    if (res.error == false) {
                        readProduct("all");
                    }
                },
                error: function(xhr, status, error) {
                    console.log("ERROR: " + status + "/" + xhr.responseText);
                }
            });
        });
    });
}

function readProduct(type) {
    if (type == "all") {
        $.ajax({
            dataType: "json",
            type: "GET",
            url: API + `/products/read`,
            success: function(res) {
                console.log(res);
                fillTable({
                    moduleTable: "products_table",
                    tbodyId: "#products_tbody",
                    data: res
                });
            },
            error: function(xhr, status, error) {
                console.log("ERROR: " + status + "/" + xhr.responseText);
            }
        });
    }
}
