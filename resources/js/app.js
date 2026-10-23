document.querySelectorAll('[data-color-picker]').forEach((picker) => {
    picker.addEventListener('input', () => {
        const target = document.querySelector(picker.dataset.colorPicker);

        if (target) {
            target.value = picker.value;
        }
    });
});
