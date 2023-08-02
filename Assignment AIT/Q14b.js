// Function to find the largest number
function findLargestNumber(num1, num2, num3) {
  return Math.max(num1, num2, num3);
}

// Read user input and find the largest number
function findLargestNumberREPL() {
  const num1 = parseFloat(prompt('Enter the first number: '));
  const num2 = parseFloat(prompt('Enter the second number: '));
  const num3 = parseFloat(prompt('Enter the third number: '));

  const largestNumber = findLargestNumber(num1, num2, num3);

  console.log('The largest number is:', largestNumber);
}

// Call the findLargestNumberREPL function
findLargestNumberREPL();
