function calculateSum(arr) {
  let sum = 0;
  let found = false;

  for (let i = 0; i < arr.length; i++) {
    if (Math.cos(arr[i]) > 0 && found === false) {
      found = true;
    }

    if (found) {
      sum += arr[i];
    }
  }

  return sum;
}