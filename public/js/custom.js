function handleUserNameInput(input) {
    input.value = input.value.toLowerCase().replace(/[^a-z0-9\-]/g, '').substring(0, 8);
}
