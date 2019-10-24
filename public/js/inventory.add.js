var items_count = 0; // The amount of sub line products in each form
var current_prod_select = '';

/**
 * Add product
 * @param serial
 * @param product
 */
function add_item (serial, product) {
    // Add elements to sub line products div
    $("#items").append("<div id='item_"+items_count+"' data-item-num='"+items_count+"' class='form-group row sub-element'>" +
        "<input type='hidden' value='1' name='item_id["+items_count+"]'>" +
        // Product options
        "<div class='col-lg-5 col-md-12' style='margin: 0'>" +
        "<select onchange='product_change(this)' id='product_"+items_count+"' name='product["+items_count+"]' class='select2 clean form-control' data-width='100%' required>" +
        products +
        "</select>" +
        "<small class='form-text text-muted'>Product</small>" +
        "</div>" +

        // MAC
        "<div class='col-lg-3 col-md-11' style='margin: 0;min-width: 225px'>" +
        "<input type='text' id='mac_"+items_count+"' name='mac["+items_count+"]' class='form-control'>" +
        "<small class='form-text text-muted'>MAC</small>" +
        "</div>" +

        // Serial
        "<div class='col-lg-3 col-md-12' style='margin: 0;min-width: 225px'>" +
        "<input type='text' id='serial_"+items_count+"' name='serial["+items_count+"]' class='form-control serial' required>" +
        "<small class='form-text text-muted'>Serial</small>" +
        "</div>" +

        // Remove button
        "<div class='col-1' style='margin: 0'>" +
        "<button type='button' onclick='remove_element(\"item_"+items_count+"\")' class='btn btn-outline-danger li-remove-sub-btn'>Remove</button>" +
        "</div>" +
        "</div>");
    $("#serial_"+items_count).focus();

    if (current_prod_select) {
        $("#product_" + items_count).val(current_prod_select);
    }

    $("html, body").animate({ scrollTop: $(document).height()-$(window).height() });

    // Add select2 as same theme
    $('.select2').select2({
        theme: 'bootstrap'
    });
    items_count++;
}

/**
 * Changed the product
 * @param element the select element that was changed
 */
function product_change (element) {
    current_prod_select = element.value;
    //alert(element.parentNode.getAttribute('name')+element.getAttribute('data-item-num'));
    setTimeout(function () {
        document.getElementById("serial_"+element.parentNode.parentNode.getAttribute('data-item-num')).focus();
    }, 100);
}

/**
 * Remove product
 * @param elementId
 */
function remove_element(elementId) {
    // Removes an element from the document
    var element = document.getElementById(elementId);
    element.parentNode.removeChild(element);
}

// Add product on enter
document.onkeydown = function(evt) {
    evt = evt || window.event;
    if (evt.keyCode === 13 && document.activeElement !== document.querySelector(".add-product-btn")) {
        evt.preventDefault();
        add_item("", 0);
        return false;
    }
};

// Add product on add product button
document.querySelector(".add-item-btn").addEventListener("click", function(event){
    event.preventDefault();
    add_item("", 0);
});
