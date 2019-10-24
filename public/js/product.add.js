var products_count = 0; // The amount of sub line products in each form

/**
 * Add product
 * @param product_sku
 * @param count
 */
function add_product (product_sku, count) {
    // Add elements to sub line products div
    $("#products").append("<div id='product_"+products_count+"' data-product-num='"+products_count+"' class='form-group row sub-element' >" +
        "<input type='hidden' value='1' name='product_id["+products_count+"]'>" +
        // Product options
        "<div class='col-lg-8 col-md-12' style='margin: 0'>" +
        "<select onchange='product_change(this)' id='product_"+products_count+"' name='product["+products_count+"]' class='select2 clean form-control' data-width='100%' required>" +
        products.replace("value='"+product_sku+"'", "value='"+product_sku+"' selected") +
        "</select>" +
        "<small class='form-text text-muted'>Product (Name - SKU)</small>" +
        "</div>" +

        // Count
        "<div class='col-lg-2 col-md-11' style='margin: 0'>" +
        "<input type='number' value='"+count+"' id='count_"+products_count+"' name='count["+products_count+"]' class='form-control count' required>" +
        "<small class='form-text text-muted'>Product Count</small>" +
        "</div>" +

        // Remove button
        "<div class='col-1' style='margin: 0'>" +
        "<button type='button' onclick='remove_element(\"product_"+products_count+"\")' class='btn btn-outline-danger li-remove-sub-btn'>Remove</button>" +
        "</div>" +
        "</div>");

    $("html, body").animate({ scrollTop: $(document).height()-$(window).height() });

    // Add select2 as same theme
    $('.select2').select2({
        theme: 'bootstrap'
    });
    products_count++;
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
        add_product("", 1);
        return false;
    }
};

// Add product on add product button
document.querySelector(".add-product-btn").addEventListener("click", function(event){
    event.preventDefault();
    add_product("", 1);
});
