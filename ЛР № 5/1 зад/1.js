function findDigit(k) {
  let sequence = '';
  let number = 1;

  while (sequence.length < k) {
    sequence += number.toString();
    number++;
  }

  return parseInt(sequence[k - 1]);
}