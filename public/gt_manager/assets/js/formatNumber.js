function formatNumber(input) {
    // Remove any non-numeric characters
    var value = input.value.replace(/\D/g, '');

    // Format the number with commas every 3 digits from right to left
    var formattedValue = value.replace(/\B(?=(\d{3})+(?!\d))/g, ",");

    // Update the input value
    input.value = formattedValue;
}
