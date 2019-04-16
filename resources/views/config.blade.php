<script>

const API = "http://localhost:8000";
const WEBURL = window.location;

function fillTable(settings) {
    var data = settings.data;

    var count = 1;
    var compose = "";
    if (data) {
        switch (settings.moduleTable) {
            case "products_table":
                $.each(data, function(i) {
                    compose += `
                    <tr>  
                        <td>${data[i].id}</td>
                        <td>${data[i].name}</td>
                        <td>${data[i].quantity}</td>
                        <td>${data[i].price}</td>
                        <td>${data[i].category ? data[i].category : "N/A"}</td>
                        <td>
                        <button 
                            product_id="${data[i].id}"
                            product_name="${data[i].name}"
                            product_quantity="${data[i].quantity}"
                            product_price="${data[i].price}"
                            product_category="${
                                data[i].category ? data[i].category : ""
                            }"
                            type="button" 
                            class="delete_product btn btn-danger btn-sm"><i class="fas fa-trash"></i>
                        </button>     
                        <button 
                            product_id="${data[i].id}"
                            product_name="${data[i].name}"
                            product_quantity="${data[i].quantity}"
                            product_price="${data[i].price}"
                            product_category="${
                                data[i].category ? data[i].category : ""
                            }"
                            type="button" 
                            class="view_product btn btn-success btn-sm">
                            <i class="fas fa-edit"></i>
                        </button>
                        </td>
                    </tr>
                `;
                });
                break;

            case 'shop_table':
            $.each(data, function(i) {
                    compose += `
                    <tr>  
                        <td>${data[i].id}</td>
                        <td>${data[i].name}</td>
                        <td>${data[i].quantity}</td>
                        <td>${data[i].price}</td>
                        <td>${data[i].category ? data[i].category : "N/A"}</td>
                        <td>
                        <button 
                            product_id="${data[i].id}"
                            product_name="${data[i].name}"
                            product_quantity="${data[i].quantity}"
                            product_price="${data[i].price}"
                            product_category="${
                                data[i].category ? data[i].category : ""
                            }"
                            type="button" 
                            class="add_cart btn btn-success btn-sm">
                            <i class="fas fa-shopping-cart"></i>
                        </button>
                        </td>
                    </tr>
                `;
                });
            break;
        }
    } else {
        compose += `
        <tr>  
            <td> No Data Dound .</th>
        </tr>
        `;
    }

    $(settings.tbodyId).html(compose);
}

function fillForms(form, object) {
    var fillArray = [];
    $(form + " input," + form + " select," + form + " textarea").each(
        function() {
            fillArray.push($(this).attr("name"));
        }
    );

    var filteredObject = {};
    $.each(fillArray, function(k, v) {
        filteredObject[v] = object[v];
    });

    $.each(filteredObject, function(k, v) {
        if (v !== "null") {
            let type = $(form + " #" + k).attr("type");

            if (type == "checkbox") {
                if (v == 1 || v == "1") {
                    $(form + " #" + k).prop("checked", true);
                }
            } else {
                $(form + " #" + k).val(v);
            }
        } else {
            $(form + " #" + k).val("");
        }
    });

    console.log(fillArray);
    console.log(filteredObject);
}

function resetForm(form) {
    $(form + ' input[type="text"]').val("");
    $(form + ' input[type="password"]').val("");
    $(form + ' input[type="date"]').val("");
    $(form + ' input[type="datetime-local"]').val("");
    $(form + ' input[type="email"]').val("");
    $(form + ' input[type="file"]').val("");
    $(form + ' input[type="month"]').val("");
    $(form + ' input[type="number"]').val(0);
    $(form + ' input[type="range"]').val("");
    $(form + ' input[type="search"]').val("");
    $(form + ' input[type="tel"]').val("");
    $(form + ' input[type="time"]').val("");
    $(form + ' input[type="url"]').val("");
    $(form + ' input[type="week"]').val("");

    $(form + " select")
        .val(null)
        .trigger("change");
    $(form + " textarea").val("");

    $(form + " .error-bag").addClass("d-none");
}

</script>