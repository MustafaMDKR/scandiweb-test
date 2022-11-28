$(function () {
    const size = $('#sizeView');
    const weight = $('#weightView');
    const dimension = $('#dimensionView');
    const productType = $('#type');
    const option = $('option');

    size.hide();
    weight.hide();
    dimension.hide();

    productType.change(function () {
        switch (productType.val()) {
            case 'DVD':
                productType.find('option[selected]').removeAttr('selected');
                productType.find('option[value=DVD]').attr('selected', true);
                size.show();
                weight.hide();
                dimension.hide();
                break;
            case 'Book':
                productType.find('option[selected]').removeAttr('selected');
                productType.find('option[value=Book]').attr('selected', true);
                size.hide();
                weight.show();
                dimension.hide();
                break;
            case 'Furniture':
                productType.find('option[selected]').removeAttr('selected');
                productType.find('option[value=Furniture]').attr('selected', true);
                size.hide();
                weight.hide();
                dimension.show();
                break;
        }
    });

    
});