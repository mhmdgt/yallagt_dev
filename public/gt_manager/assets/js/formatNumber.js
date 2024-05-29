// function formatNumber(input) {
//     // Remove any non-numeric characters
//     var value = input.value.replace(/\D/g, '');

//     // Format the number with commas every 3 digits from right to left
//     var formattedValue = value.replace(/\B(?=(\d{3})+(?!\d))/g, ",");

//     // Update the input value
//     input.value = formattedValue;
// }


function formatNumber(input) {
    // Remove any non-numeric characters
    var value = input.value.replace(/\D/g, '');

    // Format the number with commas every 3 digits from right to left
    var formattedValue = value.replace(/\B(?=(\d{3})+(?!\d))/g, ",");

    // Update the input value with the formatted value
    input.value = formattedValue;

    // Store the numeric value without commas as a data attribute
    input.setAttribute('data-numeric-value', value);
}

// Add a submit event listener to the form
document.querySelector('form').addEventListener('submit', function(event) {
    // Get the input element
    var input = document.querySelector('input[name="main_price"]');

    // Get the numeric value without commas from the data attribute
    var numericValue = input.getAttribute('data-numeric-value');

    // Set the numeric value without commas as the input value
    input.value = numericValue;

    // Prevent the default form submission
    event.preventDefault();

    // Submit the form programmatically
    this.submit();
});
