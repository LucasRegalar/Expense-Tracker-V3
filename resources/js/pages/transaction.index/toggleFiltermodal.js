const filterButton = document.getElementById('filter-btn');
const modal = document.getElementById('modal');
const mainContent = document.getElementById('main-content');

// Resetting all the values when opening modal
const resetFilterValues = () => {
    const typeSelect = document.getElementById('type-select');
    const categorySelect = document.getElementById('category-select');
    const startingDate = document.getElementById('starting-date');
    const endDate = document.getElementById('end-date');

    typeSelect.value = '';
    categorySelect.value = '';
    startingDate.value = '';
    endDate.value = '';
}


// Open / Close Modal
const openModal = () => {
    modal.classList.remove('hidden');
    modal.classList.add('block');
    mainContent.classList.remove('block');
    mainContent.classList.add('hidden');
}

const closeModal = () => {
    modal.classList.remove('block');
    modal.classList.add('hidden');
    mainContent.classList.add('block');
    mainContent.classList.remove('hidden');
}



// automatically open modal when validation fails
document.addEventListener('DOMContentLoaded', function () {
    const errors = document.getElementById('errors');
    if (errors) {
        openModal();
    }
});

// opening and closing
filterButton.addEventListener('click', function () {
    if (modal.classList.contains('hidden')) {
        resetFilterValues();
        openModal();
    } else {
        closeModal();
    }
});

/* TODO: Make the animation pretty */