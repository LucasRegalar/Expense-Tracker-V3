document.addEventListener('DOMContentLoaded', function () {

    const typeSelect = document.getElementById('type-select');
    const categorySelect = document.getElementById('category-select');
    const options = categorySelect.querySelectorAll('option');


    function filterCategories(categorySelect, typeValue, optionsArray) {

        categorySelect.value = '';
        optionsArray.forEach(option => {
            if (typeValue === '' || option.dataset.type === typeValue || !option.dataset.type) {
                option.style.display = '';
            } else {
                option.style.display = 'none'
            }
        });
    }

    function selectType(categorySelect, typeSelect) {
        const selectedOption = categorySelect.options[categorySelect.selectedIndex];
        const categoryType = selectedOption.dataset.type;
        if (categoryType) {
            typeSelect.value = categoryType;
        } else {
            typeSelect.value = '';   
        }
    }


    typeSelect.addEventListener('change', function() {
        filterCategories(categorySelect, typeSelect.value, options);
    })


    categorySelect.addEventListener('change', function () {
        selectType(categorySelect, typeSelect);
    })
})