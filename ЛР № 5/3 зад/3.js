function removeElements(arr) {
  return arr.filter((num) => {
    const absolute = Math.abs(num);
    const digits = Array.from(String(absolute), Number);

    if (digits.length < 2) {
      return true;
    }

    const diff = digits[1] - digits[0];
    for (let i = 2; i < digits.length; i++) {
      if (digits[i] - digits[i - 1] !== diff) {
        return true;
      }
    }

    return false;
  });
}