const readline = require('readline');

const rl = readline.createInterface({
  input: process.stdin,
  output: process.stdout
});

rl.question('Enter the first number: ', (num1) => {
  rl.question('Enter the second number: ', (num2) => {
    rl.question('Enter the operation (+, -, *, /): ', (operator) => {
      const n1 = parseFloat(num1);
      const n2 = parseFloat(num2);

      let result;

      switch (operator) {
        case '+':
          result = n1 + n2;
          break;
        case '-':
          result = n1 - n2;
          break;
        case '*':
          result = n1 * n2;
          break;
        case '/':
          result = n1 / n2;
          break;
        default:
          console.log('Invalid operator');
          rl.close();
          return;
      }

      console.log(`Result: ${result}`);

      rl.close();
    });
  });
});
