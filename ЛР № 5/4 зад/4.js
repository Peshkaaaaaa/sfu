function checkCondition(arr) {
  for (let i = 1; i < arr.length; i++) {
    const previousWord = arr[i - 1];
    const currentWord = arr[i];

    if (previousWord.charAt(previousWord.length - 1) !== currentWord.charAt(0)) {
      return false;
    }
  }

  return true;
}