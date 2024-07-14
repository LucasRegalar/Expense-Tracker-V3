document.addEventListener('DOMContentLoaded', function() {
    const toggleCheckbox = document.querySelector('input[type="checkbox"]');
    const incomeForm = document.getElementById('income-form');
    const expenseForm = document.getElementById('expense-form');

    toggleCheckbox.addEventListener('change', function() {
        if (this.checked) {
            incomeForm.classList.add('hidden');
            expenseForm.classList.remove('hidden');
        } else {
            incomeForm.classList.remove('hidden');
            expenseForm.classList.add('hidden');
        }
    });
});