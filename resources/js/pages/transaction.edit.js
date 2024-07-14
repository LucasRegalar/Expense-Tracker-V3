document.addEventListener('DOMContentLoaded', function () {

    const typeSelect = document.getElementById('type-select');
    const primaryCategorySelect = document.getElementById('primary_category-select');
    const primaryOptions = primaryCategorySelect.querySelectorAll('option');
    const secondaryCategorySelect = document.getElementById('secondary_category-select');
    const secondaryOptions = secondaryCategorySelect.querySelectorAll('option');
    const submitBtn = document.getElementById('submit-btn');

    const oldPrimaryCategory = window.transactionData.flashedPrimaryCategory;
    const oldSecondaryCategory = window.transactionData.flashedSecondaryCategory;

    function filterCategories(categorySelect, typeValue, optionsArray, oldCategory) {

        categorySelect.value = '';
        optionsArray.forEach(option => {
            if (typeValue === '' || option.dataset.type === typeValue || !option.dataset.type) {
                option.style.display = '';
                // selecting old/flashed Option
                if (option.value === oldCategory) {
                    option.selected = true;
                }
            } else {
                option.style.display = 'none'
            }
        });
    }

    function changeBtnColor(btn, typeValue) {
        if (typeValue === 'income') {
            btn.classList.remove('bg-main-red', 'hover:bg-hover-red');
            btn.classList.add('bg-main-green', 'hover:bg-hover-green');
        }

        if (typeValue === 'expense') {
            btn.classList.remove('bg-main-green', 'hover:bg-hover-green');
            btn.classList.add('bg-main-red', 'hover:bg-hover-red');
        }
    }

    //Initializing -> only correct categories by default
    filterCategories(primaryCategorySelect, typeSelect.value, primaryOptions, oldPrimaryCategory);
    filterCategories(secondaryCategorySelect, typeSelect.value, secondaryOptions, oldSecondaryCategory);
    changeBtnColor(submitBtn, typeSelect.value);

    typeSelect.addEventListener('change', function () {
        filterCategories(primaryCategorySelect, typeSelect.value, primaryOptions, oldPrimaryCategory);
        filterCategories(secondaryCategorySelect, typeSelect.value, secondaryOptions, oldSecondaryCategory);
        changeBtnColor(submitBtn, typeSelect.value);
    });
})