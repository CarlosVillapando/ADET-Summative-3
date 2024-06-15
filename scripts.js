function enableEditing(button) {
    const listItem = button.closest('li');
    const taskDisplay = listItem.querySelector('.task-display');
    const editForm = listItem.querySelector('.edit-form');

    taskDisplay.style.display = 'none';
    editForm.style.display = 'flex';
}

function cancelEditing(button) {
    const listItem = button.closest('li');
    const taskDisplay = listItem.querySelector('.task-display');
    const editForm = listItem.querySelector('.edit-form');

    taskDisplay.style.display = 'flex';
    editForm.style.display = 'none';
}
